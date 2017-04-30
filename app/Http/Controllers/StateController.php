<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\District;
class StateController extends Controller
{
    public function getAdd()
    {
        return view('admin.states.add');
    }

    public function postAdd(Request $request)
    {
    	 $this->validate($request, [
	        'name' => 'required|unique:states|max:255',
	    ]);

        $state = new State();
        $state->name   = $request->name;
        $state->value   = str_slug($request->name, '');
        $state->distance   = $request->distance;
        $state->save();
        return redirect()->to('admin/state/list');
    }
    public function getList()
    {
    	$states =  State::all();
    	return view('admin.states.list', compact('states'));
    }

    public function detail($id)
    {
    	$districts =  District::where('state_id', $id)->get();
    	$state =  State::find($id);
    	return view('admin.states.detail', compact('state', 'districts'));
    }
}
