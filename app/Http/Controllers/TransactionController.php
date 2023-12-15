<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Fieldtype;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class TransactionController extends Controller
{
    protected $activePage = 'review-order';

    public function userIndex()
    {
        $field = Field::with(['fieldtypes', 'timetables', 'partners'])->paginate(10);
        $fieldtypes = Fieldtype::select('id', 'name')->get();

        return view('user.field', [
            'field' => $field,
            'fieldtypes' => $fieldtypes,
        ]);
    }

    public function userOrder(Request $request)
    {
        // Your existing code to decode and handle data
        $decodedData = json_decode($request->getContent(), true);
        // Generate a unique token
        $token = bin2hex(random_bytes(16));

        // Store the data associated with this token (you might use cache, database, etc.)
        // For example, if you're using Laravel Cache:
        cache(['order_data_' . $token => $decodedData], now()->addMinutes(5));

        // Return the token as JSON response
        return response()->json(['token' => $token]);
    }
    
    public function reviewOrder(Request $request)
    {
        // Retrieve the token from the URL
        $token = $request->query('token');

        // Check if the 'token' parameter is present in the URL
        if ($token) {
            // Retrieve data associated with this token
            $decodedData = cache('order_data_' . $token);

            if ($decodedData) {
                // Use the data from the server
                return view('user.review-order', [
                    'cartItems' => $decodedData['cartItems'] ?? [],
                ]);
            }
        }

        // If 'token' parameter is not present or data is not found, redirect to the field page
        return redirect()->route('user.field');
    }
    
    public function userPayment()
    {
        // Mengambil semua transaksi dengan informasi partner terkait
        // $transactions = Transaction::with('field.partners', 'statues')->get();

        // return view('user.payment', compact('transactions'));
        return view('user.payment');
    }

    public function userCompleted() {
        return view('user.order-completed');
    }
}
