<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('Login.login');
    }

    public function checkLogin(Request $request)
    {
        $customer = Customer::where('CustomerID', '=', $request->get('id'))->first();
        $admin = Admin::where('AdminID', '=', $request->get('id'))->first();
        if ($customer) {
            if (Hash::check($request->password, $customer->PassWordCustomer)) {
                $request->session()->put('CustomerID', $customer->CustomerID);
                $request->session()->put('CustomerFullName', $customer->CustomerFullName);
                $request->session()->put('GenderCustomer', $customer->GenderCustomer);
                $request->session()->put('Email', $customer->Email);
                $request->session()->put('DateOfBirth', $customer->DateOfBirth);
                $request->session()->put('Address', $customer->Address);
                $request->session()->put('PhoneNumber', $customer->PhoneNumber);
                return redirect('Customer/customer');
            } else {
                return back()->with('fail', 'Password not matches');
            }
        } else if ($admin) {
            if ($admin->PassWordAdmin == $request->password) {
                $request->session()->put('AdminID', $admin->AdminID);
                $request->session()->put('AdminFullName', $admin->AdminFullName);
                $request->session()->put('AdminPicture', $admin->AdminPicture);
                $request->session()->put('Gender', $admin->Gender);
                $request->session()->put('DateofBirth', $admin->DateofBirth);
                $request->session()->put('Email', $admin->Email);
                $request->session()->put('PhoneNumber', $admin->PhoneNumber);
                return redirect('Admin/admin');
            } else {
                return back()->with('fail', 'Password not matches');
            }
        } else {
            return back()->with('fail', 'Id not found');
        }
    }
}
