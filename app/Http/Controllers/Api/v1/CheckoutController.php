<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function index()
    {
        return response()->json([
            'checkouts' => Checkout::orderBy('out', 'desc')->get(),
        ], 200);
    }

    public function show($checkout)
    {
        $checkout = Checkout::where('out', $checkout)->get();

        return response()->json([
            'checkout' => $checkout,
        ], 200);
    }
}
