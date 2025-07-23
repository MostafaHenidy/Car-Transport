<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\TripsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    'as' => 'front.',
], function () {

    // Front page Routes 
    Route::controller(TripsController::class)->group(function () {
        route::get('/',  'index')->name('index');
        route::post('/',  'storeReview')->name('review.storeReview');
    });

    // Cart page Routes 

    Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
        route::get('/', 'index')->name('index');
        route::get('/addToCart/{trip:slug}', 'addToCart')->name('addToCart');
        route::get('/removeFromCart/{trip:slug}', 'removeFromCart')->name('removeFromCart');
    });

    // Checkout page Routes 

    Route::group(
        [
            'middleware' => ['auth', 'verified'],
            'prefix' => 'checkout',
            'as' => 'checkout.'
        ],
        function () {
            Route::controller(CheckoutController::class)->group(function () {
                // route::get('/', 'checkout')->name('checkout');
                route::get('/', 'checkoutLineItems')->name('checkoutLineItems');
                route::get('/success', 'success')->name('checkout.success');
                route::get('/cancel', 'cancel')->name('checkout.cancel');
            });
        }
    );
    //Notifications Modal Routes
    Route::group(
        [
            'middleware' => ['auth', 'verified'],
            'as' => 'notifications.'
        ],
        function () {
            Route::controller(Controller::class)->group(function () {
                route::get('/markAsRead/{notification_id}', 'markAsRead')->name('markAsRead');
                route::get('/clearAll', 'clearAll')->name('clearAll');
            });
        }
    );
    // Support Tickets Pages
    Route::group(
        [
            'middleware' => ['auth', 'verified'],
            'as' => 'ticket.',
        ],
        function () {
            Route::controller(SupportTicketController::class)->group(function () {
                route::get('/submitTicket', 'index')->name('index');
                route::post('/submitTicket', 'store')->name('store');
                Route::post('/support-tickets/{ticket}/reply', 'replyToTicket')->name('replyToTicket');
                route::get('/submitTicket/myTickets', 'myTickets')->name('myTickets');
            });
        }
    );
    Route::group(
        [
            'prefix' => 'github',
            'as' => 'socialite.',
        ],
        function () {
            Route::controller(SocialiteController::class)->group(function () {
                route::get('/login', 'githubLogin')->name('githubLogin');
                route::get('/redirect', 'githubRedirect')->name('githubRedirect');
            });
        }
    );
    Route::group(
        [
            'prefix' => 'google',
            'as' => 'socialite.',
        ],
        function () {
            Route::controller(SocialiteController::class)->group(function () {
                route::get('/login', 'googleLogin')->name('googleLogin');
                route::get('/redirect', 'googleRedirect')->name('googleRedirect');
            });
        }
    );
});
require __DIR__ . '/auth.php';
