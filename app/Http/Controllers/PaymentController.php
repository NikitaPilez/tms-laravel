<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    private PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function redirect(Order $order)
    {
        $successPayment = $order->payments()->where('status', 'complete')->get();

//        if ($successPayment) {
//            return redirect()->route('cart.get')->with('success', 'Already paid');
//        }

        $paymentHash = Str::random(40);
        $session = $this->paymentService->createPayment($order, $paymentHash);
        Payment::query()->create([
            'status' => $session->status,
            'order_id' => $order->id,
            'session_id' => $session->id,
            'hash' => $paymentHash
        ]);

        return redirect($session->url);
    }

    public function callback(string $hash)
    {
        $payment = Payment::query()->where('hash', $hash)->firstOrFail();
        $session = $this->paymentService->getPayment($payment->session_id);
        $status = $session->status;
        $payment->status = $status;
        $payment->save();

        if ($status === 'complete') {
            return redirect()->route('cart.get')->with('success', 'Payment completed');
        }

        return redirect()->route('cart.get')->with('fail', 'Something wrong');
    }
}
