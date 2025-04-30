<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request)
    {

        error_log("Reached");
        // Validate the input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the admin by email
        $admin = Admin::where('email', $request->email)->first();


        // Check if admin exists and password is correct
        if ($admin && Hash::check($request->password, $admin->password)) {

            // Store admin's info in session manually
            Session::put('admin_id', $admin->id); // Store admin's ID in session
            Session::put('admin_name', $admin->name); // Optionally store admin's name

            return redirect()->intended('/admin/'); // Redirect to admin dashboard
        }else{

        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    public function logout(){
        Session::flush();

        return redirect('/admin/login');
    }
}
