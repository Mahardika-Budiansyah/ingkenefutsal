<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        return view('/auth.admin.sign-in');
    }

    public function dashboard() {
        return view('/admin.dashboard');
    }

    public function login(Request $request) {
        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email Or Password!');
        }
        
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_from')->with('error', 'Admin Logout Successfully');
    }

    public function register() {
        return view('/auth.admin.sign-up');
    }

    public function store(Request $request) {
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ]);

        return redirect()->route('admin.login_from')->with('error', 'Admin Created Successfully');
    }
}
