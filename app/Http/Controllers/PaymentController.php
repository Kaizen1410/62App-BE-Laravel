<?php

namespace App\Http\Controllers;

use App\Models\PaymentNotification;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    public function notif (Request $request) {
        PaymentNotification::create($request->all());
        return response()->json(['request' => $request->all()], 201);
    }
}
