
<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\Hubapp\Cashier\CashierLogsController;

/****
 *  ADD UPDATE  CUSTOMER 
 *  @NEW CUSTOMER
 *  @NEW ADDRESS
 *  @UPDATE ADDRESS
 */

Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier', 'middleware' => ['auth:sanctum']], function () {
    
    Route::get('logs/{id}',  [CashierLogsController::class,'index']);
    Route::post('logs', [CashierLogsController::class,'store']);
        
});