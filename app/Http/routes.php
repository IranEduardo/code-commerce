<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '[0-9]+');

Route::get('products', ['as' => 'products',
    'uses' => 'ProductsController@index'
]);
Route::get('products/create', ['as' => 'products.create',
    'uses' => 'ProductsController@create'
]);


/*Route::group(['prefix' => 'admin'],function() {

    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', ['as' => 'categories',
            'uses' => 'AdminCategoriesController@index'
        ]);

        Route::get('{id}/show', ['as' => 'categories.show',
            'uses' => 'AdminCategoriesController@show'
        ]);

        Route::get('create', ['as' => 'categories.create',
            'uses' => 'AdminCategoriesController@create'
        ]);

        Route::get('{id}/edit', ['as' => 'categories.edit',
            'uses' => 'AdminCategoriesController@edit'
        ]);

        Route::post('store', ['as' => 'categories.store',
            'uses' => 'AdminCategoriesController@store'
        ]);

        Route::put('{id}/update', ['as' => 'categories.update',
            'uses' => 'AdminCategoriesController@update'
        ]);

        Route::delete('{id}/destroy', ['as' => 'categories.delete',
            'uses' => 'AdminCategoriesController@destroy'
        ]);
    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('/', ['as' => 'products',
            'uses' => 'AdminProductsController@index'
        ]);

        Route::get('{id}/show', ['as' => 'products.show',
            'uses' => 'AdminProductsController@show'
        ]);

        Route::get('create', ['as' => 'products.create',
            'uses' => 'AdminProductsController@create'
        ]);

        Route::get('{id}/edit', ['as' => 'products.edit',
            'uses' => 'AdminProductsController@edit'
        ]);

        Route::post('store', ['as' => 'products.store',
            'uses' => 'AdminProductsController@store'
        ]);

        Route::put('{id}/update', ['as' => 'products.update',
            'uses' => 'AdminProductsController@update'
        ]);

        Route::delete('{id}/destroy', ['as' => 'products.delete',
            'uses' => 'AdminProductsController@destroy'
        ]);
    });
});

*/
