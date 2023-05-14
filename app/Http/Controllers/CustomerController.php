<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KindsOfFood;
use App\Models\Customer;
use App\Models\Food;
use App\Models\SizeOfFood;
use Illuminate\Support\Facades\Session;
use App\Models\OrderCustomer;

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
            ->select(
                'food.FoodID',
                'food.FoodName',
                'food.FoodDetails',
                'food.FoodPicture',
                'food.KindsOfFoodID',
                'kinds_of_food.KindsOfFoodName'
            )
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

    public function buy(Request $request, $foodid)
    {
        $food = new OrderCustomer();

        $size = 'S';

        $price_size = SizeOfFood::where('FoodID', $foodid)
            ->where('Size', $size)
            ->select('Price', 'Size')
            ->value('Price');

        $food->FoodID = $foodid;
        $food->CustomerID = $request->input('customerid');
        $food->Quantity = 1;
        $food->Size = 'S';
        $food->Price = $price_size;
        $food->save();
        return redirect()->back();
    }

    public function orderview()
    {
        $customerid = session('CustomerID');
        $data = OrderCustomer::select('order_customers.*', 'Food.*', 'Customers.*')
            ->join('Food', 'order_customers.FoodID', '=', 'Food.FoodID')
            ->join('customers', 'order_customers.CustomerID', '=', 'customers.CustomerID')
            ->where('customers.CustomerID', '=', $customerid)
            ->get();
        return view('Customer/customerorder', ['data' => $data]);
    }

    public function DeleteElementOrder($id)
    {
        OrderCustomer::where('FoodID', '=', $id)->delete();
        return redirect()->back();
    }

    public function SaveChanges(Request $request)
    {
        $idfoods = $request->input('idfood');
        $sizefoods = $request->input('sizefood');
        $numberfoods = $request->input('numberfood');

        for ($i = 0; $i < count($idfoods); $i++) {
            $id = $idfoods[$i];
            $sizefood = $sizefoods[$i];
            $quantity = $numberfoods[$i];

            $price_size = SizeOfFood::where('FoodID', $id)
                ->where('Size', $sizefood)
                ->value('Price');

            $totalPrice = $quantity * $price_size;

            OrderCustomer::where('FoodID', '=', $id)->update([
                'Size' => $sizefood,
                'Quantity' => $quantity,
                'Price' => $totalPrice
            ]);
        }

        return redirect()->back();
    }

    public function updateProfileCustomer(Request $request)
    {
        $validateData = $request->validate([
            'fullname' => 'required|regex:/^[a-zA-Z\s]*$/',
            'dateofbirth' => 'required|date|before_or_equal:2023-01-01',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);
        Customer::where('CustomerID', '=', $request->id)->update([
            'CustomerFullName' => $request->fullname,
            'GenderCustomer' => $request->gender,
            'Email' => $request->email,
            'DateofBirth' => $request->dateofbirth,
            'PhoneNumber' => $request->phone,
            'Address' => $request->address
        ]);
        return redirect('Admin/admin');
    }
}
