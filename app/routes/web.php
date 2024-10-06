<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
//use App\Http\Controllers\UserController;重複しているためコメントアウト
// use App\Http\Controllers\ItemController;
// use App\Http\Controllers\CartController;
//use App\Http\Controllers\GoodController;
//use App\Http\Controllers\HistoryController;
//use App\Http\Controllers\ReviewController;
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
//     return view('top-1');
// });
//Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
Route::get('/business-top', [DisplayController::class, 'index'])->name('business-top');
Route::get('/business-registration', [DisplayController::class, 'regi_index'])->name('business-registration');
Route::get('/purchase', [DisplayController::class, 'pur_index'])->name('purchase');
Route::post('/password-complete', [DisplayController::class, 'pass_index'])->name('password-complete');
Route::get('/top-1', [DisplayController::class, 'top1_index'])->name('top-1');
Route::get('/top-2', [DisplayController::class, 'top2_index'])->name('top-2');
Route::get('/mypage', [DisplayController::class, 'my_index'])->name('mypage');
Route::get('/withdrawal', [DisplayController::class, 'with_index'])->name('withdrawal');
Route::get('/withdrawal-complete', [DisplayController::class, 'withcom_index'])->name('withdrawal-complete');
Route::get('/edit', [DisplayController::class, 'edit_index'])->name('edit');
Route::get('/business-user', [DisplayController::class, 'busiuser_index'])->name('business-user');
Route::get('/business-item', [DisplayController::class, 'busiitem_index'])->name('business-item');
Route::get('/item_detail/{id}', 'itemController@itemDetail')->name('item.detail');
Route::get('/purchase/complete', [DisplayController::class, 'complete'])->name('purchase.complete');


//一覧表示

Route::resource('histories', HistoryController::class);
Route::resource('goods', GoodController::class);
Route::resource('reviews', ReviewController::class);
// アイテムIDを渡すためのcreateルート
Route::get('/reviews/create/{itemId}', [DisplayController::class, 'create'])->name('reviews.create');
Route::resource('carts', CartController::class);
Route::resource('items', ItemController::class);
Route::get('/top-1', 'ItemsController@index')->name('items.index');
Route::post('/ajaxlike', [DisplayController::class, 'ajaxlike'])->name('items.ajaxlike');


Route::resource('users', UserController::class);//認証機能（AUTH）を書いた後で元に戻す　今はログイン機能を書いていないので外に出さないと反映されない
Route::get('/purchase/complete', function () {
    return view('purchase-complete');
})->name('purchase-complete');
});