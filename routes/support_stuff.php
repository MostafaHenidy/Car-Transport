<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupportStuffController;
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
        'prefix' => 'SupportStuff',
        'as' => 'support_stuff.'
    ],
    function () {
        Route::middleware(['support_stuff', 'lastSeen'])->group(function () {
            Route::controller(SupportStuffController::class)->group(function () {
                Route::get('/', 'index')->name('index');
            });
            Route::controller(SupportStuffController::class)->name('tickets.')->group(function () {
                Route::get('/tickets', 'index')->name('index');
                Route::get('/tickets/show/{ticket}', 'showTickets')->name('showTickets');
                Route::post('tickets/{ticket}/reply', 'replyToTicket')->name('replyToTicket');
                Route::put('tickets/{ticket}/updateTicketStatus', 'updateTicketStatus')->name('updateTicketStatus');
                Route::delete('tickets/{ticket}/deleteTicket', 'deleteTicket')->name('deleteTicket');
            });
        });

        require __DIR__ . '/support_stuffAuth.php';
    }

);
