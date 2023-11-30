<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Fieldtype;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $activePage = 'review-order';

    public function userPayment()
    {
        // Mengambil semua transaksi dengan informasi partner terkait
        $transactions = Transaction::with('field.partners', 'statues')->get();

        return view('user.payment', compact('transactions'));
    }

    public function userIndex()
    {
        $fields = Field::with(['fieldtypes', 'timetables', 'partners'])->paginate(10);
        $fieldtypes = Fieldtype::select('id', 'name')->get();

        return view('user.field', [
            'fields' => $fields,
            'fieldtypes' => $fieldtypes,
            'activePage' => $this->activePage
        ]);
    }
    public function userShow()
    {   
        return view('user.detail', [

            'activePage' => $this->activePage
        ]);
    }

    public function userOrder() {
        return view('user.review-order');
    }

    // public function userPayment() {
    //     return view('user.payment');
    // }

    public function userCompleted() {
        return view('user.order-completed');
    }
}
