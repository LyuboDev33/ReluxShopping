<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('404');
});

Route::get('/', [FrontEndController::class, 'welcome']);

Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
Route::get('/about', [FrontEndController::class, 'about'])->name('about');
Route::get('/obshti-usloviya', [FrontEndController::class, 'conditions'])->name('conditions');
Route::get('/politika-za-poveritelnost', [FrontEndController::class, 'privacy'])->name('privacy');

/** All routes for the shop*/
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/category/{category_slug}', [ShopController::class, 'category'])->name('shop.category');
Route::get('/shop/product/{slug}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::get('/checkout/sucess', [ShopController::class, 'success'])->name('checkout.succes');

Route::post('/checkout/promocode/apply',[ShopController::class, 'applyPromoCode'])->name('checkout.promo.apply');

Route::post('/cart/add/{product}', [OrdersController::class, 'addProduct'])->name('product.cart.add');
Route::delete('/cart/remove/{productId}', [OrdersController::class, 'removeProduct'])->name('cart.remove');
Route::post('/order/create', [OrdersController::class, 'create'])->name('order.create');


/** All wishlist routes */
Route::prefix('wishlist')->group(function () {
    Route::get('/', [ShopController::class, 'wishlist'])->name('wishlist');
    Route::post('/add-to-wishlist/{product}', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
});


/** All routes for the services */
Route::get('/services', [FrontEndController::class, 'services'])->name('services');
Route::get('/service/{service}', [FrontEndController::class, 'serviceShow'])->name('service.show');


Route::get('/dashboard', function () {
    return view('Backend.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
