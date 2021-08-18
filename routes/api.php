<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\Hubapp\Cashier\CashierAuthController;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\CashierQuickController;
use App\Http\Controllers\Api\V1\Hubapp\Cashier\CashierWithCustomerController;



Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Categories
    Route::post('categories/media', 'CategoriesApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoriesApiController');

    // Ingredients
    Route::apiResource('ingredients', 'IngredientsApiController');

    // Variations Size
    Route::apiResource('variations-sizes', 'VariationsSizeApiController');

    // Crusts
    Route::apiResource('crusts', 'CrustsApiController');

    // Products
    Route::post('products/media', 'ProductsApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductsApiController');

    // Product Variation Sizes
    Route::apiResource('product-variation-sizes', 'ProductVariationSizesApiController');

    // Product Crust Size
    Route::apiResource('product-crust-sizes', 'ProductCrustSizeApiController');

    // Dishes
    Route::apiResource('dishes', 'DishesApiController');

    // Dish Ingredients
    Route::apiResource('dish-ingredients', 'DishIngredientsApiController');

    // Orders
    Route::apiResource('orders', 'OrdersApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionsApiController');


    
});

 //Cashier Login & Registration
Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier'], function (){
    Route::post('register', [CashierAuthController::class,'Register']);
    Route::post('login', [CashierAuthController::class,'Login']);
    Route::get('categories', [CashierQuickController::class,'categoriesList']);
    Route::get('category/{id}/dishes', [CashierQuickController::class,'CategoriesByDishes']);

});

Route::group(['prefix' => 'v1/hubapp', 'as' => 'api.', 'namespace' => 'Api\V1\Hubapp\Cashier', 'middleware' => ['auth:sanctum']], function () {
    // Cashier Profile Information
    Route::get('profile', [CashierAuthController::class,'Profile']);
    Route::post('getcustomer', [CashierWithCustomerController::class,'customerExistOrNot']);
    Route::post('addcustomer', [CashierWithCustomerController::class,'addNewCustomer']);
    Route::post('newaddress', [CashierWithCustomerController::class,'addCustomerAddress']);
    
    
});
