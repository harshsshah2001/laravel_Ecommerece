<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RazorpayPaymentController extends Controller
{
    /**
     * Display the Razorpay payment form.
     *
     * @return View
     */
    public function index(): View
    {
        return view('razorpayView'); // Ensure this view exists
    }

    /**
     * Process the Razorpay payment.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();

        // Initialize Razorpay API with your Key ID and Key Secret
        $api = new Api('rzp_test_Oy9e95ZeYiEu7D', '8VT91HG2qM6PbA4f9s743v7a');

        // Check if the Razorpay payment ID is present in the request
        if (empty($input['razorpay_payment_id'])) {
            Session::put('error', 'Razorpay payment ID is missing.');
            return redirect()->back();
        }

        $paymentId = $input['razorpay_payment_id'];

        try {
            // Fetch the payment details from Razorpay
            $payment = $api->payment->fetch($paymentId);

            // Capture the payment (if not already captured)
            if ($payment->status !== 'captured') { // Check payment status
                $api->payment->fetch($paymentId)->capture(['amount' => $payment->amount]);
            }

            Session::put('success', 'Payment successful!');
            return redirect()->back();
        } catch (Exception $e) {
            Session::put('error', 'Razorpay payment failed: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
