<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Redirect;

class MembersController extends Controller
{
    public function view(){

        $members = Member::all();

        return view('members', [
            'members' => $members
        ]);
    }

    public function showCreateView() {
        return view('create');
    }

    public function create(Request $request) {

        $data = [
            'name' => $request->get('name'),
            'nic' => $request->get('nic'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'expire_on' => Carbon::parse($request->get('expire_on'))->format('Y-m-d'),
        ];

        $member = Member::create($data);

        if ($member) {
            return Redirect::route('showCreateView')->with([
                'status' => true,
                'message' => 'The member has been added successfully.'
            ]);
        }

        return Redirect::route('showCreateView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }

    public function showUpdateView($id) {
        $member = Member::find($id);

        if( is_null($member) ) {
            return Redirect::route('listView');
        }

        return view('create', [
            'member' => $member->toArray()
        ]);
    }

    public function update($id, Request $request) {
        $data = [
            'name' => $request->get('name'),
            'nic' => $request->get('nic'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'expire_on' => Carbon::parse($request->get('expire_on'))->format('Y-m-d'),
        ];

        $member = Member::find($id);

        if ($member) {
            Member::where('id', $id)->update($data);

            return Redirect::route('showUpdateView', $id)->with([
                'status' => true,
                'message' => 'The member has been updated successfully.'
            ]);
        }

        return Redirect::route('listView');
    }

    public function showDeleteView($id) {
        return view('delete');
    }

    public function delete($id) {

        $status = Member::where('id', $id)->delete();

        if ($status) {

            return Redirect::route('listView')->with([
                'status' => true,
                'message' => 'The member has been deleted successfully.'
            ]);
        }

        return Redirect::route('listView')->with([
            'status' => false,
            'message' => 'Oops. Something went wrong :('
        ]);
    }
}
