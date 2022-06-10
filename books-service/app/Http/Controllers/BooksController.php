<?php

namespace App\Http\Controllers;

use App\models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BooksController extends Controller
{
    public function view(){

        $books = Book::all();

        return view('books', [
            'books' => $books
        ]);
    }

    public function showCreateView() {
        return view('create');
    }

    public function create(Request $request) {

        $data = [
            'isbn' => $request->get('isbn'),
            'name' => $request->get('name'),
            'language' => $request->get('language'),
            'genre' => $request->get('genre'),
            'authors' => $request->get('authors'),
            'availability' => $request->get('availability') === '1',
            'published_on' => (int)$request->get('published'),
        ];
        $book = Book::create($data);

        if ($book) {
            return Redirect::route('showCreateView')->with([
                'status' => true,
                'message' => 'The book has been added successfully.'
            ]);
        }

        return Redirect::route('showCreateView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }

    public function showUpdateView($isbn) {
        $book = Book::find($isbn);

        if( is_null($book) ) {
            return Redirect::route('listView');
        }

        return view('create', [
            'book' => $book->toArray()
        ]);
    }

    public function update($isbn, Request $request) {
        $data = [
            'isbn' => $request->get('isbn'),
            'name' => $request->get('name'),
            'language' => $request->get('language'),
            'genre' => $request->get('genre'),
            'authors' => $request->get('authors'),
            'availability' => $request->get('availability') === '1',
            'published_on' => (int)$request->get('published'),
        ];

        $book = Book::find($isbn);

        if ($book) {
            Book::where('isbn', $isbn)->update($data);

            return Redirect::route('showUpdateView', $data['isbn'])->with([
                'status' => true,
                'message' => 'The book has been updated successfully.'
            ]);
        }

        return Redirect::route('listView');
    }

    public function showDeleteView($isbn) {
        return view('delete');
    }

    public function delete($isbn) {

        $status = Book::where('isbn', $isbn)->delete();

        if ($status) {

            return Redirect::route('listView')->with([
                'status' => true,
                'message' => 'The book has been deleted successfully.'
            ]);
        }

        return Redirect::route('listView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }
}
