<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment; //Make sure this model is imported

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'card_number' => 'required',
            'card_holder_name' => 'required',
            'expiry_date' => 'required',
            'cvv' => 'required',
            'card_type' => 'required',
        ]);

        Payment::create([
            'card_number' => $request->card_number,
            'card_holder_name' => $request->card_holder_name,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,
            'card_type' => $request->card_type,
        ]);

        return redirect()->back()->with('success', 'Payment successful!');
    }
}

