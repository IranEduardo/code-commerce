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

/*Route::get('/', function() {
    return view('app');
}); */

Route::get('/','StoreController@index');

Route::get('store/category/{id}/products',['as' =>'store.CategoryProducts', 'uses' => 'StoreController@CategoryProducts'] );

Route::get('store/product/{id}/details',['as' =>'store.productDetails', 'uses' => 'StoreController@ProductDetails'] );

Route::get('store/tag/{id}/products',['as' =>'store.TagProducts', 'uses' => 'StoreController@TagProducts'] );


Route::group(['prefix' => 'admin', 'where' =>['id' => '[0-9]+']], function(){

      Route::group(['prefix' => 'products'], function() {

              route::get('', ['as' => 'products',
                  'uses' => 'ProductsController@index'
              ]);
              route::get('create', ['as' => 'products.create',
                  'uses' => 'ProductsController@create'
              ]);
              route::post('store', ['as' => 'products.store',
                  'uses' => 'ProductsController@store'
              ]);
              route::get('{id}/edit', ['as' => 'products.edit',
                  'uses' => 'ProductsController@edit'
              ]);
              route::get('{id}/destroy', ['as' => 'products.destroy',
                  'uses' => 'ProductsController@destroy'
              ]);
              route::put('{id}/update', ['as' => 'products.update',
                  'uses' => 'ProductsController@update'
              ]);

             Route::group(['prefix' => 'images'], function() {

                 Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
                 Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
                 Route::post('store/{id}/product', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
                 Route::get('destroy/{id}/image', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
             });


      });
});

Route::group(['prefix' => 'admin', 'where' =>['id' => '[0-9]+']], function() {

      Route::group(['prefix' => 'categories'], function () {

            Route::get('', ['as' => 'categories',
                'uses' => 'CategoriesController@index'
            ]);
            Route::get('create', ['as' => 'categories.create',
                'uses' => 'CategoriesController@create'
            ]);
            Route::post('store', ['as' => 'categories.store',
                'uses' => 'CategoriesController@store'
            ]);
            Route::get('{id}/edit', ['as' => 'categories.edit',
                'uses' => 'CategoriesController@edit'
            ]);
            Route::get('{id}/destroy', ['as' => 'categories.destroy',
                'uses' => 'CategoriesController@destroy'
            ]);
            Route::put('{id}/update', ['as' => 'categories.update',
                'uses' => 'CategoriesController@update'
            ]);
      });
 });


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
