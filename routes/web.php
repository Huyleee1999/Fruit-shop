<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\ListUsersController;
use App\Events\MessageSent;
use App\Http\Controllers\BillingsController;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopDetailController;
use App\Http\Controllers\FruitController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CalendarController;

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
    Route::get('/sign-in', [AuthController::class, 'index'])->name('auth');
    Route::post('/sign-in', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'create'])->name('registation');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);

    // Search
    Route::get('/search', [SearchController::class, 'search'])->name('search');


Route::middleware(['auth'])->group(function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware(['userAccess:admin']);
        Route::get('/list-users', [ListUsersController::class, 'index'])->name('list-users');
        Route::get('/create-user', [ListUsersController::class, 'create'])->name('create-user');
        Route::get('/edit-user/{id}', [ListUsersController::class, 'edit'])->name('edit-user');
        Route::post('/delete-user/{id}', [ListUsersController::class, 'delete']);
    
        Route::get('/user-management', [UserManageController::class, 'index'])->name('user-management');
    
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
        Route::get('/chat', [ChatController::class, 'showChat'])->name('chat.show');
        Route::post('/chat/message', [ChatController::class, 'messageReceived'])->name('chat.message');
        
        Route::group(['prefix' => 'fruit'], function () {
            Route::get('/show', [FruitController::class, 'showAddFruit'])->name('fruit.show');
            Route::post('/add', [FruitController::class, 'addFruit'])->name('fruit.add');
            Route::get('/', [FruitController::class, 'index'])->name('fruit.index');
            Route::delete('/delete/{id}', [FruitController::class, 'delete'])->name('fruit.delete');

        Route::group(['prefix' => 'calendar'], function() {
            Route::get('/', [CalendarController::class, 'index'])->name('calendar.index');
            Route::post('/store', [CalendarController::class, 'store'])->name('calendar.store')->middleware('web');
        });
    });

   
    });

    Route::group(['prefix' => 'shop'], function () {
        Route::get('/', [ShopController::class, 'index'])->name('shop.index');
        Route::get('/detail/{id}', [ShopController::class, 'detail'])->name('shopdetail.index');
        Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
        Route::get('/add-cart/{id}', [CartController::class, 'addCart'])->name('cart.show.add');
        Route::post('/add-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::get('/get-quantity-cart/{id}', [ShopController::class, 'getQuantityCart'])->name('get.quantity.cart');
        Route::delete('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('delete.cart');
        Route::get('/billings', [BillingsController::class, 'showProceed'])->name('show.proceed');
        Route::post('/billings', [BillingsController::class, 'addProceed'])->name('add.proceed');
    });

    Route::group(['prefix' => 'payment'], function () {
       
        // Thanh toán VNPay
        Route::post('/', [VNPayController::class, 'createPayment'])->name('payment.create');
        Route::get('/callback', [VNPayController::class, 'callback'])->name('payment.callback');

        Route::get('/success', [VNPayController::class, 'paymentSuccess'])->name('payment.success');
        
        Route::get('/failed', function() {
            return 'failed';
        })->name('payment.failed'); 
    });


    Route::group(['prefix' => 'contact'], function() {
        Route::get('/', [ContactController::class, 'index'])->name('contact.index');
    });

   
});




