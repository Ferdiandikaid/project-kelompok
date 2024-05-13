<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Http;

class UsersController extends Controller{

    public function returnHomePageWithData(){
        $data=Users::all();
        return view('homepage',compact('data')); 
    }

     public function showRegistration(){
         return view('registers');
     }

    public function registration(Request $request){
        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $description = $request->input('description');
        $password = $request->input('password');

        $response = Http::post('http://localhost:8080/sendAllData', [
            'username' => $username,
            'email' => $email,
            'description' => $description,
            'password' => $password,
        ]);
        if (!$response->successful()) {
            $errors = $response->json();
            echo "Failed to add data";
        }
        else {
            return redirect('homepage')->with('success','Data berhasil ditambahkan');
        }
    }

    // public function showRegistration(){
    //     return view('registers');
    // }

    // public function registration(Request $request){
    //     Users::create($request->all());
    //     return redirect('homepage')->with('success','Data berhasil ditambahkan');
    // }

    // public function view($id){  
    //     $data=Users::find($id);
    //     return view('viewData',[$data->id])->with('data',$data);
    // }
    
    // public function showUpdate($id){
    //     $data=Users::find($id);
    //     return view('updateData',compact('data')); 
    // }

    // public function update(Request $request,$id){  
    //     $data=Users::find($id);
    //     $data->update($request->all());
    //     return redirect('homepage')->with('success','Data berhasil diedit');
    // }

}
