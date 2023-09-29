<?php

namespace App\Http\Controllers;

use App\Models\PaymentNotification;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\CoreApi;

class PaymentController extends Controller {
    public function snap(Request $request) {
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

        $credit_card = [
            'secure' => true,
        ];

        $validated['credit_card'] = $credit_card;
        $snap = Snap::createTransaction($validated);

        return response()->json($snap);
    }

    public function core(Request $request) {
        $validated = $request->validate([
            'payment_type' => 'required',
            'credit_card.card_number' => 'required_if:payment_type,credit_card',
            'credit_card.exp_moth' => 'required_if:payment_type,credit_card',
            'credit_card.exp_year' => 'required_if:payment_type,credit_card',
            'credit_card.cvv' => 'required_if:payment_type,credit_card',

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

        $token = CoreApi::cardToken(
            $validated['credit_card']['card_number'],
            $validated['credit_card']['exp_moth'],
            $validated['credit_card']['exp_year'],
            $validated['credit_card']['cvv']
        );

        $credit_card = [
            'token_id' => $token->token_id,
            'authentication' => true
        ];

        $validated['credit_card'] = $credit_card;
        $coreapi = CoreApi::charge($validated);

        return response()->json($coreapi);
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
