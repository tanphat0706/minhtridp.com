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
Route::group([
    'middlewareGroup' => ['web'],
], function () {
    Route::get('/', function () {
        return redirect()->route('frontend');
    });
    Route::get('/home', function () {
        return redirect()->route('frontend');
    });
    Route::get('/index', function () {
        return redirect()->route('frontend');
    });
    Route::get('/login', [
        'as' => 'login',
        'uses' => 'Auth\AuthController@getLogin'
    ]);
    Route::post('/login', [
        'as' => 'login',
        'uses' => 'Auth\AuthController@postLogin'
    ]);
    Route::get('/flyer-leaflet', [
        'as' => 'flyer',
        function () {
            return view('category.flyer-leaflet');
        }
    ]);
    Route::get('/flyer-leaflet/a6-flyer-leaflet', [
        'as' => 'a6-flyer',
        function () {
            return view('product.a6-flyer');
        }
    ]);
    Route::get('/trang-ca-nhan', [
        'as' => 'my-page',
        'uses' => 'HomeController@mypage'
    ]);
    Route::post('/bao-gia', [
        'as' => 'bao-gia',
        'uses' => 'ProductController@bao_gia'
    ]);
});

Route::match([
    'get',
    'post'
], '/', [
    'as' => 'frontend',
    'uses' => 'HomeController@index'
]);

