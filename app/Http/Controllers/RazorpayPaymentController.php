<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use App\Models\DeliverAddress;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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

            // Capture the payment if it is not already captured
            if ($payment->status !== 'captured') {
                $payment->capture(['amount' => $payment->amount]);
            }

            // Retrieve email from session
            $emailSession = session('email_session');

            if (!empty($emailSession)) {
                try {
                    Mail::to($emailSession)->send(new PurchaseConfirmation());
                } catch (\Exception $e) {
                    \Log::error("Failed to send purchase confirmation email: " . $e->getMessage());
                    Session::put('error', 'Payment successful but failed to send confirmation email.');
                    return redirect()->back();
                }
            }

            Session::put('success', 'Payment successful!');
            return redirect()->back();
        } catch (\Exception $e) {
            Session::put('error', 'Razorpay payment failed: ' . $e->getMessage());
            return redirect()->back();
        }
}

public function address_form_function(){
    return view('shipping');
}

public function saveaddress_function(Request $request)
{
    // Validate the input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:500',
    ]);

    // Save new address
    DeliverAddress::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    // Store address in session
    session()->put('address_session', $validated['address']);

    // Get the product ID from the session
    $product_id = session('product_id');

    // Clear the product ID from the session (optional)
    session()->forget('product_id');

    // Fetch customer info from the database
    $customer_info = DB::table('deliver_addresses')->get();

    // Store customer info in session
    session()->put('customer_info', $customer_info);

    // Redirect to the shipping route with the product ID
    return redirect()->route('shipping', ['id' => $product_id])->with('success', 'Address saved successfully!');
}


}
