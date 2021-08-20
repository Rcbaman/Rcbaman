<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// authentication
Route::prefix('api')
->middleware('api')
->namespace('Api\V1\Hubapp\Cashier')
->group(base_path('routes/api/hubapp/authentication.php'));

// customer 
Route::prefix('api')
->middleware('api')
->namespace('Api\V1\Hubapp\Cashier')
->group(base_path('routes/api/hubapp/customer.php'));

// transactions
Route::prefix('api')
->middleware('api')
->namespace('Api\V1\Hubapp\Cashier')
->group(base_path('routes/api/hubapp/transactions.php'));

 // orders history
 Route::prefix('api')
 ->middleware('api')
 ->namespace('Api\V1\Hubapp\Cashier')
 ->group(base_path('routes/api/hubapp/ordershistory.php'));