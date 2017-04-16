<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Rych\Random\Random;

class PracticeController extends Controller {


    /**
    *
    */
    public function practice3() {

        $random = new Random();

        // Generate a 16-byte string of random raw data
        $randomBytes = $random->getRandomBytes(16);
        dump($randomBytes);

        // Get a random integer between 1 and 100
        $randomNumber = $random->getRandomInteger(1, 100);
        dump($randomNumber);

        // Get a random 8-character string using the
        // character set A-Za-z0-9./
        $randomString = $random->getRandomString(8);
        dump($randomString);
    }

    /**
	*
	*/
    public function practice2() {

        dump(config('app'));

    }



    /**
	*
	*/
    public function practice1() {
        dump('This is the first example.');
    }


    /**
	* ANY (GET/POST/PUT/DELETE)
    * /practice/{n?}
    *
    * This method accepts all requests to /practice/ and
    * invokes the appropriate method.
    *
    * http://foobooks.loc/practice/1 => Invokes practice1
    * http://foobooks.loc/practice/5 => Invokes practice5
    * http://foobooks.loc/practice/999 => Practice route [practice999] not defined
	*/
    public function index($n) {



        $method = 'practice'.$n;

        if(method_exists($this, $method))
            return $this->$method();
        else
            dd("Practice route [{$n}] not defined");

    }


    public function practice5() {
        $book = new Book();
        $books = Book::where('published', '>', 1950)->take(5)->get();

        if($books->isEmpty()) {
            dump('No matches found');
        }
        else {
            dump($books->toArray()); # Study the results
        }

    }

    public function practice6() {

        $books = Book::latest('created_at')->get();

        if($books->isEmpty()) {
            dump('No matches found');
        }
        else {
            dump($books->toArray()); # Study the results
        }
    }

    public function practice7() {

        $book = new Book();
        $books = Book::orderBy('Title')->get();

        if($books->isEmpty()) {
            dump('No matches found');
        }
        else {
            foreach($books as $book) {
                dump($book->title);
            }
        }
    }

        public function practice8() {

            $book = new Book();
            $books = Book::orderBy('published', 'asc')->get();

            if($books->isEmpty()) {
                dump('No matches found');
            }
            else {
                foreach($books as $book) {
                    dump($book->published, $book->title);
                }
            }
        }

        public function practice9() {

            $book = new Book();
            $books = Book::where('author', '=', 'Bell Hooks')->get();

            if($books->isEmpty()) {
                dump('No matches found');
            }
            else {
                foreach($books as $book) {
                    $book->author = 'bell hooks';
                    $book->save();

                    dump('Update complete; check the database to confirm the update worked.');
                }
            }
        }

        public function practice10() {

            $book = new Book();
            $books = Book::where('author', '=', 'J.K. Rowling')->get();

            if($books->isEmpty()) {
                dump('No matches found');
            }
            else {
                foreach($books as $book) {
                    $book->delete();

                    dump('Deletion complete; check the database to see if it worked...');
                }
            }
        }
    }
