<?php

namespace App\Http\Controllers;

use App\Models\PaymentNotification;
use Illuminate\Http\Request;
use Midtrans\Snap;

class PaymentController extends Controller {
    public function checkout(Request $request) {
        $validated = $request->validate([
            'transaction_details.order_id' => 'required|unique:payment_notifications,order_id',
            'transaction_details.gross_amount' => 'required|numeric',
            'item_details.*.id' => 'required',
            'item_details.*.price' => 'required|numeric',
            'item_details.*.quantity' => 'required|numeric',
            'item_details.*.name' => 'required',
            'customer_details.first_name' => 'required',
            'customer_details.last_name' => 'required',
            'customer_details.email' => 'required|email',
            'customer_details.phone' => 'required|numeric',
        ]);
        $snap = Snap::createTransaction($validated);

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
