<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Size;  
use App\Models\Payment; 
use App\Models\Product; 
use App\Models\Order; 
use App\Models\Ship;
use App\Models\Chat;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Scategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class AdminController extends Controller 
{

    public function admin_chat()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.admin_chat', compact('users'));
    } 

    
    public function admin_show(User $user){



        $chats = Chat::where(function ($query) use ($user) {
            $query->where('sender_id', auth()->id())->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)->where('receiver_id', auth()->id());
        })->with('sender', 'receiver')->latest()->get();

        return view('admin.admin_chat_user', compact('chats', 'user'));
    }

    public function admin_store(Request $request, User $user)
    {
        $request->validate(['message' => 'required|string']);
        Chat::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id, 
            'message' => $request->message,
        ]);

        return response()->json(['success' => true]);
    }

    public function admin_get(User $user)
    {
        $chats = Chat::where(function ($query) use ($user) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->id());
        })->with('sender', 'receiver')->latest()->get();

        return response()->json($chats);
    }



    

    public function view_category()
    {
        //$data = Category::all();
        $cat_data = Category::where('user_id', Auth::id())->get();
        return view('admin.category',compact('cat_data'));
    }

    public function display_category()
    {
        //$data = Category::all();
        $cat_data = Category::where('user_id', Auth::id())->get();
        return view('admin.category_view',compact('cat_data'));
    }


    public function view_size()
    {
        $size_data = Size::where('user_id', Auth::id())->get();
        return view('admin.size',compact('size_data'));
    }

    public function display_size()
    {
        $size_data = Size::where('user_id', Auth::id())->get();
        return view('admin.size_view',compact('size_data'));
    }


    public function view_payment()
    {
        $pay_data = Payment::where('user_id', Auth::id())->get();

        return view('admin.payment',compact('pay_data'));
    }

    public function display_tracking()
    {
        $pay_data = Payment::where('user_id', Auth::id())->get();

        return view('admin.payment_view',compact('pay_data'));
    }

    // delete
    public function delete_category($id)
    {
         $cat_data = Category::find($id);

         $cat_data->delete(); 

         toastr()->timeOut(5000)->closeButton()->addSuccess('Category Deleted Succesfully');

         return redirect()->back();
    }

    public function delete_size($id)
    {
         $size_data = Size::find($id);

         $size_data->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Size Deleted Succesfully');

         return redirect()->back();
    }

    public function delete_payment($id)
    {
         $pay_data = Payment::find($id);

         $pay_data->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Option Deleted Succesfully');

         return redirect()->back();
    }

    //edit
    public function edit_category($id)
    {
        $cat_data = Category::find($id);

        return view('admin.edit_category',compact('cat_data'));

    }

    public function update_category(Request $request,$id)
    {
        $cat_data = Category::find($id);
        
        $cat_data->category_name = $request->category;

        $cat_data->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Category updated Succesfully');

        return redirect('/view_category');

    }

    public function edit_payment($id)
    {
        $cat_data = Payment::find($id);

        return view('admin.edit_payment',compact('cat_data'));

    }

    public function update_payment(Request $request,$id)
    {
        $cat_data = Payment::find($id);
        
        $cat_data->payment_name = $request->payment;

        $cat_data->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('payment updated Succesfully');

        return redirect('/display_tracking');

    }



    // create

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->user_id = Auth::id();

        $category->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Category Added Succesfully');

        return redirect()->back();
    }

    public function add_size(Request $request)
    {
        $size = new Size;

        $size->size_name = $request->size;

        $size->user_id = Auth::id();

        $size->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Size Added Succesfully');


        return redirect()->back();
    }

    public function add_payment(Request $request)
    {
        $payment = new Payment;

        $payment->payment_name = $request->payment;

        $payment->user_id = Auth::id();

        $payment->save();

        toastr()->closeButton()->timeOut(5000)->addSuccess('Payment Added Succesfully');


        return redirect()->back();
    }


    //+++++++++++++++++++++++++++++++++++++++++++++++++++++ product

    public function add_product()
    {
        $category_data = Category::where('user_id', Auth::id())->get();
        $sizes = Size::where('user_id', Auth::id())->get();
        $super_categories = Scategory::all(); // Retrieve all super categories

        return view('admin.add_product', compact('category_data', 'sizes', 'super_categories'));
    }
    public function upload_product(Request $request)
    {
        $product = new Product;
    
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->qty;
        $product->category = $request->category;
        $product->estimate = $request->estimate; 
        
        // Handle super category
        $product->global_category = $request->Scategory;
    
        // Handle sizes (store as comma-separated values)
        $sizes = $request->input('sizes', []); 
        $product->size = implode(',', $sizes);
    
        // Assign the current user's ID
        $product->user_id = Auth::id();
    
        // Array to hold the image names
        $imageNames = [];
    
        // Handle multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('products'), $imagename);
                $imageNames[] = $imagename;
            }
        }
    
        // Store the image names as a JSON string
        $product->image = json_encode($imageNames);
    
        $product->save();
    
        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Added Successfully');
        return redirect()->back();
    }
    

    public function view_product()
    {
        $product = Product::where('user_id', Auth::id())->paginate(3);
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id)
    {
         $product_data = Product::find($id);

         $image_path = public_path('products/' .$product_data->image);

         if(file_exists($image_path))
         {
            unlink($image_path);
         }

         $product_data->delete();

         toastr()->timeOut(5000)->closeButton()->addSuccess('Product Deleted Succesfully');

         return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $search = $request->input('search');

        // Get the current admin's ID
        $adminId = Auth::id();

        // Query for products that belong to the current admin
        $product = Product::where('user_id', $adminId)
                    ->where(function($query) use ($search) {
                        $query->where('title', 'LIKE', '%' . $search . '%')
                            ->orWhere('category', 'LIKE', '%' . $search . '%');
                    })
                    ->paginate(3);

        return view('admin.view_product', compact('product'));
    }

    
    public function update_product($id)
    {

        $super_categories = Scategory::all(); // Retrieve all super categories

        $product = Product::find($id);

        $category_data = Category::where('user_id', Auth::id())->get();
        $sizes = Size::where('user_id', Auth::id())->get(); // Fetch sizes

        return view('admin.update_page',compact('product','category_data','sizes','super_categories'));

    }

    public function edit_product(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->global_category = $request->Scategory;
        $product->estimate = $request->estimate; 

    
        // Handle sizes
        $sizes = $request->input('sizes', []);
        $product->size = implode(',', $sizes);
    
        // Handle new images
        if ($request->hasFile('images')) {
            $imageNames = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('products'), $imageName);
                $imageNames[] = $imageName;
            }
            $product->image = json_encode($imageNames);
        }
    
        $product->save();
    
        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Updated Successfully');
        return redirect()->back();
    }
    
    public function bulkDeleteOrders(Request $request)
    {
        $orderIds = $request->input('order_ids');

        if ($orderIds) {
            Order::whereIn('id', $orderIds)->delete();
            toastr()->success('Selected orders have been deleted successfully.');
        } else {
            toastr()->error('No orders were selected for deletion.');
        }

        return redirect()->back();
    }

    public function orders_delete()
    {
        // Get the current admin's ID
        $adminId = Auth::id();
    
        // Retrieve orders where the product belongs to this admin
        $orders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->paginate(10);
    
        // Retrieve all shipping options
        $shippingOptions = Ship::all();
    
        // Retrieve payment options added by the current admin
        $paymentOptions = Payment::where('user_id', $adminId)->get();
    
        // Return the view with the filtered orders, shipping options, and payment options
        return view('admin.orders_delete', compact('orders', 'shippingOptions', 'paymentOptions'));
    }
    
    
    public function order_search(Request $request) 
    {
        $search = $request->input('search');
        $status = $request->input('status');
    
        // Get the current admin's ID
        $adminId = Auth::id();
        
        // Base query for orders
        $query = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        });
    
        // Apply search filters if search term is provided
        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('id', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('rec_address', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('product', function($query) use ($search) {
                        $query->where('title', 'LIKE', '%' . $search . '%');
                    });
            });
        }
    
        // Apply status filter if a status is selected
        if ($status) {
            $query->where('status', $status);
        }
    
        // Paginate the results
        $orders = $query->paginate(10);
    
        // Retrieve all shipping options and payment options for dropdowns
        $shippingOptions = Ship::all();
        $paymentOptions = Payment::where('user_id', $adminId)->get();
    
        return view('admin.orders', compact('orders', 'shippingOptions', 'paymentOptions'));
    }
    
    
    public function admin_orders()
    {
        // Get the current admin's ID
        $adminId = Auth::id();
    
        // Retrieve orders where the product belongs to this admin
        $orders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->paginate(10);
    
        // Retrieve all shipping options
        $shippingOptions = Ship::all();
    
        // Retrieve payment options added by the current admin
        $paymentOptions = Payment::where('user_id', $adminId)->get();
    
        // Return the view with the filtered orders, shipping options, and payment options
        return view('admin.orders', compact('orders', 'shippingOptions', 'paymentOptions'));
    }
    

    public function order_product()
    {
        $adminId = Auth::id();

        // Fetch and group orders by product title and size
        $orderSummary = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select(
                'products.title',
                'orders.size',
                DB::raw('SUM(orders.quantity) as total_quantity')
            )
            ->where('products.user_id', $adminId)
            ->groupBy('products.title', 'orders.size')
            ->orderBy('products.title', 'asc')
            ->get();

        return view('admin.order_product', compact('orderSummary'));
    }

    public function bulk_update_order_status(Request $request)
    {
        // Get the list of selected order IDs
        $orderIds = $request->input('order_ids');
    
        // Check if any orders were selected
        if ($orderIds) {
            // Loop through each selected order and update status and track
            foreach ($orderIds as $orderId) {
                $order = Order::find($orderId);
    
                if ($order) {
                    // Update the status
                    $order->status = $request->input('bulk_status');
    
                    // Append changes to the track array
                    $trackChanges = $order->track ? json_decode($order->track, true) : [];
                    $trackChanges[] = [
                        'change' => $request->input('bulk_track'),
                        'timestamp' => now()->toDateTimeString(),
                    ];
    
                    $order->track = json_encode($trackChanges); // Save as JSON
                    $order->save();
                }
            }
    
            toastr()->closeButton()->timeOut(5000)->addSuccess('Selected orders updated successfully.');
        } else {
            toastr()->closeButton()->timeOut(5000)->addError('No orders selected.');
        }
    
        return redirect()->back();
    }
    

    public function filterOrders(Request $request)
    {
        $query = Order::query();
        
        // Apply filters based on request inputs
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('rec_address')) {
            $query->where('rec_address', 'like', '%' . $request->rec_address . '%');
        }

        $orders = $query->paginate(10); // Adjust pagination as needed
        return view('admin.filter_orders', compact('orders'));
    }

    // Generate and download PDF
    public function ExportOrdersPDF(Request $request)
    {
        $query = Order::query();

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('rec_address')) {
            $query->where('rec_address', 'like', '%' . $request->rec_address . '%');
        }

        $orders = $query->get(); // Fetch all filtered orders

        // Load the view and pass the data
        $pdf = Pdf::loadView('admin.orders_pdf', ['orders' => $orders]);
        return $pdf->download('filtered_orders.pdf');
    }
    

    public function orderSummary()
    {
        $adminId = Auth::id();

         // Calculate total orders for the admin's account
        $totalOrders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->count();

        $totalRevenue = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->sum('price');

        $totalFee = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->sum('total_fee');


        // data count
        $pendingOrders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->where('status', 'pending')->count();
        

        $topayOrders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->where('status', 'to pay')->count();

        $toshipOrders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->where('status', 'to ship')->count();

        $toreceiveOrders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->where('status', 'to receive')->count();

        $deliveredOrders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->where('status', 'Delivered')->count();



        $lastPendingOrders = Order::whereHas('product', function ($query) use ($adminId) {
            $query->where('user_id', $adminId);
        })->where('status', 'pending')
          ->orderBy('created_at', 'desc')
          ->take(4)
          ->get(['id', 'product_id', 'price']);
        // Fetch orders for last 7 days, 4 weeks, and 4 months
        $ordersLast7Days = Order::whereHas('product', function ($query) use ($adminId) {
                $query->where('user_id', $adminId);
            })
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();
    
        $ordersLast4Weeks = Order::whereHas('product', function ($query) use ($adminId) {
                $query->where('user_id', $adminId);
            })
            ->where('created_at', '>=', Carbon::now()->subWeeks(4))
            ->select(DB::raw('YEARWEEK(created_at) as week'), DB::raw('count(*) as count'))
            ->groupBy('week')
            ->orderBy('week')
            ->get();
    
        $ordersLast4Months = Order::whereHas('product', function ($query) use ($adminId) {
                $query->where('user_id', $adminId);
            })
            ->where('created_at', '>=', Carbon::now()->subMonths(4))
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as count'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
    
        return view('admin.summary', compact('totalOrders',
        'totalRevenue','totalFee','pendingOrders','topayOrders','toshipOrders',
        'toreceiveOrders','deliveredOrders','lastPendingOrders',
        'ordersLast7Days', 'ordersLast4Weeks', 'ordersLast4Months'));
    }

    
    public function to_pay()
    {
        // Get the current admin's ID
        $adminId = Auth::id();

        // Retrieve only orders with a status of "to pay" where the product belongs to this admin
        $orders = Order::where('status', 'to pay')
                    ->whereHas('product', function ($query) use ($adminId) {
                        $query->where('user_id', $adminId);
                    })
                    ->paginate(10); // Paginate as needed

        // Retrieve shipping and payment options related to this admin
        $shippingOptions = Ship::all();
        $paymentOptions = Payment::where('user_id', $adminId)->get();

        // Return the view with the "to pay" orders, shipping options, and payment options
        return view('admin.to_pay', compact('orders', 'shippingOptions', 'paymentOptions'));
    }

    public function generateToPayPDF()
    {
        $adminId = Auth::id();

        $orders = Order::where('status', 'to pay')
                    ->whereHas('product', function ($query) use ($adminId) {
                        $query->where('user_id', $adminId);
                    })->get();

        // Load a view specifically for PDF export
        $pdf = PDF::loadView('admin.pdf_orders_to_pay', compact('orders'));
        
        return $pdf->download('to-pay-orders.pdf');
    }


        public function to_ship()
    {
        // Get the current admin's ID
        $adminId = Auth::id();

        // Retrieve only orders with a status of "to pay" where the product belongs to this admin
        $orders = Order::where('status', 'to ship')
                    ->whereHas('product', function ($query) use ($adminId) {
                        $query->where('user_id', $adminId);
                    })
                    ->paginate(10); // Paginate as needed

        // Retrieve shipping and payment options related to this admin
        $shippingOptions = Ship::all();
        $paymentOptions = Payment::where('user_id', $adminId)->get();

        // Return the view with the "to pay" orders, shipping options, and payment options
        return view('admin.to_ship', compact('orders', 'shippingOptions', 'paymentOptions'));
    }

    public function generateToShipPDF()
    {
        $adminId = Auth::id();

        $orders = Order::where('status', 'to ship')
                    ->whereHas('product', function ($query) use ($adminId) {
                        $query->where('user_id', $adminId);
                    })->get();

        // Load a view specifically for PDF export
        $pdf = PDF::loadView('admin.pdf_orders_to_ship', compact('orders'));
        
        return $pdf->download('to-ship-orders.pdf');
    }
}
