<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Customercontroller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcomemail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Customer;



class Customercontroller extends Controller
{
    public function register(){
        return view('register');
    }

    public function register_save_data(Request $request)
    {
        $validate=$request->validate([
            'name' => 'required|min:3|max:10',
            'email' => 'required|email',
            'password' => 'required|string',
            'city' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'phone' => 'required|string|max:15',
        ],
    [
        'name.required'=>'Enter the name'

    ]);

        $email = $validate['email'];
        $email_user = DB::table('customers')->where('email', $email)->first();

        if ($email_user) {
            // Use Toastr to show error message
            toastr()->error('Your Email is already registered.');

            return redirect()->back();
        } else {
            // Handle the image upload
            $imagepath = $request->file('image')->store('uploads', 'public');

            // Insert the user data into the database
            DB::table('customers')->insert([
                'name' => $validate['name'],
                'email' => $validate['email'],
                'password' => Hash::make($validate['password']),
                'city' => $validate['city'],
                'image' => $imagepath,
                'phone' => $validate['phone'],
            ]);

            // Send a welcome email
            $useremail = $validate['email'];
            $msg = "This Email Is Sent From Endel Digital Solution's";
            $subject = "Endel Mail";
            Mail::to($useremail)->send(new Welcomemail($msg, $subject));

            // Use Toastr to show success message
            toastr()->success('Your data has been successfully registered.');

            return redirect()->route('loginform');
        }
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
                return view('index');
            } else {
                return back()->withErrors(['password' => 'Invalid credentials.']);
            }
        } else {
            return back()->withErrors(['email' => 'No account found with that email.']);
        }

    }

    public function logout_user(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('loginform'); // Redirect to the login page or another route
    }

    public function shoping(){
        return view('shop');
    }

    public function products_details(){
        return view('product-details');
    }

    public function index_page(){
        $data = DB::table('mainpictures')->get();
        return view('index',['datas'=>$data]);
    }

    public function email_user_forgot_password(){
        return view('email_enter_forget_password');
    }

    public function update_passworded(Request $request){
        $request->validate([
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Update the user's password
        $updated = DB::table('customers')->where('email', $request->email)->update([
            'password' => Hash::make($request->password),
            'updated_at' => now(),
        ]);


        if ($updated) {
            toastr()->success('Your Password Has Been Updated Successfully.');

            return redirect()->route('login')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Password not updated.']);
        }
    }
    public function google_login_function(){
        return Socialite::driver('google')->redirect();

}
    public function google_Authentication_function(){
      $googleuser = Socialite::driver('google')->user();

}

}
