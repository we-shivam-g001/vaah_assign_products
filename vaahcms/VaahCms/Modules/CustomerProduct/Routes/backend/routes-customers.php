<?php

Route::group(
    [
        'prefix' => 'backend/customerproduct/customers',

        'middleware' => ['web', 'has.backend.access'],

        'namespace' => 'Backend',
],
function () {
    /**
     * Get Assets
     */
    Route::get('/assets', 'CustomersController@getAssets')
        ->name('vh.backend.customerproduct.customers.assets');
    /**
     * Get List
     */
    Route::get('/', 'CustomersController@getList')
        ->name('vh.backend.customerproduct.customers.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'CustomersController@updateList')
        ->name('vh.backend.customerproduct.customers.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'CustomersController@deleteList')
        ->name('vh.backend.customerproduct.customers.list.delete');


    /**
     * Fill Form Inputs
     */
    Route::any('/fill', 'CustomersController@fillItem')
        ->name('vh.backend.customerproduct.customers.fill');

    /**
     * Create Item
     */
    Route::post('/', 'CustomersController@createItem')
        ->name('vh.backend.customerproduct.customers.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'CustomersController@getItem')
        ->name('vh.backend.customerproduct.customers.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'CustomersController@updateItem')
        ->name('vh.backend.customerproduct.customers.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'CustomersController@deleteItem')
        ->name('vh.backend.customerproduct.customers.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'CustomersController@listAction')
        ->name('vh.backend.customerproduct.customers.list.actions');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'CustomersController@itemAction')
        ->name('vh.backend.customerproduct.customers.item.action');

    //---------------------------------------------------------

});
