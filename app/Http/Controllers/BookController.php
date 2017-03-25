<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
    * GET /books
    */
    public function index() {
        return view('books.show')->with([
            'title' => null,
        ]);
    }

    /**
    * GET /books/{title?}
    */
    public function view($title = '') {
        return view('books.show')->with([
            'title' => $title,
        ]);
    }
}
