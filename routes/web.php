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
Route::get('/create_ticket', 'TicketController@show');
Route::post('/ticket/add/', 'TicketController@addTicket');

Route::get('/all_tickets', 'TicketController@show');
Route::get('/finance_tickets', 'TicketController@show');
Route::get('/sales_tickets', 'TicketController@show');
Route::get('/it_tickets', 'TicketController@show');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'MainController@index');