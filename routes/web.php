<?php

if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/books', 'BookController@index');

Route::get('/books/{title?}', 'BookController@view');

/**
* Practice
*/
Route::any('/practice/{n?}', 'PracticeController@index');

Route::get('/', 'WelcomeController');
