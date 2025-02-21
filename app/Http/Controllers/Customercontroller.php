<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\Welcomemail;
use App\Mail\PdfMail;
use Maatwebsite\Excel\Facades\Excel;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Customer;
use App\Models\Popular_products;
use App\Exports\UsersExport;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\PasswordResetOtp;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class Customercontroller extends Controller
{
    public function register(){
        return view('register');
    }


    public function register_save_data(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|min:3|max:10',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:8',
                function ($attribute, $value, $fail) {
                    $errors = [];

                    // Check for at least one numeric character
                    if (!preg_match('/[0-9]/', $value)) {
                        $errors[] = 'at least one numeric character';
                    }

                    // Check for at least one alphabetic character
                    if (!preg_match('/[a-zA-Z]/', $value)) {
                        $errors[] = 'at least one alphabetic character';
                    }

                

                    // New check to ensure the password contains at least one of each type
                    if (empty($errors) && !(
                        preg_match('/[0-9]/', $value) &&
                        preg_match('/[a-zA-Z]/', $value) &&
                        preg_match('/[^a-zA-Z0-9]/', $value)
                    )) {
                        $fail('The password must contain at least one numeric character, one alphabetic character, and one special character.');
                    }

                    if (!empty($errors)) {
                        $fail('The password must contain ' . implode(', ', $errors) . '.');
                    }
                },
            ],
            'city' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone' => 'required|string|max:15',
        ], [
            'name.required' => 'Enter the name'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $validatedData = $validate->validated();
        $otp = rand(100000, 999999);

        $email = $validatedData['email'];
        $email_user = DB::table('customers')->where('email', $email)->first();

        if ($email_user) {
            toastr()->error('Your Email is already registered.');
            return redirect()->back();
        } else {
            $imagepath = $request->file('image')->store('uploads', 'public');

            DB::table('customers')->insert([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'city' => $validatedData['city'],
                'image' => $imagepath,
                'phone' => $validatedData['phone'],
                'otp' => $otp,
            ]);

            // Define the array of email addresses
            $emailAddresses = [
                'parthvaishnav81@gmail.com',
                'minimilitia1491@gmail.com',
                $validatedData['email'], // Include the registered user's email
            ];

            $msg = "This Email Is Sent From Endel Digital Solution's";
            $subject = "Endel Mail";

            try {
                // Send the email to all addresses in the array
                Mail::to($emailAddresses)->send(new Welcomemail($msg, $subject, $otp));

                toastr()->success('Your data has been successfully registered. Email sent to multiple recipients!');
            } catch (\Exception $e) {
                // Log the error
                Log::error('Error sending email to multiple recipients: ' . $e->getMessage());
                toastr()->error('Registration successful, but there was an error sending the email.');
            }

            return redirect()->route('otp.verify', ['email' => $request->email]);
        }
    }




    public function showOtpForm(Request $request) {
        return view('otp', ['email' => $request->email]);
    }

public function verifyOtp(Request $request) {

    $request->validate([
        'email' => 'required|email',
        'otp' => 'required|digits:6',
    ]);

    $user = Customer::where('email', $request->email)->first(); // Use your User model here

    // Check if user exists and validate OTP
    if ($user && $user->otp === $request->otp) {

        return redirect()->route('loginform')->with('success', 'Registration successful!');
    }
       return back()->withErrors(['otp' => 'Invalid or expired OTP']);
}

    public function login(){
        return view('login');
    }

    public function login_save_data(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('customers')->where('email', $validate['email'])->first();

        if ($user) {
            if (Hash::check($validate['password'], $user->password)) {
                $email=$validate['email'];
                $name=$user->name;

                session()->put('email_session',$email);
                session()->put('name_session',$name);

                Auth::loginUsingId($user->id);

                $data = DB::table('mainpictures')->get();
                $popular_products_data = DB::table('popular_products')->get();


                return view('index',compact('data','popular_products_data'));
            } else {
                return back()->withErrors(['password' => 'Invalid credentials.']);
            }
        } else {
            return back()->withErrors(['email' => 'No account found with that email.']);
        }



        // ahiyathi tu kya data moklje j che !! atle undefined aave che
        // index naa page maa data joyye che mane




    }

    public function logout_user(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginform');
    }

    public function shoping(){
        return view('shop');
    }

    public function products_details(){
                return view('product-details');
    }


    public function products_cart_page_function($id)
{

    $products_datas = Popular_products::where('id', $id)->first();

    if (!$products_datas) {
        return redirect()->back()->withErrors('Product not found.');
    }

    return view('product-details',compact('products_datas'));

}


public function index_page()
{
    $data = DB::table('mainpictures')->get();
    $popular_products_data = DB::table('popular_products')->get();

    // echo "<prev>". print_r($data);die();


    return view('index',
        // 'data' => $datas,
        // 'popular_products_data' => $popular_products_data
        // dd($data)
        compact('data','popular_products_data')
    );
}


    public function google_login_function(){
        return Socialite::driver('google')->redirect();

}
    public function google_Authentication_function(){
      $googleuser = Socialite::driver('google')->user();

}

