<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PartnerProfileUpdateRequest;

class PartnerProfileController extends Controller
{
    protected $activePage = 'profile';

    public function edit(Request $request): View {

        return view('partner.profile.edit', [
            'partner' => auth('partner')->user(),
            'activePage' => $this->activePage,
        ]);
    }

    public function update(PartnerProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('partner.edit')->with('status', 'profile telah diperbarui');

        $partnerUser = $request->guard('partner')->user();

        $partnerUser->fill($request->validated());
    
        if ($partnerUser->isDirty('email')) {
            $partnerUser->email_verified_at = null;
        }
    
        $partnerUser->save();
    
        return redirect()->route('partner.edit')->with('status', 'Profile telah diperbarui');
    }
}
