<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    public function index() {
        return view('/auth.partner.sign-in');
    }

    public function dashboard() {
        return view('/partner.dashboard');
    }

    public function login(Request $request) {
        $check = $request->all();
        if(Auth::guard('partner')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('partner.dashboard')->with('error', 'Partner Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email Or Password!');
        }
        
    }

    public function logout() {
        Auth::guard('partner')->logout();
        return redirect()->route('partner.login_from')->with('error', 'Partner Logout Successfully');
    }

    public function register() {
        return view('/auth.partner.sign-up');
    }

    public function store(Request $request) {
        Partner::insert([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(), 
        ]);

        return redirect()->route('partner.login_from')->with('error', 'Partner Created Successfully');
    }
}
