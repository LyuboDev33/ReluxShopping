<?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminGlassesController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminPromoCodesController;
use App\Http\Controllers\Admin\ProductAttributesController;

use Illuminate\Support\Facades\Route;



Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {

        Route::prefix('glasses')->group(function () {
            Route::get('/', [AdminGlassesController::class, 'index'])->name('admin.glasses.index');

            Route::post('/store', [AdminGlassesController::class, 'storeGlass'])->name('admin.glasses.store');
            Route::delete('/destroy/{glass}', [AdminGlassesController::class, 'destroyGlass'])->name('admin.glasses.destroy');

            Route::post('/values/store', [AdminGlassesController::class, 'storeGlassValue'])->name('admin.glass-values.store');
            Route::put('/values/update/{glassValue}', [AdminGlassesController::class, 'updateGlassValue'])->name('admin.glass-values.update');
            Route::delete('/values/destroy/{glassValue}', [AdminGlassesController::class, 'destroyGlassValue'])->name('admin.glass-values.destroy');

            Route::post('/lances/store', [AdminGlassesController::class, 'storeLance'])->name('admin.lances.store');
            Route::put('/lances/update/{lance}', [AdminGlassesController::class, 'updateLance'])->name('admin.lances.update');
            Route::delete('/lances/destroy/{lance}', [AdminGlassesController::class, 'destroyLance'])->name('admin.lances.destroy');

            Route::post('/lance-colors/store', [AdminGlassesController::class, 'storeLanceColor'])->name('admin.lance-colors.store');
            Route::put('/lance-colors/update/{lanceColor}', [AdminGlassesController::class, 'updateLanceColor'])
                ->name('admin.lance-colors.update');
            Route::delete('/lance-colors/destroy/{lanceColor}', [AdminGlassesController::class, 'destroyLanceColor'])
                ->name('admin.lance-colors.destroy');
        });


        Route::prefix('promo-codes')->group(function () {
            Route::get('/', [AdminPromoCodesController::class, 'index'])->name('admin.promocodes.index');
            Route::post('/create', [AdminPromoCodesController::class, 'create'])->name('admin.promocodes.create');
            Route::patch('/change-status', [AdminPromoCodesController::class, 'changeStatus'])->name('admin.promocodes.change-status');
            Route::delete('/delete', [AdminPromoCodesController::class, 'delete'])->name('admin.promocodes.delete');
        });
        Route::prefix('orders')->group(function () {
            Route::get('/', [AdminOrdersController::class, 'index'])->name('admin.orders.index');
            Route::get('/show/{order_id}',  [AdminOrdersController::class, 'show'])->name('admin.orders.show');
            Route::put('/update-order-status', [AdminOrdersController::class, 'updateOrderStatus'])->name('admin.update.order.status');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', [AdminProductsController::class, 'index'])->name('admin.products.index');
            Route::get('/create-product-view', [AdminProductsController::class, 'createProductView'])->name('admin.products.create');
            Route::get('/{slug}', [AdminProductsController::class, 'show'])->name('admin.products.show');
            Route::post('/create/{product?}', [AdminProductsController::class, 'create'])->name('admin.product.create');

            Route::patch('/toggle-lenses/{product}', [AdminProductsController::class, 'toggleProductLenses'])->name('admin.products.toggle-lenses');

            Route::put('/{product}', [AdminProductsController::class, 'update'])->name('admin.product.update');
            Route::delete('/{product:slug}', [AdminProductsController::class, 'destroy'])->name('admin.products.destroy');
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
