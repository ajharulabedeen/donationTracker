<?php
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');
    //Mine 
    Route::post('token', 'AuthController@onlyToken');
    Route::post('uname', 'AuthController@getLoggedUname');
});

// start : middileware Skipped due to speed development
    // Route::post('login', 'AuthController@login');
    // Route::post('t', 'AuthController@t');
    // Route::post('signup', 'AuthController@signup');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
    // Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    // Route::post('resetPassword', 'ChangePasswordController@process');
    // //Mine 
    // Route::post('token', 'AuthController@onlyToken');
    // Route::post('uname', 'AuthController@getLoggedUname');
// end : middileware Skipped due to speed development

// Route::post('/z', function () {  
//     error_log("done...!");
//     // return var_dump(_POST);
//     return var_dump($_POST);
// });