<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\TinyMce;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
    Route::view('setting', 'panel.setting.update')->name('settings');
    Route::view('categories', 'panel.category.list')->name('categories');
    Route::view('product-categories', 'panel.product_category.list')->name('product-categories');
    Route::group(['prefix' => 'products'], function () {
        Route::view('', 'panel.product.list')->name('products');
        Route::view('create', 'panel.product.create')->name('products.create');
        Route::view('edit/{id}', 'panel.product.update')->name('products.edit');
    });
    Route::group(['prefix' => 'articles'], function () {
        Route::view('', 'panel.article.list')->name('articles');
        Route::view('create', 'panel.article.create')->name('articles.create');
        Route::view('edit/{id}', 'panel.article.update')->name('articles.edit');
    });
    Route::group(['prefix' => 'pages'], function () {
        Route::view('', 'panel.page.list')->name('pages');
        Route::view('create', 'panel.page.create')->name('pages.create');
        Route::view('edit/{id}', 'panel.page.update')->name('pages.edit');
    });
    Route::group(['prefix' => 'setting'], function () {
        Route::view('general', 'panel.setting.general')->name('setting.general');
        Route::view('facebook', 'panel.setting.facebook')->name('setting.facebook');
        Route::view('google', 'panel.setting.google')->name('setting.google');
        Route::view('smtp', 'panel.setting.smtp')->name('setting.smtp');
        Route::view('openai', 'panel.setting.openai')->name('setting.openai');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::view('', 'panel.user.list')->name('users');
    });
});
