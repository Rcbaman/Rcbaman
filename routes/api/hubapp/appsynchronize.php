<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Hubapp\Cashier\AppSynchronizeController;

/****
 *  ADD UPDATE SETTINGS 
 *  @NEW  SETTINGS
 *  @UPDATE SETTINGS
 */


Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier', 'middleware' => ['auth:sanctum']], function () {
    
    Route::resource('settings','AppSynchronizeController');
});
