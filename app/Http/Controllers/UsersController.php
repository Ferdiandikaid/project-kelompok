<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    public function index(){
        $data=Users::all();
        return view('homepage',compact('data')); 
    }
}
