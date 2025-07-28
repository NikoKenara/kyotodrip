<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\OrderService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    function index() : View {
        if(!session()->has('delivery_fee') || !session()->has('address')){
            throw ValidationException::withMessages(['Something went wrong']);
        }
        $subtotal = cartTotal();
        $delivery = session()->get('delivery_fee') ?? 0;
        $discount = session()->get('coupon') ?? 0;
        $grandTotal = grandCartTotal($delivery);
        return view('frontend.pages.payment', compact(
            'subtotal',
            'delivery',
            'discount',
            'grandTotal'
        ));
    }

    function makePayment(Request $request, OrderService $orderService) {
        $request->validate([
            'payment_gateway' => ['required', 'string', 'in:paypal']
        ]);

        // create order
        if($orderService->createOrder()){
            // redirect user to the payment host
            // return true;
            switch ($request->payment_gateway) {
                case 'paypal':
                    return response(['redirect_url' => route('paypal.payment')]);
                    break;

                default:
                    # code...
                    break;
            }
        }
    }

    // paypal payment

    function payWithPaypal() {
        return 'Payment processing';
    }
    function paypalSuccess() {
        //
    }
    function paypalCancel() {
        //
    }
}
