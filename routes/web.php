<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductsController::class, 'index'])->name('products');

//Route::get('/products/add', [ProductsController::class, 'add']);
//
//Route::post('/products/add', [ProductsController::class, 'postAdd']);
//
//Route::put('/products/add', [ProductsController::class, 'putAdd']);
//
//Route::delete('/products/add', [ProductsController::class, 'delete']);
//
//Route::patch('/products/add', [ProductsController::class, 'addPatch']);

//Route::options('/products/add', [ProductsController::class, 'addOptions']);

//Route::match(['get', 'post'], '/products/add', [ProductsController::class, 'add']);

//Route::any('products/add', [ProductsController::class, 'add']);

Route::redirect('san-pham', 'https://google.com', 302);

Route::view('them-san-pham', 'products.add', ['title' => 'Thêm sản phẩm']);

Route::prefix('admin')->name('admin.')->middleware('admin_auth')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('posts')->name('posts.')->group(function(){
        Route::get('/', [PostsController::class, 'index'])->name('index');

        Route::get('add', [PostsController::class, 'add'])->name('add');

        Route::post('add', [PostsController::class, 'postAdd']);

        Route::get('edit/{id}', [PostsController::class, 'edit'])->name('edit');

        Route::put('edit/{id}', [PostsController::class, 'putEdit']);

        Route::delete('delete/{id}', [PostsController::class, 'delete']);

        Route::get('report/{id?}', [PostsController::class, 'report'])->middleware('admin_report');

        Route::get('detail/{slug}-{id}', [PostsController::class, 'detail'])
        //->where(['slug'=>'.+', 'id'=>'\d+']);
        ->where('slug', '.+')
        ->where('id', '\d+')->name('detail');
    });

    //Route::get('users/add', [UsersController::class, 'create']);

    Route::resource('users', UsersController::class);

    Route::prefix('news')->name('news.')->group(function(){
        Route::get('/', [NewsController::class, 'index'])->name('index');

        Route::get('add', [NewsController::class, 'add'])->name('add');

        Route::post('add', [NewsController::class, 'postAdd']);
    });
});

















