<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {
    public function index() {
        return view('admin.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //$check = $request->only('email', 'password');
        //if (Auth::guard('admin')->attempt($check, $remember)) 

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully');
        }
        return redirect()->back()->with('error', 'Credential does not match with our records!');
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_form')->with('success', 'Admin Logout Successfully!');
    }

    public function createRegister() {
        return view('admin.register');
    }

    public function storeRegister(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed'
        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.login_form')->with('success', 'Admin Registration Successful!');
    }
    public function dashboard() {
        return view('admin.dashboard');
    }
}
