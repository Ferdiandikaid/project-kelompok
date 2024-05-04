<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller{
    public function index(){
        $data=Users::all();
        return view('homepage',compact('data')); 
    }

    public function showRegistration(){
        return view('registers');
    }

    public function registration(Request $request){
        Users::create($request->all());
        return redirect('homepage')->with('success','Data berhasil ditambahkan');
    }

    public function view($id){  
        $data=Users::find($id);
        return view('viewData',[$data->id])->with('data',$data);
    }
    
    public function showUpdate($id){
        $data=Users::find($id);
        return view('updateData',compact('data')); 
    }

    public function update(Request $request,$id){  
        $data=Users::find($id);
        $data->update($request->all());
        return redirect('homepage')->with('success','Data berhasil diedit');
    }

}
