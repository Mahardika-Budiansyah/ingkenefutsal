<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
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

    public function update(PartnerProfileUpdateRequest $request): RedirectResponse {

        $partnerUser = auth('partner')->user();

        $partnerUser->fill($request->validated());

        if ($partnerUser->isDirty('email')) {
            $partnerUser->email_verified_at = null;
        }

        $partnerUser->save();

        Alert::toast('Profil Partner telah berhasil diperbarui!','success');
        return redirect()->route('partner.edit');
    }
    
}
