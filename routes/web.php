<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController, 
    HomeController, 
    AdminController,
    SuperController,
    ChatController 
};

// Public route for home
route::get('/', [HomeController::class, 'home']);

Route::get('dashboard', [HomeController::class, 'dash_shop'])->name('dashboard');


// Profile routes for authenticated users
Route::middleware(['auth', 'no-back-after-logout'])->group(function () {
    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('update_password', [ProfileController::class, 'update_password']);
    Route::get('user_details', [ProfileController::class, 'user_details']);


    Route::get('profile_edit', [ProfileController::class, 'user_profile'])->name('profile.user_profile');

    Route::patch('profile_user', [ProfileController::class, 'profile_update'])->name('profile.updated');
    Route::get('user_page', [ProfileController::class, 'user_page']);


    Route::post('handle-back', [ProfileController::class, 'handleBack'])->name('handleBack');


    Route::get('messages/{id}', [HomeController::class, 'messages']);
    Route::post('message_send/{id}', [HomeController::class, 'sendMessage']);



});     


Route::middleware(['auth'])->group(function () {
    Route::get('dashboard1', [ChatController::class, 'index'])->name('dashboard');
    Route::get('chat/{user}', [ChatController::class, 'show'])->name('chat.show');
    Route::post('chat/{user}', [ChatController::class, 'store'])->name('chat.store');
    Route::get('chat/{user}/messages', [ChatController::class, 'getMessages'])->name('chat.show');

});



// Admin dashboard and related routes
Route::middleware(['auth', 'admin', 'no-back-after-logout'])->group(function () {
    // Admin dashboard and welcome page
    route::get('admin/dashboard', [HomeController::class, 'index']);
    route::get('admin_welcome', [HomeController::class, 'welcome']);
    
    // Categories
    Route::get('display_category', [AdminController::class, 'display_category']);
    Route::get('view_category', [AdminController::class, 'view_category']);
    Route::post('add_category', [AdminController::class, 'add_category']);
    Route::get('edit_category/{id}', [AdminController::class, 'edit_category']);
    Route::post('update_category/{id}', [AdminController::class, 'update_category']);
    Route::get('delete_category/{id}', [AdminController::class, 'delete_category']);
    
    // Sizes
    Route::get('display_size', [AdminController::class, 'display_size']);
    Route::get('view_size', [AdminController::class, 'view_size']);
    Route::post('add_size', [AdminController::class, 'add_size']);
    Route::get('delete_size/{id}', [AdminController::class, 'delete_size']);
    
    // Payments
    Route::get('display_tracking', [AdminController::class, 'display_tracking']);
    Route::get('view_payment', [AdminController::class, 'view_payment']);
    Route::post('add_payment', [AdminController::class, 'add_payment']);
    Route::get('delete_payment/{id}', [AdminController::class, 'delete_payment']);
    Route::get('edit_payment/{id}', [AdminController::class, 'edit_payment']);
    Route::post('update_payment/{id}', [AdminController::class, 'update_payment']);

    // Product management
    route::get('add_product', [AdminController::class, 'add_product']);
    route::post('upload_product', [AdminController::class, 'upload_product']);
    route::get('view_product', [AdminController::class, 'view_product']);
    route::get('delete_product/{id}', [AdminController::class, 'delete_product']);
    route::get('update_product/{id}', [AdminController::class, 'update_product']);
    Route::match(['POST', 'PUT'], '/edit_product/{id}', [AdminController::class, 'edit_product'])->name('edit_product');

    route::get('product_search', [AdminController::class, 'product_search']);
    
    // Order management
    route::get('order_search', [AdminController::class, 'order_search']);
    Route::get('admin_orders', [AdminController::class, 'admin_orders']);
    Route::post('bulk_update_order_status', [AdminController::class, 'bulk_update_order_status'])->name('bulk_update_order_status');
    Route::get('summary', [AdminController::class, 'orderSummary']);
    Route::get('order_product', [AdminController::class, 'order_product']);

    Route::get('orders_delete', [AdminController::class, 'orders_delete']);
    Route::delete('bulk_delete_orders', [AdminController::class, 'bulkDeleteOrders'])->name('bulk_delete_orders');

    


    Route::get('to_pay', [AdminController::class, 'to_pay']);
    Route::get('download_pdf_topay', [AdminController::class, 'generateToPayPDF'])->name('orders.toPay.pdf');

    Route::get('to_ship', [AdminController::class, 'to_ship']);
    Route::get('download_pdf_toship', [AdminController::class, 'generateToShipPDF'])->name('orders.toShip.pdf');

    Route::get('admin_chat', [AdminController::class, 'admin_chat']);

    Route::get('admin_show/{user}', [AdminController::class, 'admin_show']);
    Route::post('admin_store/{user}', [AdminController::class, 'admin_store']);
    Route::get('admin_get/{user}/messages', [AdminController::class, 'admin_getMessages']);


    // Route::get('filter-orders', 'AdminOrderController@filterOrders')->name('filter.orders');
    // Route::get('export-orders-pdf', 'AdminOrderController@exportOrdersPDF')->name('export.orders.pdf');
    // Route::get('filter_orders', [AdminController::class, 'filterOrders']);
    // Route::get('export_orders_pdf', [AdminController::class, 'ExportOrdersPDF']);




});
Route::get('categories', [HomeController::class, 'test']);

