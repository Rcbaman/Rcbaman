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

    // Orders
    Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrdersController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');

    // Customer Details
    Route::delete('customer-details/destroy', 'CustomerDetailsController@massDestroy')->name('customer-details.massDestroy');
    Route::resource('customer-details', 'CustomerDetailsController');

    // Customer Addresses
    Route::delete('customer-addresses/destroy', 'CustomerAddressesController@massDestroy')->name('customer-addresses.massDestroy');
    Route::resource('customer-addresses', 'CustomerAddressesController');

    // Tax Profiles
    Route::delete('tax-profiles/destroy', 'TaxProfilesController@massDestroy')->name('tax-profiles.massDestroy');
    Route::resource('tax-profiles', 'TaxProfilesController');

    // Product Ingredients
    Route::delete('product-ingredients/destroy', 'ProductIngredientsController@massDestroy')->name('product-ingredients.massDestroy');
    Route::resource('product-ingredients', 'ProductIngredientsController');

    // Logs
    Route::delete('logs/destroy', 'LogsController@massDestroy')->name('logs.massDestroy');
    Route::resource('logs', 'LogsController');

    // Settings
    Route::delete('settings/destroy', 'SettingsController@massDestroy')->name('settings.massDestroy');
    Route::resource('settings', 'SettingsController');

    // Product Profile
    Route::delete('product-profiles/destroy', 'ProductProfileController@massDestroy')->name('product-profiles.massDestroy');
    Route::resource('product-profiles', 'ProductProfileController');

    // Crust Size
    Route::delete('crust-sizes/destroy', 'CrustSizeController@massDestroy')->name('crust-sizes.massDestroy');
    Route::resource('crust-sizes', 'CrustSizeController');

    // Ingredients Size
    Route::delete('ingredients-sizes/destroy', 'IngredientsSizeController@massDestroy')->name('ingredients-sizes.massDestroy');
    Route::resource('ingredients-sizes', 'IngredientsSizeController');

    // Product Sizes
    Route::delete('product-sizes/destroy', 'ProductSizesController@massDestroy')->name('product-sizes.massDestroy');
    Route::resource('product-sizes', 'ProductSizesController');
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
