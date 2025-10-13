<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        
        $data= $request->validate([
            'name' => 'required|',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        // Create a new user
       
        $user= User::create($data);
        if ($data) {
            # code...
            return redirect()->route('login');
        }
        
    }
    public function login(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($data)) {
            # match found
            //return redirect()->route('student.index');
            return redirect()->route('dashboard');
        }

        
    }
    public function dashboard()
    {
        if (Auth::check()) {
            # code...
            return view('dashboard');
        }
        else{
            return redirect()->route('login');
        }
        
    }
    //middle ware
    public function manageStudent()
    {
       
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
        
    }
    
}
