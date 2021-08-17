<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoriesController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoriesController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoriesController');

    // Ingredients
    Route::delete('ingredients/destroy', 'IngredientsController@massDestroy')->name('ingredients.massDestroy');
    Route::resource('ingredients', 'IngredientsController');

    // Variations Size
    Route::delete('variations-sizes/destroy', 'VariationsSizeController@massDestroy')->name('variations-sizes.massDestroy');
    Route::resource('variations-sizes', 'VariationsSizeController');

    // Crusts
    Route::delete('crusts/destroy', 'CrustsController@massDestroy')->name('crusts.massDestroy');
    Route::resource('crusts', 'CrustsController');

    // Products
    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
    Route::post('products/media', 'ProductsController@storeMedia')->name('products.storeMedia');
    Route::post('products/ckmedia', 'ProductsController@storeCKEditorImages')->name('products.storeCKEditorImages');
    Route::resource('products', 'ProductsController');

    // Product Variation Sizes
    Route::delete('product-variation-sizes/destroy', 'ProductVariationSizesController@massDestroy')->name('product-variation-sizes.massDestroy');
    Route::resource('product-variation-sizes', 'ProductVariationSizesController');

    // Product Crust Size
    Route::delete('product-crust-sizes/destroy', 'ProductCrustSizeController@massDestroy')->name('product-crust-sizes.massDestroy');
    Route::resource('product-crust-sizes', 'ProductCrustSizeController');

    // Dishes
    Route::delete('dishes/destroy', 'DishesController@massDestroy')->name('dishes.massDestroy');
    Route::resource('dishes', 'DishesController');

    // Dish Ingredients
    Route::delete('dish-ingredients/destroy', 'DishIngredientsController@massDestroy')->name('dish-ingredients.massDestroy');
    Route::resource('dish-ingredients', 'DishIngredientsController');

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Customer Management
    Route::delete('customer-managements/destroy', 'CustomerManagementController@massDestroy')->name('customer-managements.massDestroy');
    Route::resource('customer-managements', 'CustomerManagementController');

    // Address
    Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    Route::resource('addresses', 'AddressController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
