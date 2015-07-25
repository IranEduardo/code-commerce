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

Route::group(['prefix' => 'admin'],function() {

    Route::group(['prefix' => 'categories'], function () {

        Route::get('/', ['as' => 'categories',
            'uses' => 'AdminCategoriesController@index'
        ]);

        Route::get('show/{id}', ['as' => 'show',
            'uses' => 'AdminCategoriesController@show'
        ]);

        Route::get('create', ['as' => 'create',
            'uses' => 'AdminCategoriesController@create'
        ]);

        Route::get('edit/{id}', ['as' => 'edit',
            'uses' => 'AdminCategoriesControllerr@edit'
        ]);

        Route::post('store', ['as' => 'store',
            'uses' => 'AdminCategoriesControllerr@store'
        ]);

        Route::put('update/{id}', ['as' => 'update',
            'uses' => 'AdminCategoriesController@update'
        ]);

        Route::delete('destroy/{id}', ['as' => 'delete',
            'uses' => 'AdminCategoriesController@destroy'
        ]);
    });

    Route::group(['prefix' => 'products'], function () {

        Route::get('/', ['as' => 'products',
            'uses' => 'AdminProductsController@index'
        ]);

        Route::get('show/{id}', ['as' => 'show',
            'uses' => 'AdminProductsController@show'
        ]);

        Route::get('create', ['as' => 'create',
            'uses' => 'AdminProductsController@create'
        ]);

        Route::get('edit/{id}', ['as' => 'edit',
            'uses' => 'AdminProductsController@edit'
        ]);

        Route::post('store', ['as' => 'store',
            'uses' => 'AdminProductsController@store'
        ]);

        Route::put('update/{id}', ['as' => 'update',
            'uses' => 'AdminProductsController@update'
        ]);

        Route::delete('destroy/{id}', ['as' => 'delete',
            'uses' => 'AdminProductsController@destroy'
        ]);
    });
});

