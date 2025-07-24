<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.'
    ],
    function () {
        Route::middleware('admin')->group(function () {
            // Admin Dashboard Page
            Route::controller(AdminController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
            Route::controller(AdminController::class)->name('orders.')->group(function () {
                Route::get('/orders', 'index')->name('index');
                Route::get('/orders/show', 'listAllOrders')->name('listAllOrders');
                Route::patch('/orders/{id}/update-status', 'updateOrderStatus')->name('updateOrderStatus');
            });
            Route::controller(AdminController::class)->name('trips.')->group(function () {
                Route::get('/trips', 'index')->name('index');
                Route::get('/trips/show', 'listAllTrips')->name('listAllTrips');
                Route::patch('/trips/{trip}',  'updateTrips')->name('update');
                Route::post('/trips',  'createTrip')->name('create');
                Route::delete('/trips/{trip}',  'deleteTrip')->name('delete');
            });
            Route::controller(AdminController::class)->name('tickets.')->group(function () {
                Route::get('/tickets', 'index')->name('index');
                Route::get('/tickets/show/{ticket}', 'showTickets')->name('showTickets');
                Route::post('tickets/{ticket}/reply', 'reply')->name('reply');
            });
            Route::controller(AdminController::class)->name('reviews.')->group(function () {
                Route::get('/reviews/show', 'listAllReviews')->name('listAllReviews');
                Route::patch('/reviews/{review}', 'approveReview')->name('approveReview');
            });
            Route::controller(AdminController::class)->name('users.')->group(function () {
                Route::get('/users/show', 'listDeletedUsers')->name('listDeletedUsers');
                Route::patch('/users/{user}', 'recoverUserAccount')->name('recoverUserAccount');
            });
            Route::controller(AdminController::class)->name('support_stuff.')->group(function () {
                Route::get('/stuff/show', 'ListAllSupportStuff')->name('ListAllSupportStuff');
                Route::post('/stuff/add',  'AddAgent')->name('AddAgent');
                Route::delete('/stuff/{agent}/delete',  'DeleteAgent')->name('DeleteAgent');
                Route::patch('/stuff/{agent}',  'recoverAgentAccount')->name('recoverAgentAccount');
            });
        });
        require __DIR__ . '/adminAuth.php';
    }

);
