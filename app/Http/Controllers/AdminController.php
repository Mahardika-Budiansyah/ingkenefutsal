<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
            Alert::toast('Login Admin Berhasil!','success');
            return redirect()->route('admin.dashboard');
        } else {
            Alert::toast('Login Admin Gagal!','error');
            return back();
        }
        
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_from');
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

        Alert::toast('Pendaftaran Admin Berhasil!','success');
        return redirect()->route('admin.login_from')->with('error', 'Admin Created Successfully');
    }
}
