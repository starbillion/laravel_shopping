<?php

// Home

Route::get('/', array(
    'as' => 'home',
    'uses' => 'BlogController@showWelcome'
        )
);

Route::get('/product', array(
    'as' => 'product',
    'uses' => 'ProductController@showProducts'
        )
);
Route::get('/product/single/{id}', array(
    'as' => 'single-product',
    'uses' => 'ProductController@singleProduct'
        )
);
Route::get('/add/cart/{pid}', array(
    'as' => 'add-to-cart',
    'uses' => 'CartController@addToCart'
        )
);
Route::get('/shopping-cart', array(
    'as' => 'shopping-cart',
    'uses' => 'CartController@getShoppingCart'
        )
);
Route::get('/cart/remove-cart/{id}', array(
    'as' => 'remove-cart-item',
    'uses' => 'CartController@removeCartItem'
        )
);



Route::get('/cart/decreaseByOne/{id}', array(
    'as' => 'decreaseByOne',
    'uses' => 'CartController@decreaseByOne'
        )
);
Route::get('/cart/increaseByOne/{id}', array(
    'as' => 'increaseByOne',
    'uses' => 'CartController@increaseByOne'
        )
);


// Unauthenticated group

Route::group(array('before' => 'guest'), function() {

    // CSRF protection group

    Route::group(array('before' => 'csrf', 'prefix' => 'account'), function() {

        // Sign In post

        Route::post('/sign-in', array(
            'as' => 'sign-in-post',
            'uses' => 'AccountController@postSignIn'
                )
        );

        // Sign Up post

        Route::post('/sign-up', array(
            'as' => 'sign-up-post',
            'uses' => 'AccountController@postSignUp'
                )
        );

        // Forgot password post

        Route::post('/forgot-password', array(
            'as' => 'forgot-password-post',
            'uses' => 'AccountController@postForgotPassword'
                )
        );


        // Sign In

        Route::get('/sign-in', array(
            'as' => 'sign-in',
            'uses' => 'AccountController@getSignIn'
                )
        );

        // Sign Up

        Route::get('/sign-up', array(
            'as' => 'sign-up',
            'uses' => 'AccountController@getSignUp'
                )
        );

        // Activate account

        Route::get('/activate/{code}', array(
            'as' => 'activate-account',
            'uses' => 'AccountController@getActivateAccount'
                )
        );

        // Forgot password

        Route::get('/forgot-password', array(
            'as' => 'forgot-password',
            'uses' => 'AccountController@getForgotPassword'
                )
        );

        // Activate temporary password

        Route::get('/forgot-password/{user}/{code}', array(
            'as' => 'forgot-password-activate',
            'uses' => 'AccountController@getForgotPasswordActivate'
                )
        );
        Route::post('/change-password', array(
            'as' => 'change-password-post',
            'uses' => 'AccountController@postChangePassword'
                )
        );
        // Sign Out

        Route::get('/sign-out', array(
            'as' => 'sign-out',
            'uses' => 'AccountController@getSignOut'
                )
        );

        // Change password

        Route::get('/change-password', array(
            'as' => 'change-password',
            'uses' => 'AccountController@getChangePassword'
                )
        );
    });
});

// Authenticated group

Route::group(array('before' => 'auth', 'prefix' => 'admin','middleware'=>'auth'), function() {

    // CSRF protection group
    Route::get('/', array(
        'as' => 'admin-index',
        'uses' => 'AdminController@getAdmin'
            )
    );
    Route::get('/userlist', array(
        'as' => 'admin-userlist',
        'uses' => 'AdminController@getUserlist'
            )
    );
    Route::get('/delete/{id}', array(
        'as' => 'admin-user-delete',
        'uses' => 'AdminController@deleteUser'
            )
    );
    /* begin routes for products* */
    Route::get('/products', array(
        'as' => 'admin-products',
        'uses' => 'ProductController@getProducts'
            )
    );
    Route::get('/add/products', array(
        'as' => 'admin-add-products',
        'uses' => 'ProductController@addProducts'
            )
    );
    Route::post('/save/product', array(
        'as' => 'admin-product-save',
        'uses' => 'ProductController@saveProduct'
            )
    );
    Route::get('/product/delete/{id}', array(
        'as' => 'admin-product-delete',
        'uses' => 'ProductController@deleteProduct'
            )
    );
    Route::get('/product/edit/{id}', array(
        'as' => 'admin-product-edit',
        'uses' => 'ProductController@editProduct'
            )
    );
    Route::post('/product/update', array(
        'as' => 'admin-product-update',
        'uses' => 'ProductController@updateProduct'
            )
    );
});
