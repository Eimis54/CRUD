<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function index(){
        $data = Owner::get();
        return view('owner-list',compact('data'));
    }
    public function addOwner(){
        return view('add-owner');
    }
    public function saveOwner(Request $request){
        $request->validate([
            'name'=> 'required',
            'surname'=>'required',
            'years'=>'required'
        ]);

        $name = $request->name;
        $surname = $request->surname;
        $years = $request->years;

        $own = new Owner();
        $own -> name = $name;
        $own -> surname = $surname;
        $own -> years = $years;
        $own ->save();

        return redirect()->back()->with('success','Owner Added Successfully');
    }
    public function editOwner($id){
        $data = Owner::where('id','=',$id)->first();
        return view('edit-owner',compact('data'));
    }
    public function updateOwner(Request $request){
        $request->validate([
            'name'=> 'required',
            'surname'=>'required',
            'years'=>'required'
        ]);
        $id = $request->id;    
        $name = $request->name;
        $surname = $request->surname;
        $years = $request->years;
    
        Owner::where('id','=',$id)->update([
            'name'=>$name,
            'surname'=>$surname,
            'years'=>$years
        ]);
        return redirect()->back()->with('success','Owner Updated Successfully');
    }
    public function deleteOwner($id){
        Owner::where('id','=',$id)->delete();
        return redirect()->back()->with('success','Owner Deleted Successfully');

    }
}
