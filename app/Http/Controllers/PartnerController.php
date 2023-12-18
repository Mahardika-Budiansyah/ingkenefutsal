<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PartnerController extends Controller
{
    protected $activePage = 'dashboard';

    public function index() {
        return view('/auth.partner.sign-in');
    }

    public function dashboard() {
        return view('/partner.dashboard', ['activePage' => $this->activePage]);
    }

    public function login(Request $request) {
        $check = $request->all();
        if(Auth::guard('partner')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            Alert::toast('Login Partner Berhasil!','success');
            return redirect()->route('partner.dashboard');         
        } else {
            Alert::toast('Login Partner Gagal!','error');
            return back();
        }
        
    }

    public function logout() {
        Auth::guard('partner')->logout();
        return redirect()->route('partner.login_from');
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

        Alert::toast('Pendaftaran Partner Berhasil!','success');
        return redirect()->route('partner.login_from');
    }

}
