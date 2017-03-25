<?php

if (config('app.env') == 'local') {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

Route::get('/books', 'BookController@index');

Route::get('/books/new', 'BookController@createNewBook');
Route::post('/books/new', 'BookController@storeNewBook');

Route::get('/books/{title?}', 'BookController@view');

Route::get('/search', 'BookController@search');

/**
* Practice
*/
Route::any('/practice/{n?}', 'PracticeController@index');

Route::get('/', 'WelcomeController');
