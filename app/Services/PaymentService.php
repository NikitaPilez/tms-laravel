<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Stripe\Checkout\Session;
use Stripe\StripeClient;

class PaymentService
{
    private StripeClient $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    public function createPayment(Order $order, string $paymentHash)
    {
        $session = $this->stripe->checkout->sessions->create([
            'success_url' => route('payment.callback', ['hash' => $paymentHash]),
            'cancel_url' => url()->previous(),
            'line_items' => $this->productsGeneration($order),
            'mode' => 'payment',
            'customer_email' => $order->user->email ?? $order->email
        ]);

        return $session;
    }

    private function productsGeneration(Order $order)
    {
        $products = [];
        /** @var Product $product */
        foreach ($order->products as $product) {
            $price = $product->sale_price ? $product->sale_price : $product->price;

            $products[] = [
                'quantity' => $product->pivot->quantity,
                'price_data' => [
                    'currency' => 'USD',
                    'product_data' => [
                        'name' => $product->title,
                        'description' => $product->description,
                        'images' => [asset('/storage' . $product->mainImage()?->path)]
                    ],
                    'unit_amount' => $price * 100
                ]
            ];
        }

        return $products;
    }

    public function getPayment(string $id): Session
    {
        return $this->stripe->checkout->sessions->retrieve(
            $id
        );
    }
}
