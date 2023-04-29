<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KindsOfFood;
use App\Models\Customer;
use App\Models\Food;
use App\Models\SizeOfFood;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function customerindex()
    {
        $kindsoffood = KindsOfFood::get();
        return view('Customer.customer', compact('kindsoffood'));
    }

    public function kindsoffoodindex($id)
    {
        $kindsoffood = KindsOfFood::get();
        $data = Food::select('*')
            ->select('food.FoodID', 'food.FoodName', 'food.FoodDetails', 'food.FoodPicture', 'food.KindsOfFoodID', 'kinds_of_food.KindsOfFoodName')
            ->join('kinds_of_food', 'food.KindsOfFoodID', '=', 'kinds_of_food.KindsOfFoodID')
            ->where('food.KindsOfFoodID', '=', $id)
            ->get();
        return view('Customer.kindoffoodcustomer', compact('kindsoffood', 'data'));
    }
    public function getCustomer($id)
    {
        $information = Customer::get()
            ->where('CustomerID', '=', $id)->first();
        return view('Customer.customerprofile', compact('information'));
    }
    public function logoutCustomer()
    {
        if (Session::has('CustomerID')) {
            Session::pull('CustomerID');
            Session::pull('CustomerFullName');
            Session::pull('CustomerPicture');
            Session::pull('GenderCustomer');
            Session::pull('DateOfBirth');
            Session::pull('Email');
            Session::pull('Address');
            Session::pull('PhoneNumber');
            return redirect('Homepage/homepage');
        }
    }
}
