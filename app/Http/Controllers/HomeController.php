<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Fee; 
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Department;
use App\Models\User;
use App\Models\Ship;
use App\Models\Category;
use App\Models\Scategory;
use App\Models\reviews;
use App\Models\Message;
 
class HomeController extends Controller
{


    public function index()
    {
        return view('admin.index');
    } 

    public function welcome()
    {
        return view('admin.welcome');
    }

    public function home()
    {
        return view('home.index');
    }

    public function super_index()
    {
        return view('superadmin.index');
    }



    
    // public function order_status()
    // {
    //     $shipping = Ship::all();
    //     return view('home.order_status',compact( 'shipping'));
    // }

    
    public function order_status(Request $request)
    {
        $scategory = Scategory::all(); 
        $user = Auth::user();
        $shippingName = $request->query('shipping_name'); // Get selected shipping name from query
        $search = $request->query('search'); // Get search query
    
        // Fetch orders filtered by shipping name and search query if provided
        $ordersQuery = Order::where('user_id', $user->id)->with(['product', 'product.owner']);
    
        if ($shippingName) {
            $ordersQuery->where('status', $shippingName); // Assuming `status` matches `shipping_name`
        }
    
        if ($search) {
            $ordersQuery->where(function ($query) use ($search) {
                $query->whereHas('product.owner', function ($q) use ($search) {
                    $q->where('shop_name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('product', function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%');
                })
                ->orWhere('id', 'like', '%' . $search . '%');
            });
        }

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
    
         // Add ordering by descending `id`
        $ordersQuery->orderBy('id', 'desc');


        $orders = $ordersQuery->get();
        $ships = Ship::all();
    
        return view('home.order_status', compact('orders', 'ships', 'shippingName','scategory','count'));
    }
    

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        if ($order && $order->status === 'Pending') {
            $order->delete();
            return redirect()->back()->with('success', 'Order successfully deleted.');
        }

