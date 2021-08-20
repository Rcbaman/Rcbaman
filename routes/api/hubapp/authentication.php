
<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\Hubapp\Cashier\CashierAuthController;


/****
 *  Cashier Login And Registration
 *  @Login
 *  @ Registration
 *  @auth:sanctum
 * 
 */
Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier'], function (){
    Route::post('register', [CashierAuthController::class,'Register']);
    Route::post('login', [CashierAuthController::class,'Login']);
});


Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier', 'middleware' => ['auth:sanctum']], function () {
    Route::get('profile', [CashierAuthController::class,'Profile']);
});