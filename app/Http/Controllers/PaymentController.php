<?php

namespace App\Http\Controllers;

use App\Models\PaymentNotification;
use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller {
    public function checkout(Request $request) {
        $snap = Snap::createTransaction($request->all());

        return response()->json($snap);
    }

    public function notif(Request $request) {
        $validated = $request->validate([
            'transaction_time' => 'required',
            'transaction_status' => 'required',
            'payment_type' => 'required',
            'order_id' => 'required',
            'fraud_status' => 'required',
        ]);

        PaymentNotification::create($validated);
        return response()->json(['message' => 'Notification accepted'], 201);
    }
}
