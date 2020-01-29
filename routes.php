<?php

/**
 * Your package routes would go here
 */

Route::group(['namespace' => 'BenWecom4U\Editor\Controllers'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('editor','TextEditorController@store');
    });

    /** Editor */
    Route::get('editor', 'TextEditorController@index');

});

