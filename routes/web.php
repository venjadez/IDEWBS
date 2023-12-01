<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//   return view('welcome');
// });

Auth::routes();

// fronted routes
Route::get('/', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'productView']);

Route::middleware(['auth'])->group(function () {
    Route::get('wishlist', [App\Http\Controllers\FrontEnd\WishlistController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\FrontEnd\CartController::class, 'index']);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });
    // Brand Routes
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);
    Route::get('/brands/{id}', App\Http\Livewire\Admin\Brand\Index::class);
    // Product Routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{product}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/products/{product}/delete', 'destroy');
        Route::get('/product-image/{product_image_id}/delete', 'removeImage');
        Route::post('product-color/{prod_color_id}', 'updateProdColorQty');
        Route::get('/product-color/{prod_color_id}/remove', 'removeColor');
    });
    // Size Routes
    Route::controller(App\Http\Controllers\Admin\SizeController::class)->group(function () {
        Route::get('/sizes', 'index');
        Route::get('/sizes/create', 'create');
        Route::post('/sizes/store', 'store');
        Route::get('/sizes/{size_id}/edit', 'edit');
        Route::put('/sizes/{size_id}/update', 'update');
        Route::get('/sizes/{size_id}/remove', 'remove');
    });
    // Color Routes
    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/store', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color}/update', 'update');
        Route::get('/colors/{color}/remove', 'remove');
    });
    // Slider Routes
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/tableSilders', 'tableSliders')->name('tableSliders');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/store', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('/sliders/{slider}/update', 'update');
        Route::get('/sliders/{slider}/destroy', 'destroy');
    });
});