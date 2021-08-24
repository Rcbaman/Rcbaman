<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\Hubapp\Cashier\OrderHistoryController;
/****
 *  @show order history
 *  check order status 
 *  
 */

Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier', 'middleware' => ['auth:sanctum']], function () {
    
    Route::get('todayorders',  [OrderHistoryController::class,'todayOrderHistory']);
    Route::get('currentorders',[OrderHistoryController::class,'currentOrderHistory']);
    Route::post('orderhistory',[OrderHistoryController::class,'allOrderHistory']);
    Route::post('historyfilter',[OrderHistoryController::class,'orderHistoryFilter']);
   
});