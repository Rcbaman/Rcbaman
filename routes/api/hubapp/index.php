<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// authentication
Route::middleware('api')
->namespace('App\Http\Controllers')
->group(base_path('routes/api/hubapp/authentication.php'));

// customer 
Route::middleware('api')
->namespace('App\Http\Controllers')
->group(base_path('routes/api/hubapp/customer.php'));

// transactions
Route::middleware('api')
->namespace('App\Http\Controllers')
->group(base_path('routes/api/hubapp/transactions.php'));

 // orders history
 Route::middleware('api')
 ->namespace('App\Http\Controllers')
 ->group(base_path('routes/api/hubapp/ordershistory.php'));

 // Logs 
 Route::middleware('api')
 ->namespace('App\Http\Controllers')
 ->group(base_path('routes/api/hubapp/logs.php'));