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
        PaymentNotification::create($request->all());
        return response()->json(['request' => $request->all()], 201);
    }
}