public function shipping_function(Request $request, $id) {
    $data = DB::table('popular_products')->where('id', $id)->first();
    $email_session = session('email_session');
    $customer = Customer::where('email', $email_session)->first();

    // Store the product ID in the session
    session(['product_id' => $id]);

    return view('shipping', compact('data', 'customer'));
}

public function pdf_function(Request $request, $id) {
    $customerData = Customer::find($id);

    if (!$customerData) {
        return response()->json(['error' => 'Customer not found'], 404);
    }

    $data = [
        'title' => "Your Information Details",
        'date' => now()->format('m/d/Y'),
        'user' => $customerData,
    ];

    // Load the view and create the PDF
    $pdf = Pdf::loadView('my_pdf', $data);

    $filename = 'My_data' . $id . '.pdf';

    $pdf->save(public_path('All_pdf/' . $filename));

    return $pdf->download($filename);

    $customerData = Customer::find($id);

    if (!$customerData) {
        return response()->json(['error' => 'Customer not found'], 404);
    }

    $data = [
        'title' => "Your Information Details",
        'date' => now()->format('m/d/Y'),
        'user' => $customerData,
    ];

    // Load the view and create the PDF
    $pdf = Pdf::loadView('my_pdf', $data);

    $filename = 'My_data' . $id . '.pdf';

    // Save the PDF to the public/All_pdf directory
    $pdfPath = public_path('All_pdf/' . $filename);
    $pdf->save($pdfPath);

    // Email sending logic
    // $useremail = session('email_session');

    //     Mail::to($useremail)->send(new PdfMail($filename));
}


public function Excel_function()
{
    return Excel::download(new UsersExport(), 'customers.xlsx');
}

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Make sure this view exists
    }

    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:customers,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->input('email');
        $otp = mt_rand(100000, 999999); // Generate a 6-digit OTP
        $customer = Customer::where('email', $email)->first(); // Use $customer instead of $user
        if(!$customer){
           return redirect()->back()->with('error', 'Customer not found.');
        }
        if ($customer) {
            $customer->otp = $otp;
             $customer->otp_expiry = now()->addMinutes(10); // OTP expires in 10 minutes
            $customer->save();

            // Send OTP via email
            $emailMessage = 'Here is your OTP to reset your password.'; // Explicitly create a string
            $emailSubject = 'Your OTP for Password Reset';

            Mail::to($email)->send(new PasswordResetOtp(  // Updated Mailable class name
                $emailMessage,
                $emailSubject,
                (string) $otp  // Explicitly cast OTP to a string
            ));

            Session::put('reset_email', $email); // Store email in session for later use

            return redirect()->route('otp.verification.form')->with('success', 'OTP sent to your email address.');
        }

        return redirect()->back()->with('error', 'User not found.'); // Should not happen, as validation checks for email existence
    }


    public function showOtpVerificationForm()
    {
        return view('auth.otp-verification'); // Create this view
    }

    public function verifyOtps(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $otp = $request->input('otp');
        $email = Session::get('reset_email');

        if (!$email) {
            return redirect()->route('forgot.password.form')->with('error', 'Email not found in session. Please request OTP again.');
        }

        $customer = Customer::where('email', $email)->first();

        if (!$customer) {
            return redirect()->route('forgot.password.form')->with('error', 'User not found.');
        }

         // Check for OTP expiry
         if ($customer->otp_expiry < now()) {
            $customer->otp = null;
            $customer->otp_expiry = null;
            $customer->save();
            return redirect()->back()->with('error', 'OTP has expired. Please request a new one.');
        }

        if ($customer->otp == $otp ) {
            // Clear OTP and expiry after successful verification
            $customer->otp = null;
             $customer->otp_expiry = null;
            $customer->save();

            Session::put('reset_token', Str::random(60)); // Generate a reset token
            return redirect()->route('reset.password.form')->with('success', 'OTP verified successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid OTP or OTP has expired.');
        }
    }

    public function showResetPasswordForm()
    {
        // Verify reset token
        if (!Session::has('reset_token')) {
            return redirect()->route('forgot.password.form')->with('error', 'Invalid reset link.');
        }
        return view('auth.reset-password'); // Create this view
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => [
                'required',
                'min:8',
                'confirmed',
                function ($attribute, $value, $fail) {
                    // Check for at least one numeric character
                    if (!preg_match('/[0-9]/', $value)) {
                        $fail('The password must contain at least one numeric character or alphabatic or special character.');
                    }

                    // Check for at least one alphabetic character
                    if (!preg_match('/[a-zA-Z]/', $value)) {
                        $fail('The password must contain at least one alphabetic character.');
                    }

                    // Check for at least one special character
                    if (!preg_match('/[^a-zA-Z0-9]/', $value)) {
                        $fail('The password must contain at least one special character.');
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = Session::get('reset_email');

        if (!$email) {
            toastr()->error('Your Email is Not registered.');
            return redirect()->route('forgot.password.form')->with('error', 'Email not found in session. Please request OTP again.');
        }

        $user = Customer::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('forgot.password.form')->with('error', 'User not found.');
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        Session::forget('reset_email');
        Session::forget('reset_token');
        return redirect()->route('loginform')->with('success', 'Password reset successfully. Please log in.');
    }

}
