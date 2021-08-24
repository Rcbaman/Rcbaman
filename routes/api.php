<?php

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

    // Orders
    Route::apiResource('orders', 'OrdersApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionsApiController');

    // Customer Details
    Route::apiResource('customer-details', 'CustomerDetailsApiController');

    // Customer Addresses
    Route::apiResource('customer-addresses', 'CustomerAddressesApiController');

    // Tax Profiles
    Route::apiResource('tax-profiles', 'TaxProfilesApiController');

    // Logs
    Route::apiResource('logs', 'LogsApiController');

    // Settings
    Route::apiResource('settings', 'SettingsApiController');
});