Route::group([
    'middleware' => ['web'],
    'prefix' => 'admin'
], function () {
    Route::auth();

    Route::group([
        'middleware' => ['auth']
    ], function () {
        Route::get('/', [
            'as' => 'admin',
            'uses' => 'HomeController@admin'
        ]);

        /**
         * User router
         *
         * @author Phat Le
         */
        Route::group([
            'prefix' => 'user'
        ], function () {
            Route::get('/', [
                'as' => 'users-list',
                'uses' => 'UserController@index'
            ]);

            // Ajax for datatables
            Route::get('/getUsersJson', [
                'as' => 'json-users-list',
                'uses' => 'UserController@getUsersJson'
            ]);

            Route::get('/create', [
                'as' => 'create-user',
                'uses' => 'UserController@create'
            ]);

            Route::post('/store', [
                'as' => 'store-user',
                'uses' => 'UserController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'edit-user',
                'uses' => 'UserController@edit'
            ]);

            Route::post('/update/{id}', [
                'as' => 'update-user',
                'uses' => 'UserController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'delete-user',
                'uses' => 'UserController@destroy'
            ]);
            Route::get('/profile', [
                'as' => 'profile',
                'uses' => 'UserController@profile'
            ]);

            Route::post('/updateProfile', [
                'as' => 'update-profile',
                'uses' => 'UserController@updateProfile'
            ]);
        });
        /**
         * User Group router
         *
         * @author Phat Le
         */
        Route::group([
            'prefix' => 'user-group'
        ], function () {
            Route::get('/', [
                'as' => 'user-group-list',
                'uses' => 'UserGroupController@index'
            ]);

            // Ajax for datatables
            Route::get('/getUserGroupsJson ', [
                'as' => 'json-user-group-list',
                'uses' => 'UserGroupController@getUserGroupsJson'
            ]);

            Route::get('/create', [
                'as' => 'create-user-group',
                'uses' => 'UserGroupController@create'
            ]);

            Route::post('/store', [
                'as' => 'store-user-group',
                'uses' => 'UserGroupController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'edit-user-group',
                'uses' => 'UserGroupController@edit'
            ]);

            Route::post('/update/{id}', [
                'as' => 'update-user-group',
                'uses' => 'UserGroupController@update'
            ]);

            Route::post('/delete/{id}', [
                'as' => 'delete-user-group',
                'uses' => 'UserGroupController@destroy'
            ]);
        });

        /**
         * Category router
         *
         * @author Phat Le
         */
        Route::group([
            'prefix' => 'category'
        ], function () {
            Route::get('/list', [
                'as' => 'category-list',
                'uses' => 'CategoryController@index'
            ]);
            // Ajax for datatables
            Route::get('/getCategoriesJson', [
                'as' => 'json-categories-list',
                'uses' => 'CategoryController@getCategoriesJson'
            ]);
            Route::get('/create', [
                'as' => 'category-create',
                'uses' => 'CategoryController@create'
            ]);
            Route::post('/store', [
                'as' => 'category-store',
                'uses' => 'CategoryController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'category-edit',
                'uses' => 'CategoryController@edit'
            ]);

            Route::put('/update/{id}', [
                'as' => 'category-update',
                'uses' => 'CategoryController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'category-del',
                'uses' => 'CategoryController@destroy'
            ]);
        });

        /**
         * Carousel router
         *
         * @author Phat Le
         */
        Route::group([
            'prefix' => 'carousel'
        ], function () {
            Route::get('/list', [
                'as' => 'carousel-list',
                'uses' => 'CarouselController@index'
            ]);
            // Ajax for datatables
            Route::get('/getCategoriesJson', [
                'as' => 'json-carousel-list',
                'uses' => 'CarouselController@getCarouselJson'
            ]);
            Route::get('/create', [
                'as' => 'carousel-create',
                'uses' => 'CarouselController@create'
            ]);
            Route::post('/store', [
                'as' => 'carousel-store',
                'uses' => 'CarouselController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'carousel-edit',
                'uses' => 'CarouselController@edit'
            ]);

            Route::put('/update/{id}', [
                'as' => 'carousel-update',
                'uses' => 'CarouselController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'carousel-del',
                'uses' => 'CarouselController@destroy'
            ]);
        });

        /**
         * Property router
         *
         * @author Phat Le
         */
        Route::group([
            'prefix' => 'property'
        ], function () {
            Route::get('/list', [
                'as' => 'property-list',
                'uses' => 'PropertyController@index'
            ]);
            // Ajax for datatables
            Route::get('/getPropertiesJson', [
                'as' => 'json-property-list',
                'uses' => 'PropertyController@getPropertyJson'
            ]);
            Route::get('/create', [
                'as' => 'property-create',
                'uses' => 'PropertyController@create'
            ]);
            Route::post('/store', [
                'as' => 'property-store',
                'uses' => 'PropertyController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'property-edit',
                'uses' => 'PropertyController@edit'
            ]);

            Route::put('/update/{id}', [
                'as' => 'property-update',
                'uses' => 'PropertyController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'property-del',
                'uses' => 'PropertyController@destroy'
            ]);
        });

        /**
         * Property detail router
         *
         * @author Phat Le
         */
        Route::group([
            'prefix' => 'property_detail'
        ], function () {
            Route::get('/list', [
                'as' => 'propertydetail-list',
                'uses' => 'PropertyDetailController@index'
            ]);
            // Ajax for datatables
            Route::get('/getPropertiesJson', [
                'as' => 'json-propertydetail-list',
                'uses' => 'PropertyDetailController@getPropertyDetailJson'
            ]);
            Route::get('/create', [
                'as' => 'propertydetail-create',
                'uses' => 'PropertyDetailController@create'
            ]);
            Route::post('/store', [
                'as' => 'propertydetail-store',
                'uses' => 'PropertyDetailController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'propertydetail-edit',
                'uses' => 'PropertyDetailController@edit'
            ]);

            Route::put('/update/{id}', [
                'as' => 'propertydetail-update',
                'uses' => 'PropertyDetailController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'propertydetail-del',
                'uses' => 'PropertyDetailController@destroy'
            ]);
        });

        /**
         * Product router
         *
         * @author Phat Le
         */
        Route::group([
            'prefix' => 'product'
        ], function () {
            Route::get('/list', [
                'as' => 'product-list',
                'uses' => 'ProductController@index'
            ]);
            // Ajax for datatables
            Route::get('/getProductJson', [
                'as' => 'json-product-list',
                'uses' => 'ProductController@getProductJson'
            ]);
            Route::get('/create', [
                'as' => 'product-create',
                'uses' => 'ProductController@create'
            ]);
            Route::post('/store', [
                'as' => 'product-store',
                'uses' => 'ProductController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'product-edit',
                'uses' => 'ProductController@edit'
            ]);

            Route::put('/update/{id}', [
                'as' => 'product-update',
                'uses' => 'ProductController@update'
            ]);

            Route::delete('/delete/{id}', [
                'as' => 'property-del',
                'uses' => 'ProductController@destroy'
            ]);
        });
    });
});