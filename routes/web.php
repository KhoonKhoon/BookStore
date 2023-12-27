<?php

use App\Http\Controllers\Permission\PermissionController;
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
//     return view('welcome');
// });

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /**
     * Category
     */
    Route::group(['prefix'=>'categories','as'=>'category.'], function(){
        Route::get('/index', [App\Http\Controllers\Category\CategoryController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Category\CategoryController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Category\CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{category?}',[App\Http\Controllers\Category\CategoryController::class, 'edit'])->name('edit');
        Route::get('/show/{category?}',[App\Http\Controllers\Category\CategoryController::class, 'show'])->name('show');

        Route::post('/update/{category?}', [App\Http\Controllers\Category\CategoryController::class, 'update'])->name('update');
        Route::delete('/delete/{category?}', [App\Http\Controllers\Category\CategoryController::class, 'delete'])->name('delete');
});

/**
 * Book
 */
Route::group(['prefix'=>'books','as'=>'book.'], function(){
    Route::get('/index', [App\Http\Controllers\Book\BookController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Book\BookController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\Book\BookController::class, 'store'])->name('store');
    Route::get('/edit/{book?}',[App\Http\Controllers\Book\BookController::class, 'edit'])->name('edit');
    Route::get('/show/{book?}',[App\Http\Controllers\Book\BookController::class, 'show'])->name('show');

    Route::post('/update/{book?}', [App\Http\Controllers\Book\BookController::class, 'update'])->name('update');
    Route::delete('/delete/{book?}', [App\Http\Controllers\Book\BookController::class, 'delete'])->name('delete');
});

/**
    * Author
 */
Route::group(['prefix'=>'authors','as'=>'author.'], function(){
    Route::get('/index', [App\Http\Controllers\Author\AuthorController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\Author\AuthorController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\Author\AuthorController::class, 'store'])->name('store');
    Route::get('/edit/{author?}',[App\Http\Controllers\Author\AuthorController::class, 'edit'])->name('edit');
    Route::get('/show/{author?}',[App\Http\Controllers\Author\AuthorController::class, 'show'])->name('show');

    Route::post('/update/{author?}', [App\Http\Controllers\Author\AuthorController::class, 'update'])->name('update');
    Route::delete('/delete/{author?}', [App\Http\Controllers\Author\AuthorController::class, 'delete'])->name('delete');
});

/**
    * User
 */
    Route::group(['prefix'=>'users','as'=>'user.'], function(){
        Route::get('/index', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        Route::get('/edit/{user?}',[App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        Route::get('/show/{user?}',[App\Http\Controllers\Admin\UserController::class, 'show'])->name('show');

        Route::post('/update/{user?}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        Route::delete('/delete/{user?}', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('delete');
        Route::get('/logout', [App\Http\Controllers\Admin\UserController::class, 'logout'])->name('logout');

    });

/**
 * Permission
 */
    Route::group(['prefix'=>'permissions', 'as'=> 'permission.'], function(){
        Route::get('/index/{user?}', [PermissionController::class, 'index'])->name('index');
        Route::post('/store/{user?}', [PermissionController::class, 'store'])->name('store');

    });

/**
    * Author
 */
Route::group(['prefix'=>'bookcopies','as'=>'bookcopy.'], function(){
    Route::get('/index', [App\Http\Controllers\BookCopy\BookCopyController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\BookCopy\BookCopyController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\BookCopy\BookCopyController::class, 'store'])->name('store');
    Route::get('/edit/{bookcopy?}',[App\Http\Controllers\BookCopy\BookCopyController::class, 'edit'])->name('edit');
    Route::get('/show/{bookcopy?}',[App\Http\Controllers\BookCopy\BookCopyController::class, 'show'])->name('show');

    Route::post('/update/{bookcopy?}', [App\Http\Controllers\BookCopy\BookCopyController::class, 'update'])->name('update');
    Route::delete('/delete/{bookcopy?}', [App\Http\Controllers\BookCopy\BookCopyController::class, 'delete'])->name('delete');
});

/**
 * Order
 */
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

});
Auth::routes();