        return redirect()->back()->with('error', 'Order cannot be deleted. Only pending orders are allowed.');
    }



    public function order_receipt($id)
    {
        $order = Order::with(['product', 'product.owner'])
            ->where('user_id', auth()->id()) // Ensure user owns the order
            ->findOrFail($id);
    
        return view('home.order_receipt', compact('order'));
    }
    

    public function searchOrderForm()
    {
        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        return view('home.search', compact('count','scategory'));
    }

    // Handle the search and display the result
    public function searchOrder(Request $request)
    {

        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }

        $request->validate([
            'order_id' => 'required|numeric',
        ]);

        $order = Order::where('id', $request->order_id)->first();

        if (!$order) {
            return back()->with('error', 'Order not found.');
        }

        return view('home.search', compact('order','count','scategory'));
    }


    public function product_super($superCategory)
    {
        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        // Fetch all products from the database
        $products = Product::where('global_category', $superCategory)->get();

        // Return the view with products data
        return view('home.product_super', compact('products', 'superCategory','count','scategory'));
    }



    public function start_sell(Request $request)
    {

        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        return view('more.start_sell', compact('count','scategory'));

    }

    public function faq(Request $request)
    {

        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        return view('home.faq', compact('count','scategory'));

    }

    public function order_track($id)
    {
        $order = Order::with(['product', 'product.owner'])->findOrFail($id);

        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        return view('more.tracking', compact('count','scategory','order'));

    }


    public function about(Request $request)
    {

        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        return view('home.about', compact('count','scategory'));

    }

    public function developer(Request $request)
    {

        $scategory = Scategory::all(); 

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
        return view('more.developer', compact('count','scategory'));

    }


    public function view_seller()
    {
        $department = Department::all();
    
        $user = Auth::user();
    
        if ($user) {
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0;
            $totalPrice = 0;
        }
    
        // Fetch only users with usertype 'admin'
        $admins = User::where('usertype', 'admin')->get();
    
        return view('home.view_seller', compact('count', 'department', 'totalPrice', 'admins'));
    }
    
    public function seller_departments($id)
    {
        // Find the department by ID
        $scategory = Scategory::all(); 

        $department = Department::findOrFail($id);
    
        // Fetch admins linked to this department's college
        $admins = User::where('college', $department->department_name)
                      ->where('usertype', 'admin')
                      ->get();
    
        // Check if a user is authenticated
        $user = Auth::user();
        if ($user) {
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0;
            $totalPrice = 0;
        }
    
        $allDepartments = Department::all();

        // Pass all variables to the view
        return view('home.department_admins', compact('department', 'admins', 'count', 'totalPrice','allDepartments','scategory'));
    }

    public function seller_department($id = null)
    {
   
        $scategory = Scategory::all(); 

        // Fetch all departments
        $allDepartments = Department::all();

        if ($id) {
            // Find the department by ID
            $department = Department::findOrFail($id);

            // Fetch admins linked to this department's college
            $admins = User::where('college', $department->department_name)
                        ->where('usertype', 'admin')
                        ->get();
        } else {
            // Fetch all admins (shops) when no department is selected
            $department = (object)[
                'department_name' => 'All Departments'
            ];
            $admins = User::where('usertype', 'admin')->get();
        }

        // Check if a user is authenticated
        $user = Auth::user();
        if ($user) {
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0;
            $totalPrice = 0;
        }

        // Pass all variables to the view
        return view('home.department_admin', compact('department', 'admins', 'count', 'totalPrice', 'allDepartments','scategory'));
    }

    
    
    public function view_seller_profile($id)
    {
        $scategory = Scategory::all(); 

        $admin = User::findOrFail($id); // Fetch the admin (seller) based on ID
        $department = Department::all(); // Fetch all departments
        $products = Product::where('user_id', $id)->paginate(16);  // Fetch products associated with this seller
        $categories = Category::where('user_id', $id)
                              ->withCount('products') // Include product count for each category
                              ->get();
    
        $user = Auth::user();
        if ($user) {
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0;
            $totalPrice = 0;
        }
    
        return view('home.view_seller_profile', compact('count', 'department', 'totalPrice', 'admin', 'products','categories','scategory'));
    }
    
    public function view_seller_categories($id)
    {
        $admin = User::findOrFail($id); // Fetch the admin (seller) based on ID
        $department = Department::all(); // Fetch all departments
        $categories = Category::where('user_id', $id)
                              ->withCount('products') // Include product count for each category
                              ->get();
    
        $user = Auth::user();
        if ($user) {
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0;
            $totalPrice = 0;
        }
    
        return view('home.view_seller_categories', compact('count', 'department', 'totalPrice', 'admin', 'categories'));
    }
        
    public function category_products($categoryId = null)
{
    // Get the logged-in user
    $scategory = Scategory::all(); 
    $user = Auth::user();

    if ($categoryId === null) {
        // If no category is selected, fetch all products for the specific seller
        $categories = Category::where('user_id', $user->id)
                              ->withCount('products')
                              ->get();

        $allProducts = Product::whereIn('category_id', $categories->pluck('id'))->get();
        $count = $user ? Cart::where('user_id', $user->id)->count() : 0;
        $totalPrice = $user ? Cart::where('user_id', $user->id)->sum('price') : 0;

        // Fetch admin/shop owner details
        $admin = User::find($user->id);

        return view('home.all_products', compact('categories', 'allProducts', 'count', 'totalPrice', 'admin'));
    }

    // Fetch the selected category and its products
    $category = Category::with('products')->findOrFail($categoryId);

    // Filter categories associated with the same seller
    $categories = Category::where('user_id', $category->user_id)
                          ->withCount('products')
                          ->get();

    $count = $user ? Cart::where('user_id', $user->id)->count() : 0;
    $totalPrice = $user ? Cart::where('user_id', $user->id)->sum('price') : 0;

    // Fetch admin/shop owner details
    $admin = User::find($category->user_id);

    return view('home.category_products', compact('categories', 'category', 'count', 'totalPrice', 'admin','scategory'));
}

    
    public function contact()
    {
        $department = Department::all();
        // Get the logged-in user
        $user = Auth::user();
        
        if ($user) {
            $userid = $user->id;
    
            // Count the number of items in the cart for this user
            $count = Cart::where('user_id', $userid)->count();
    
            // Calculate the total price of all items in the cart for this user
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0; // Default to 0 if no user is logged in
            $totalPrice = 0; // Default total price to 0
        }
    
        return view('home.contact', compact( 'count', 'department', 'totalPrice'));
    }
    


    public function autocomplete(Request $request)
    {
        $search = $request->query('term'); // Retrieve the term from the request
        $results = Product::where('title', 'like', "%{$search}%")
                         ->pluck('title'); // Fetch only product titles
    
        return response()->json($results); // Return the titles as JSON
    }
    
    public function search(Request $request)
    {
        $scategory = Scategory::all(); 
        // Get the logged-in user
        $user = Auth::user();
         
        if ($user) {
            $userid = $user->id;
    
            // Count the number of items in the cart for this user
            $count = Cart::where('user_id', $userid)->count();
    
            // Calculate the total price of all items in the cart for this user
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0; // Default to 0 if no user is logged in
            $totalPrice = 0; // Default total price to 0
        }


        $search = $request->input('search'); // Get the search query
    
        // Fetch products matching the search query
        $products = Product::where('title', 'like', "%{$search}%")->get();
    
        return view('home.search_results', compact('products', 'count', 'search','scategory'));
    }
    


    public function dash_shop()
    {
        // Fetch products and departments from the database
        $product = Product::latest()->take(12)->get();
        $department = Department::all();
        $scategory = Scategory::all(); 

    
        // Get the logged-in user
        $user = Auth::user();
        
        if ($user) {
            $userid = $user->id;
    
            // Count the number of items in the cart for this user
            $count = Cart::where('user_id', $userid)->count();
    
            // Calculate the total price of all items in the cart for this user
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0; // Default to 0 if no user is logged in
            $totalPrice = 0; // Default total price to 0
        }
    
        return view('home.shop', compact('product', 'count', 'department', 'totalPrice','scategory'));
    }


    public function shop()
    {
        // Fetch products and departments from the database
        $product = Product::all();
        $department = Department::all();
        $scategory = Scategory::all(); 

        // Get the logged-in user
        $user = Auth::user();
        
        if ($user) {
            $userid = $user->id;
    
            // Count the number of items in the cart for this user
            $count = Cart::where('user_id', $userid)->count();
    
            // Calculate the total price of all items in the cart for this user
            $totalPrice = Cart::where('user_id', $userid)->sum('price');
        } else {
            $count = 0; // Default to 0 if no user is logged in
            $totalPrice = 0; // Default total price to 0
        }
    
        return view('home.shop', compact('product', 'count', 'department', 'totalPrice','scategory'));
    }
    

    public function view_shop(Request $request)
    {
        $scategory = Scategory::all(); 
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }

        $sort = $request->query('sort', 'newest');

        $query = Product::query();

        switch ($sort) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc'); // Newest to Oldest
                break;
        }

        $products = $query->paginate(12);

        return view('home.view_shop', compact('products', 'sort','scategory','count'));
    }

    
    


    public function product_details($id)
    {
        // Fetch the product and its owner from the database
        $product_data = Product::with('owner')->find($id);
        $department = Department::all();
        $scategory = Scategory::all(); 
        $product_review = Product::with(['reviews.user'])->find($id);
        $totalReviews = $product_data->reviews->count();
        $averageRating = $totalReviews > 0 ? $product_data->reviews->avg('rating') : 5;
    
        // Counter
        $user = Auth::user();
        if ($user) {
            $userid = $user->id;
            // Count the number of items in the cart for this user
            $count = Cart::where('user_id', $userid)->count();
            $totalPrice = Cart::where('user_id', $userid)->sum('price');

        } else {
            $count = 0; // Default to 0 if no user is logged in
        }
    
        return view('home.product_details', compact('product_data', 
        'count',  
        'department', 
        'totalPrice',
        'scategory',
        'product_review', 
        'totalReviews',
        'averageRating'));
    }
    


    public function review_product(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        reviews::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Thank you for your review!');
    }


    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
    
        // Add the quantity back to the product
        $product->quantity += $request->quantity;
        $product->save();
    
        // Add the product to the cart
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'price' => $product->price * $request->quantity,
        ]);
    
        return redirect()->back()->with('success', 'Product added to cart and quantity updated!');
    }
    

    public function mycart()
    {
        $scategory = Scategory::all(); 
        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
    
        return view('home.mycart', compact('count', 'cart','department','scategory'));
    }
    

