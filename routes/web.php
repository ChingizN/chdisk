<?php

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

Route::get('/', 'MainController@index');
Route::get('/create_ticket', 'TicketController@createTicket');
Route::post('/ticket/add/', 'TicketController@addTicket');
Route::get('/ticket/{id}', 'TicketController@showTicket');
Route::post('/message/send/{id}', 'MessageController@sendMessage');
Route::get('/ticket/status-change/{id}', 'TicketController@ticketStatus');

Route::get('/tickets/filter', 'MainController@ticketFilter');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'MainController@index');