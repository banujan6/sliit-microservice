<?php

namespace App\Http\Controllers;

use App\Models\LendingRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class LendingServiceController extends Controller
{
    public function index(Request $request) {
        $books = $this->getBooks();
        $members = $this->getMembers();

        $lentRecords = LendingRecord::all();

        return view('lending-records', [
            'lentRecords' => $lentRecords,
            'members' => $members,
            'books' => $books
        ]);
    }

    public function createView(Request $request) {
        $books = $this->getBooks();
        $members = $this->getMembers();

        return view('create', [
            'books' => $books,
            'members' => $members
        ]);
    }

    public function create(Request $request) {
        $data = [
            'book_id' => $request->input('book'),
            'member_id' => $request->input('member'),
            'lent_date' => $request->input('lent_on'),
            'return_date' => $request->input('return_on'),
            'is_returned' => (int)$request->input('is_returned'),
        ];

        $result = LendingRecord::create($data);

        if ($result) {
            return Redirect::route('showCreateView')->with([
                'status' => true,
                'message' => 'The record has been added successfully.'
            ]);
        }

        return Redirect::route('showCreateView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }

    public function showUpdateView($id, Request $request) {
        $books = $this->getBooks();
        $members = $this->getMembers();

        $lentRecord = LendingRecord::find($id);

        if( is_null($lentRecord) ) {
            return Redirect::route('listView');
        }

        return view('create', [
            'books' => $books,
            'members' => $members,
            'lentRecord' => $lentRecord
        ]);
    }

    public function update($id, Request  $request) {

        $data = [
            'book_id' => $request->input('book'),
            'member_id' => $request->input('member'),
            'lent_date' => $request->input('lent_on'),
            'return_date' => $request->input('return_on'),
            'is_returned' => (int)$request->input('is_returned'),
        ];

        $result = LendingRecord::find($id);

        if ($result) {
            LendingRecord::where('id', $id)->update($data);

            return Redirect::route('showUpdateView', $id)->with([
                'status' => true,
                'message' => 'The record has been updated successfully.'
            ]);
        }

        return Redirect::route('listView');
    }

    public function showDeleteView($id) {
        return view('delete');
    }

    public function delete($id) {
        $status = LendingRecord::where('id', $id)->delete();

        if ($status) {

            return Redirect::route('listView')->with([
                'status' => true,
                'message' => 'The record has been deleted successfully.'
            ]);
        }

        return Redirect::route('listView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }

    private function getBooks() {
        $books = Http::get(env('BOOKS_SERVICE_URL').'/api/books')->json();
        $booksFormatted = [];

        foreach ( $books as $book ) {
            $booksFormatted[$book['isbn']] = $book['name'];
        }

        unset($books);
        return $booksFormatted;
    }

    private function getMembers() {
        $members = Http::get(env('MEMBERS_SERVICE_URL').'/api/members')->json();
        $membersFormatted = [];

        foreach ( $members as $member ) {
            $membersFormatted[$member['id']] = $member['name'];
        }

        unset($members);
        return $membersFormatted;
    }
}
