<?php

Route::group(
    [
        'prefix' => 'backend/customerproduct/users',
                
                'middleware' => ['web', 'has.backend.access'],
                
                'namespace' => 'Backend',
    ],
    function () {
        /**
         * Get Assets
         */
        Route::get('/assets', 'UsersController@getAssets')
            ->name('vh.backend.customerproduct.users.assets');
        /**
         * Get List
         */
        Route::get('/', 'UsersController@getList')
            ->name('vh.backend.customerproduct.users.list');
        /**
         * Update List
         */
        Route::match(['put', 'patch'], '/', 'UsersController@updateList')
            ->name('vh.backend.customerproduct.users.list.update');
        /**
         * Delete List
         */
        Route::delete('/', 'UsersController@deleteList')
            ->name('vh.backend.customerproduct.users.list.delete');


        /**
         * Create Item
         */
        Route::post('/', 'UsersController@createItem')
            ->name('vh.backend.customerproduct.users.create');
        /**
         * Get Item
         */
        Route::get('/{id}', 'UsersController@getItem')
            ->name('vh.backend.customerproduct.users.read');
        /**
         * Update Item
         */
        Route::match(['put', 'patch'], '/{id}', 'UsersController@updateItem')
            ->name('vh.backend.customerproduct.users.update');
        /**
         * Delete Item
         */
        Route::delete('/{id}', 'UsersController@deleteItem')
            ->name('vh.backend.customerproduct.users.delete');

        /**
         * List Actions
         */
        Route::any('/action/{action}', 'UsersController@listAction')
            ->name('vh.backend.customerproduct.users.list.actions');

        /**
         * Item actions
         */
        Route::any('/{id}/action/{action}', 'UsersController@itemAction')
            ->name('vh.backend.customerproduct.users.item.action');

        //---------------------------------------------------------

        //---------------------------------------------------------
        Route::get('/item/{id}/roles', 'UsersController@getItemRoles')
            ->name('vh.backend.customerproduct.users.role');

        Route::post('/actions/{action_name}', 'UsersController@postActions')
            ->name('vh.backend.customerproduct.users.actions');
        //---------------------------------------------------------
        Route::post('/avatar/store', 'UsersController@storeAvatar')
            ->name('vh.backend.customerproduct.users.avatar.store');
        //---------------------------------------------------------
        Route::post('/avatar/remove', 'UsersController@removeAvatar')
            ->name('vh.backend.customerproduct.users.avatar.remove');
        //---------------------------------------------------------
    });
