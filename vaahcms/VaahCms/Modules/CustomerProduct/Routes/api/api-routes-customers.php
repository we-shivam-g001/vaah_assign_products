<?php

/*
 * API url will be: <base-url>/public/api/customerproduct/customers
 */
Route::group(
    [
        'prefix' => 'customerproduct/customers',
        'namespace' => 'Backend',
    ],
function () {

    /**
     * Get Assets
     */
    Route::get('/assets', 'CustomersController@getAssets')
        ->name('vh.backend.customerproduct.api.customers.assets');
    /**
     * Get List
     */
    Route::get('/', 'CustomersController@getList')
        ->name('vh.backend.customerproduct.api.customers.list');
    /**
     * Update List
     */
    Route::match(['put', 'patch'], '/', 'CustomersController@updateList')
        ->name('vh.backend.customerproduct.api.customers.list.update');
    /**
     * Delete List
     */
    Route::delete('/', 'CustomersController@deleteList')
        ->name('vh.backend.customerproduct.api.customers.list.delete');


    /**
     * Create Item
     */
    Route::post('/', 'CustomersController@createItem')
        ->name('vh.backend.customerproduct.api.customers.create');
    /**
     * Get Item
     */
    Route::get('/{id}', 'CustomersController@getItem')
        ->name('vh.backend.customerproduct.api.customers.read');
    /**
     * Update Item
     */
    Route::match(['put', 'patch'], '/{id}', 'CustomersController@updateItem')
        ->name('vh.backend.customerproduct.api.customers.update');
    /**
     * Delete Item
     */
    Route::delete('/{id}', 'CustomersController@deleteItem')
        ->name('vh.backend.customerproduct.api.customers.delete');

    /**
     * List Actions
     */
    Route::any('/action/{action}', 'CustomersController@listAction')
        ->name('vh.backend.customerproduct.api.customers.list.action');

    /**
     * Item actions
     */
    Route::any('/{id}/action/{action}', 'CustomersController@itemAction')
        ->name('vh.backend.customerproduct.api.customers.item.action');



});
