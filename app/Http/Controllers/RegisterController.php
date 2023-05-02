<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register()
    {
        return view('Register.register');
    }
    public function registeraccount(Request $request)
    {
        $id = $request->id;
        $customer = Customer::where('CustomerID', $id)->count();
        if ($customer > 0) {
            return back()->with('fail', 'ID already exists!');
        } else {
            $validateData = $request->validate([
                'id' => 'required|min:1|regex:/^[a-zA-Z0-9_]+$/',
                'name' => 'required|regex:/^[a-zA-Z\s]*$/',
                'birthday' => 'required|date|before_or_equal:2023-01-01',
                'gender' => 'required',
                'password' => 'required|regex:/^\S+$/',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'address' => 'required'
            ]);
            $customer = new Customer();
            $customer->CustomerID = $id;
            $customer->CustomerFullName = $request->name;
            $customer->DateOfBirth = $request->birthday;
            $customer->GenderCustomer = $request->gender;
            $customer->PassWordCustomer = Hash::make($request->password);
            $customer->Email = $request->email;
            $customer->PhoneNumber = $request->phone;
            $customer->Address = $request->address;
            $customer->save();
            if ($customer) {
                return redirect('Login/login');
            } else {
                return back()->with('fail', 'Something went wrong! Please try again!');
            }
        }
    }
}