public function removeFromCart($id)
{
    $cartItem = Cart::find($id);

    if ($cartItem) {
        $cartItem->delete();
        return response()->json(['success' => true, 'message' => 'Item removed from cart!']);
    }

    return response()->json(['success' => false, 'message' => 'Item not found!']);
}

    


    public function checkoutPage(Request $request)
    {
        $scategory = Scategory::all(); 
        $department = Department::all();

        // Fetch the cart items based on selected item IDs from the request, along with product and owner
        $selectedCartItems = Cart::whereIn('id', $request->cart_items)->with(['product', 'product.owner'])->get();
    
        // Calculate merchandise subtotal
        $merchandise_subtotal = $selectedCartItems->sum('price'); // Sum of all item prices
        
        // Get the general fee from the fees table
        $general_fee = Fee::value('general_fee');
        
        // Calculate the total transaction fee for each cart item (quantity * general fee)
        $transaction_fee = $selectedCartItems->sum(function($item) use ($general_fee) {
            return $item->quantity * $general_fee;
        });

        if (Auth::check()) {
            $user = Auth::user();
            $userid = $user->id;
            $department = Department::all();

    
            // Fetch cart items for the logged-in user and load product and owner
            $cart = Cart::where('user_id', $userid)->with(['product', 'product.owner'])->get();
    
            // Count the number of items in the cart
            $count = $cart->count();
        } else {
            $cart = collect();
            $count = 0;
        }
    
        return view('home.checkout', [
            'cart' => $selectedCartItems,
            'merchandise_subtotal' => $merchandise_subtotal,
            'transaction_fee' => $transaction_fee,
            'general_fee' => $general_fee,
            'department' => $department ,
            'scategory'  => $scategory,
            'count'  => $count ,
           
        ]);
    }
    
    

    public function placeOrder(Request $request)
{

  
    // Check if cart_items is present and is an array
    if (!$request->has('cart_items') || !is_array($request->cart_items)) {
        return redirect()->back()->with('error', 'No items selected for checkout.');
    }

    $user = Auth::user();
    
    // Fetch the selected cart items from the cart
    $selectedCartItems = Cart::whereIn('id', $request->cart_items)->with('product')->get();

    // Check if any cart items are selected
    if ($selectedCartItems->isEmpty()) {
        return redirect()->back()->with('error', 'No items selected for checkout.');
    }

    // Fetch the general fee from the fees table
    $general_fee = Fee::value('general_fee');

    // Initialize total fee and total price
    $total_price = 0;
    $total_fee = 0;

    // Loop through each cart item and calculate the total price and fee
    foreach ($selectedCartItems as $item) {
        // Calculate the transaction fee for each item
        $item_fee = $item->quantity * $general_fee;

        // Calculate the total price for this item (item price * quantity + fee)
        $item_total_price = ($item->product->price * $item->quantity) + $item_fee;

        // Sum the total price and total fee for all cart items
        $total_price += $item_total_price;
        $total_fee += $item_fee;

        // Create the order for each item
        Order::create([
            'user_id' => $user->id,
            'product_id' => $item->product_id,
            'size' => $item->size,
            'quantity' => $item->quantity,
            'price' => $item_total_price,  // Store the total price including fee for each item
            'name' => $user->name,
            'rec_address' => $user->address,
            'phone' => $user->phone,
            'payment_method' => $request->payment_method,
            'status' => 'Pending',
            'track' => 'Order is placed',
            'total_fee' => $item_fee,  // Store the fee for each item
        ]);
    }

    // Remove only the selected items from the cart
    Cart::whereIn('id', $request->cart_items)->delete();

    // Redirect to orders page with success message
    return redirect('/order_status')->with('success', 'Your order has been placed successfully!');
}


    public function viewOrders()
    {
        $user = Auth::user();
        // Fetch orders with related product and owner data
        $orders = Order::where('user_id', $user->id)->with(['product', 'product.owner'])->get();
    
        return view('home.orders', compact('orders'));
    }

    // =========================
    public function messages($id)
    {
        $admin = User::findOrFail($id); // Fetch seller/admin details
        $user = Auth::user(); // Authenticated user
        $messages = Message::where(function ($query) use ($id, $user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id, $user) {
            $query->where('sender_id', $id)
                ->where('receiver_id', $user->id);
        })->orderBy('created_at', 'asc')->get();

        return view('more.chat', compact('admin', 'messages'));
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate(['message' => 'required|string']);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $id,
            'message' => $request->message,
        ]);

        return back();
    }


    

}
