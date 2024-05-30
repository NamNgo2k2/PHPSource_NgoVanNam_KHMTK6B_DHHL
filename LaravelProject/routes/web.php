<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/home',
    function () {
        $html = "<h1>Welcome to my world</h1>";
        return $html;
    }
);

Route::get('/greeting', function() {
    return view('greeding', ['name' => 'TiNo']);
});

Route::get('/customer', function() {
    return view('customer');
} 
);

// Cách khác
// Route::get('/customer',
//     'App\Http\Controllers\CustomerController@index'
// );

// Route::get('/getProduct', function() {
//     return view('getProducts');
// });

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'product'], function() {
        Route::get('/getProduct',
            'App\Http\Controllers\ProductController@getProduct'
        );
        
        Route::get('/getProductsbyBand',
            'App\Http\Controllers\ProductController@getProductsbyBand'
        ) -> name('admin.product.getProductsbyBand');

        Route::get('/getProductsbyYear',
            'App\Http\Controllers\ProductController@getProductsbyYear'
        ) -> name('admin.product.getProductsbyYear');

        Route::get('/getProductsbyYearandCompany',
            'App\Http\Controllers\ProductController@getProductsbyYearandCompany'
        ) -> name('admin.product.getProductsbyYearandCompany');

        Route::get('/insertProduct',
            'App\Http\Controllers\ProductController@forminsertProduct'
        );

        Route::post('/insertProduct',
            'App\Http\Controllers\ProductController@insertProduct'
        );

        Route::get('/deleteProduct',
            'App\Http\Controllers\ProductController@deleteProduct'
        ) -> name('admin.product.deleteProduct');

        Route::get('/updateProduct',
            'App\Http\Controllers\ProductController@updateProduct'
        ) -> name('admin.product.updateProduct');
    });

    Route::group(['prefix' => 'customer'], function() {
        Route::get('/getCustomer',
            'App\Http\Controllers\CustomerController@getCustomer'
        );
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/getOrder',
            'App\Http\Controllers\OrderController@getOrder'
        );
    });

    Route::group(['prefix' => 'orderdetail'], function() {

    });
});