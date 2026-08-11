<?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminPromoCodesController;
use App\Http\Controllers\Admin\ProductAttributesController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

        Route::prefix('promo-codes')->group(function () {
            Route::get('/', [AdminPromoCodesController::class, 'index'])->name('admin.promocodes.index');
            Route::post('/create', [AdminPromoCodesController::class, 'create'])->name('admin.promocodes.create');
            Route::patch('/change-status', [AdminPromoCodesController::class, 'changeStatus'])->name('admin.promocodes.change-status');
            Route::delete('/delete', [AdminPromoCodesController::class, 'delete'])->name('admin.promocodes.delete');
        });
        Route::prefix('orders')->group(function () {
            Route::get('/', [AdminOrdersController::class, 'index'])->name('admin.orders.index');
            Route::get('/show/{order_id}',  [AdminOrdersController::class, 'show'])->name('admin.orders.show');
            Route::put('/{order}/status', [AdminOrdersController::class, 'updateOrderStatus'])->name('admin.update.order.status');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', [AdminProductsController::class, 'index'])->name('admin.products.index');
            Route::get('/create-product-view', [AdminProductsController::class, 'createProductView'])->name('admin.products.create');
            Route::get('/{slug}', [AdminProductsController::class, 'show'])->name('admin.products.show');
            Route::post('/create/{product?}', [AdminProductsController::class, 'create'])->name('admin.product.create');

            Route::put('/{product}', [AdminProductsController::class, 'update'])->name('admin.product.update');
            Route::delete('/{product:slug}', [AdminProductsController::class, 'destroy'])->name('admin.products.destroy');
            Route::delete('/gallery-image/delete/{product}', [AdminProductsController::class, 'deleteGalleryImage'])
                  ->name('product.gallery-image.delete');
        });


        Route::prefix('product-attributes')->group(function () {
            Route::get('/', [ProductAttributesController::class, 'index'])->name('admin.attributes.index');
            Route::post('/types',          [ProductAttributesController::class, 'storeType'])->name('admin.attributes.types.store');
            Route::delete('/types/{type}', [ProductAttributesController::class, 'destroyType'])->name('admin.attributes.types.destroy');
            Route::post('/values',           [ProductAttributesController::class, 'storeValue'])->name('admin.attributes.values.store');
            Route::delete('/values/{value}', [ProductAttributesController::class, 'destroyValue'])->name('admin.attributes.values.destroy');
        });


        Route::prefix('categories')->group(function () {
            Route::get('/', [AdminCategoriesController::class, 'index'])->name('admin.category.index');
            Route::post('/categories', [AdminCategoriesController::class, 'create'])->name('category.create');
        });
    });
