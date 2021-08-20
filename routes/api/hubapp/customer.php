
<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\Hubapp\Cashier\CashierWithCustomerController;

/****
 *  ADD UPDATE  CUSTOMER 
 *  @NEW CUSTOMER
 *  @NEW ADDRESS
 *  @UPDATE ADDRESS
 */

Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier', 'middleware' => ['auth:sanctum']], function () {
    
    Route::get('checkcustomer',       [CashierWithCustomerController::class,'customerExistOrNot']);
    Route::post('addcustomer',        [CashierWithCustomerController::class,'addNewCustomer']);
    Route::post('newaddress',         [CashierWithCustomerController::class,'addCustomerAddress']);
    Route::post('editaddress/{id}',   [CashierWithCustomerController::class,'editCustomerAddress']);
    Route::post('updateaddress/{id}', [CashierWithCustomerController::class,'updateCustomerAddress']);
    Route::post('deleteaddress/{}',   [CashierWithCustomerController::class,'deleteCustomerAddress']);
        
});