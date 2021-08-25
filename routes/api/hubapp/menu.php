
<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\V1\Hubapp\Cashier\PizzaMenuController;

/****
 *  ADD UPDATE  CUSTOMER 
 *  @NEW CUSTOMER
 *  @NEW ADDRESS
 *  @UPDATE ADDRESS
 */

Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier', 'middleware' => ['auth:sanctum']], function () {
    
    Route::get('categories', [PizzaMenuController::class,'listOfCategory']);
    Route::post('category/{id}/product', [PizzaMenuController::class,'productIdByProductInfo']);
    Route::get('product', [PizzaMenuController::class,'GetProductByCategory']);
    
        
});