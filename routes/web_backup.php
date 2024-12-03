<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperController;



// Route::get('/dashboard', function () {
//     return view('home.shop');
// })->middleware(['auth', 'verified'])->name('dashboard');

route::get('/',[HomeController::class,'home']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});  

//Route::get('/home/shop', [HomeController::class, 'shop'])->middleware(['auth'])->name('shop');
require __DIR__.'/auth.php';

route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
route::get('admin_welcome',[HomeController::class,'welcome'])->middleware(['auth','admin']);


Route::middleware(['auth', 'student'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'shop'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('my_shop', [HomeController::class, 'shop'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('view_shop', [HomeController::class, 'view_shop']);
    Route::get('contact', [HomeController::class, 'contact']);


    route::get('product_details/{id}',[HomeController::class,'product_details']);

    //order
    Route::post('/cart/add', [HomeController::class, 'addToCart'])->name('cart.add');
    Route::get('mycart', [HomeController::class, 'mycart'])->middleware(['auth', 'verified']);
    Route::delete('/cart/remove/{id}', [HomeController::class, 'removeFromCart'])->name('cart.remove');
    // Checkout page
    Route::get('checkout', [HomeController::class, 'checkoutPage'])->name('checkout');

    // Place order and move cart items to orders table
    Route::post('placeOrder', [HomeController::class, 'placeOrder'])->name('placeOrder');
    Route::get('/orders', [HomeController::class, 'viewOrders'])->middleware(['auth', 'verified'])->name('orders');

});

//Admin Controller
route::get('display_category',[AdminController::class,'display_category'])->middleware(['auth','admin']);
route::get('display_size',[AdminController::class,'display_size'])->middleware(['auth','admin']);
route::get('display_tracking',[AdminController::class,'display_tracking'])->middleware(['auth','admin']);




route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);
route::get('view_size',[AdminController::class,'view_size'])->middleware(['auth','admin']);
route::get('view_payment',[AdminController::class,'view_payment'])->middleware(['auth','admin']);


route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);
route::post('add_size',[AdminController::class,'add_size'])->middleware(['auth','admin']);
route::post('add_payment',[AdminController::class,'add_payment'])->middleware(['auth','admin']);

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);
route::get('delete_size/{id}',[AdminController::class,'delete_size'])->middleware(['auth','admin']);
route::get('delete_payment/{id}',[AdminController::class,'delete_payment'])->middleware(['auth','admin']);


route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);

route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);
route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);
route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);
route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);
route::get('update_product/{id}',[AdminController::class,'update_product'])->middleware(['auth','admin']);
route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);
route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);

route::get('order_search',[AdminController::class,'order_search'])->middleware(['auth','admin']);
Route::get('admin_orders', [AdminController::class, 'admin_orders'])->middleware(['auth','admin']);
Route::post('bulk_update_order_status', [AdminController::class, 'bulk_update_order_status'])->middleware(['auth', 'admin'])->name('bulk_update_order_status');
Route::get('to_pay', [AdminController::class, 'to_pay'])->middleware(['auth','admin']);

// for super admin
Route::middleware(['auth', 'super'])->group(function () {
    route::get('super_dashboard',[HomeController::class,'super_index']);


    route::get('view_section',[SuperController::class,'view_section']);
    route::post('add_section',[SuperController::class,'add_section']);
    route::get('delete_section/{id}',[SuperController::class,'delete_section']);

    route::get('view_ship',[SuperController::class,'view_ship']);   
    route::post('add_ship',[SuperController::class,'add_ship']);
    route::get('delete_ship/{id}',[SuperController::class,'delete_ship']);


    route::get('view_department',[SuperController::class,'view_department']);
    route::post('add_department',[SuperController::class,'add_department']);
    route::get('delete_department/{id}',[SuperController::class,'delete_department']);

    route::get('view_fee',[SuperController::class,'view_fee']);
    route::post('add_fee',[SuperController::class,'add_fee']);
    route::get('delete_fee/{id}',[SuperController::class,'delete_fee']);
    Route::get('edit_fee/{id}', [SuperController::class, 'edit_fee']);
    Route::post('update_fee/{id}', [SuperController::class, 'update_fee']);
});