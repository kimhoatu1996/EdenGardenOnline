<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Food;
use App\Models\KindsOfFood;
use App\Models\SizeOfFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function admin()
    {
        return view('Admin.admin');
    }

    public function addproduct()
    {
        $kindsoffood = KindsOfFood::get();
        return view('Admin.pages.addproduct', compact('kindsoffood'));
    }


    public function Logout()
    {
        if (Session::has('AdminID')) {
            Session::pull('AdminID');
            Session::pull('AdminFullName');
            Session::pull('AdminPicture');
            Session::pull('Gender');
            Session::pull('DateofBirth');
            Session::pull('Email');
            Session::pull('PhoneNumber');
            return redirect('Homepage/homepage');
        }
    }

    public function FoodProduct(Request $request)
    {
        $search = $request->input('search');
        $data = FooD::select('size_of_food.Size', 'size_of_food.Price', 'Food.FoodID', 'Food.FoodName', 'Food.FoodDetails', 'Food.FoodPicture', 'kinds_of_food.KindsOfFoodName', 'size_of_food.SizeOfFoodID')
            ->join('size_of_food', 'size_of_food.FoodID', '=', 'Food.FoodID')
            ->join('kinds_of_food', 'Food.KindsOfFoodID', '=', 'kinds_of_food.KindsOfFoodID')
            ->where(function ($query) use ($search) {
                $query->where('Food.FoodName', 'LIKE', '%' . $search . '%')
                    ->orWhere('Food.FoodDetails', 'LIKE', '%' . $search . '%')
                    ->orWhere('kinds_of_food.KindsOfFoodName', 'LIKE', '%' . $search . '%');
            })
            ->paginate(9);
        return view('Admin.pages.tables', ['data' => $data]);
    }
    public function edit($id)
    {
        $data = FooD::select('*')
            ->join('size_of_food', 'size_of_food.FoodID', '=', 'Food.FoodID')
            ->where('SizeOfFoodID', '=', $id)->first();
        return view('Admin.pages.editprice', compact('data'));
    }

    public function editdetails($id)
    {
        $data = FooD::select('*')
            ->where('FoodID', '=', $id)->first();
        $kindoffood = KindsOfFood::get();
        return view('Admin.pages.editdetails', compact('data', 'kindoffood'));
    }
    public function updatedetails(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'details' => 'required',
            'category' => 'required',
        ]);
        Food::where('FoodID', '=', $request->id)->update([
            'FoodName' => $request->name,
            'FoodDetails' => $request->details,
            'FoodPicture' => $request->image,
            'KindsOfFoodID' => $request->category
        ]);
        return redirect('Admin/admin');
    }


    public function update(Request $request)
    {
        $validateData = $request->validate([
            'price' => 'required|numeric|min:1',
        ]);
        SizeOfFood::where('SizeOfFoodID', '=', $request->sizeid)->update([
            'Price' => $request->price
        ]);
        return redirect('Admin/pages/tables');
    }

    public function profileAdmin($id)
    {
        $information = Admin::get()
            ->where('AdminID', '=', $id)->first();
        return view('Admin.pages.profile', compact('information'));
    }

    public function updateProfileAdmin(Request $request)
    {
        $validateData = $request->validate([
            'fullname' => 'required|regex:/^[a-zA-Z\s]*$/',
            'dateofbirth' => 'required|date|before_or_equal:2023-01-01',
            'gender' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);
        Admin::where('AdminID', '=', $request->id)->update([
            'AdminFullName' => $request->fullname,
            'Gender' => $request->gender,
            'Email' => $request->email,
            'DateofBirth' => $request->dateofbirth,
            'PhoneNumber' => $request->phone
        ]);
        return redirect('Admin/admin');
    }

    public function save(Request $request)
    {

        $validateData = $request->validate([
            'id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'image' => 'required',
            'kindoffoodid' => 'required',
            'sizeS' => 'required|numeric|min:1',
            'sizeL' => 'required|numeric|min:1',
            'sizeM' => 'required|numeric|min:1'
        ]);

        $pro1 = new FooD();
        $pro1->FoodID = $request->id;
        $pro1->FoodName = $request->name;
        $pro1->FoodDetails = $request->details;
        $pro1->FoodPicture = $request->image;
        $pro1->KindsOfFoodID = $request->kindoffoodid;
        $pro1->save();

        $pro2 = new SizeOfFood();
        $pro2->FoodID = $request->id;
        $pro2->Size = "S";
        $pro2->Price = $request->sizeS;
        $pro2->save();

        $pro3 = new SizeOfFood();
        $pro3->FoodID = $request->id;
        $pro3->Size = "L";
        $pro3->Price = $request->sizeL;
        $pro3->save();

        $pro4 = new SizeOfFood();
        $pro4->FoodID = $request->id;
        $pro4->Size = "M";
        $pro4->Price = $request->sizeM;
        $pro4->save();
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function delete($id)
    {
        SizeOfFood::where('FoodID', '=', $id)->delete();
        FooD::where('FoodID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