// Routes for student users
Route::middleware(['auth', 'student','no-back-after-logout'])->group(function () {
    // Dashboard and shop views
    Route::get('order_status', [HomeController::class, 'order_status']);
    Route::get('order_receipt/{id}', [HomeController::class, 'order_receipt']);

    Route::get('search-order', [HomeController::class, 'searchOrderForm']);
    Route::post('search-order', [HomeController::class, 'searchOrder']);

    Route::get('faq', [HomeController::class, 'faq']);
    Route::get('about', [HomeController::class, 'about']);
    Route::get('developer', [HomeController::class, 'developer']);
    Route::get('start_sell', [HomeController::class, 'start_sell']);
    Route::get('order_track/{id}', [HomeController::class, 'order_track']);



    Route::get('product_super/{superCategory}', [HomeController::class, 'product_super']);



    Route::get('search', [HomeController::class, 'search']);
    Route::get('autocomplete', [HomeController::class, 'autocomplete']);


    Route::get('my_shop', [HomeController::class, 'shop'])->name('dashboard');
    


    Route::get('view_shop', [HomeController::class, 'view_shop']);
    Route::get('view_seller', [HomeController::class, 'view_seller']);
    Route::get('view_seller_profile/{id}', [HomeController::class, 'view_seller_profile']);

    Route::get('seller_department', [HomeController::class, 'seller_department']);
    Route::get('seller_departments/{id}', [HomeController::class, 'seller_departments']);
    



    Route::get('view_seller_categories/{id}', [HomeController::class, 'view_seller_categories']);
    Route::get('category_products/{id}', [HomeController::class, 'category_products']);

    
    // Contact and product details
    Route::get('contact', [HomeController::class, 'contact']);
    route::get('product_details/{id}', [HomeController::class, 'product_details']);
    route::post('review_product', [HomeController::class, 'review_product']);

    
    // Cart management
    Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('cart.add');
    Route::get('mycart', [HomeController::class, 'mycart'])->middleware('verified');
    Route::delete('/cart/remove/{id}', [HomeController::class, 'removeFromCart'])->name('cart.remove');
    
    // Checkout and orders
    Route::get('checkout', [HomeController::class, 'checkoutPage'])->name('checkout');
    Route::post('placeOrder', [HomeController::class, 'placeOrder'])->name('placeOrder');
    Route::get('/orders', [HomeController::class, 'viewOrders'])->middleware('verified')->name('orders');

    Route::delete('delete_order/{id}', [HomeController::class, 'deleteOrder'])->name('delete_order');

});

// Super Admin-specific routes
Route::middleware(['auth', 'super','no-back-after-logout'])->group(function () {
    // Dashboard for Super Admin
    route::get('super_dashboard', [HomeController::class, 'super_index']);
    
    // Section management
    route::get('view_section', [SuperController::class, 'view_section']);
    route::post('add_section', [SuperController::class, 'add_section']);
    route::get('delete_section/{id}', [SuperController::class, 'delete_section']);
    
    // Shipping management
    route::get('view_ship', [SuperController::class, 'view_ship']);
    route::post('add_ship', [SuperController::class, 'add_ship']);
    route::get('delete_ship/{id}', [SuperController::class, 'delete_ship']);
    
    // Department management
    route::get('view_department', [SuperController::class, 'view_department']);
    route::post('add_department', [SuperController::class, 'add_department']);
    route::get('delete_department/{id}', [SuperController::class, 'delete_department']);

    route::get('view_supercategory', [SuperController::class, 'view_supercategory']);
    route::post('add_supercategory', [SuperController::class, 'add_supercategory']);
    route::get('delete_supercategory/{id}', [SuperController::class, 'delete_supercategory']);
    
    // Fees management
    route::get('view_fee', [SuperController::class, 'view_fee']);
    route::post('add_fee', [SuperController::class, 'add_fee']);
    route::get('delete_fee/{id}', [SuperController::class, 'delete_fee']);
    Route::get('edit_fee/{id}', [SuperController::class, 'edit_fee']);
    Route::post('update_fee/{id}', [SuperController::class, 'update_fee']);

    Route::get('users', [SuperController::class, 'users']);
    Route::get('user_edit/{id}', [SuperController::class, 'editUser']);
    Route::post('user_update/{id}', [SuperController::class, 'updateUser']);


});

// Include auth routes
require __DIR__.'/auth.php';
