<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use Illuminate\Support\Facades\Str;

class AdminController extends Controller
{
    public function admin_home_function(){
        return view('admin.admin_index');
    }

    public function mainpage_function(){
        return view('admin.admin_mainpicture');
    }

    public function show_all_data_function(){
        $all_dataed = Customer::paginate(5);
        return view('admin.show_all_data',['all_data'=>$all_dataed]);
    }

    public function delete_data_function($id){
        $delete_data = DB::table('customers')->where('id',$id)->delete();
        return redirect()->route('admin_home');
    }

    public function update_form_function(Request $request,$id){
        $update_data =Customer::find($id);
        return view('admin.admin_update_data',['update_data'=>$update_data]);
    }

    public function update_profile_function(Request $request, $id)
{
    $student = Customer::find($id);

    if (!$student) {
        return redirect()->back()->with('error', 'Customer not found.');
    }


    $student->name = $request->name;
    $student->email = $request->email;
    $student->password = Hash::make($request->password);
    $student->city = $request->city;


    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $student->image = $imagePath;
    }

    $student->phone = $request->phone;


    $student->save();

    return redirect()->route('admin_home')->with('success', 'Profile updated successfully');
}


    // public function delete_multiple_data_function(Request $request)
    // {

    //     if ($request->has('ids')) {

    //         $ids = $request->input('ids');


    //         $deleted = DB::table('customers')->whereIn('id', $ids)->delete();


    //         if ($deleted) {
    //             return redirect()->route('admin_home')->with('success', 'Selected records deleted successfully');
    //         } else {
    //             return redirect()->route('admin_home')->with('error', 'No records were deleted');
    //         }
    //     }

    // }

    public function mainpage_post_function(Request $request){
        $validate = $request->validate([
            'head' => 'required|string',
            'tag' => 'required|string',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        DB::table('mainpictures')->insert([
            'head' => $validate['head'],
            'tag' => $validate['tag'],
            'image' => $imagePath,
        ]);

        toastr()->success('Your data has been successfully added.');

    }

public function popular_products_get_function(){
    return view('admin.admin_popular_products');
}

    public function popular_products_post_function(Request $request){

      $validate =  $request->validate([
    'image' => 'required|image|mimes:jpeg,png,jpg,gif',
    'image_name' => 'required|string',
    'price' => 'required|numeric',
]);

$imagePath = $request->file('image')->store('uploads', 'public');

DB::table('popular_products')->insert([
    'image' => $imagePath,
    'image_name' => $validate['image_name'],
    'price' => $validate['price'],
]);

toastr()->success('Your data has been successfully added.');

    }


    public function shipping_function(Request $request, $id) {
        $data = DB::table('popular_products')->where('id', $id)->first();
        $email_session = session('email_session');
        $customer = Customer::where('email', $email_session)->first();

        // Store the product ID in the session
        session(['product_id' => $id]);

        return view('shipping', compact('data', 'customer'));
    }
}
