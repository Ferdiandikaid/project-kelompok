<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Http;
use Hash;

class UsersController extends Controller{

    public function returnHomePageWithData()
    {
        $client = new \GuzzleHttp\Client();
        
        try {
            $response = $client->get('http://localhost:8080/getAllData');
            $statusCode = $response->getStatusCode();
            
            if ($statusCode !== 200) {
                echo "Error: Received status code $statusCode";
                return;
            }

            $data = json_decode($response->getBody());

            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error decoding JSON: " . json_last_error_msg();
                return;
            }

            if ($data === null) {
                echo "Error: No data received";
                return;
            }
            
            // foreach ($data as $userData) {
            //     echo $userData['username'] . "<br>";
            //     echo $userData['email'] . "<br>";
            // }

        } catch (\Exception $e) {
            echo "Request failed: " . $e->getMessage();
        }
        return view('homepage',['data'=>$data]);
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
            'password' =>Hash::make($password),
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

    public function viewById($id){
        $client = new \GuzzleHttp\Client();
        
        try {
            $response = Http::post('http://localhost:8080/getAllDataById', [
                'id' => $id,
            ]);

            if (!$response->successful()) {
                $errors = $response->json();
                echo "Failed to add data";
            }

            $data = json_decode($response->getBody());

            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Error decoding JSON: " . json_last_error_msg();
                return;
            }

            if ($data === null) {
                echo "Error: No data received";
                return;
            }
            
            // foreach ($data as $userData) {
            //     echo $userData['username'] . "<br>";
            //     echo $userData['email'] . "<br>";
            // }

        } catch (Exception $e) {
            echo "Request failed: " . $e->getMessage();
        }
        return view('viewData',['data'=>$data]);
    }

    public function showGet($id){
        return view('viewData',[$data->id])->with('data',$data);
    }
    
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
