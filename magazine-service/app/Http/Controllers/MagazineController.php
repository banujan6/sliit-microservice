<?php

namespace App\Http\Controllers;

use App\Model\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MagazineController extends Controller
{
    public function view(){

        $magazines = Magazine::all();

        return view('magazines', [
            'magazines' => $magazines
        ]);
    }

    public function showCreateView() {
        return view('create');
    }

    public function create(Request $request) {

        $data = [
            'name' => $request->get('name'),
            'language' => $request->get('language'),
            'type' => $request->get('type'),
            'published_on' => $request->get('published'),
            'availability' => $request->get('availability') === '1'
        ];
        $magazine = Magazine::create($data);

        if ($magazine) {
            return Redirect::route('showCreateView')->with([
                'status' => true,
                'message' => 'The magazine has been added successfully.'
            ]);
        }

        return Redirect::route('showCreateView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }

    public function showUpdateView($id) {
        $magazine = Magazine::find($id);

        if( is_null($magazine) ) {
            return Redirect::route('listView');
        }

        return view('create', [
            'magazine' => $magazine->toArray()
        ]);
    }

    public function update($id, Request $request) {
        $data = [
            'name' => $request->get('name'),
            'language' => $request->get('language'),
            'type' => $request->get('type'),
            'published_on' => $request->get('published'),
            'availability' => $request->get('availability') === '1'
        ];

        $magazine = Magazine::find($id);

        if ($magazine) {
            Magazine::where('id', $id)->update($data);

            return Redirect::route('showUpdateView', $id)->with([
                'status' => true,
                'message' => 'The magazine has been updated successfully.'
            ]);
        }

        return Redirect::route('listView');
    }

    public function showDeleteView($id) {
        return view('delete');
    }

    public function delete($id) {

        $status = Magazine::where('id', $id)->delete();

        if ($status) {

            return Redirect::route('listView')->with([
                'status' => true,
                'message' => 'The magazine has been deleted successfully.'
            ]);
        }

        return Redirect::route('listView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }
}
