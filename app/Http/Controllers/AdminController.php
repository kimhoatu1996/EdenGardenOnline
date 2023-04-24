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

    public function adminLogin()
    {
        return view('Login.login');
    }

    public function checkLogin(Request $request)
    {
        $admin = Admin::where('AdminID', '=', $request->get('id'))->first();
        if ($admin) {
            if ($admin->PassWordAdmin == $request->password) {
                $request->session()->put('AdminID', $admin->AdminID); //lay va luu vao bien trong ngoac don 'AdminID'
                $request->session()->put('AdminFullName', $admin->AdminFullName);
                $request->session()->put('AdminPicture', $admin->AdminPicture);
                return redirect('Admin/admin');
            } else {
                return back()->with('fail', 'Password not matches');
            }
        } else {
            return back()->with('fail', 'Admin not found');
        }
    }

    public function Logout()
    {
        if (Session::has('AdminID')) {
            Session::pull('AdminID');
            return redirect('Homepage/homepage');
        }
    }

    public function FoodProduct()
    {
        $data = FooD::select('SizeOfFood.Size', 'SizeOfFood.Price', 'Food.FoodID', 'Food.FoodName', 'Food.FoodDetails', 'Food.FoodPicture', 'kinds_of_food.KindsOfFoodName','SizeOfFood.SizeOfFoodID')
            ->join('SizeOfFood', 'SizeOfFood.FoodID', '=', 'Food.FoodID')
            ->join('kinds_of_food', 'Food.KindsOfFoodID', '=', 'kinds_of_food.KindsOfFoodID')
            ->get();
        return view('Admin.pages.tables', compact('data'));
    }

    public function edit($id)
    {
        $data = FooD::select('*')
        ->join('SizeOfFood', 'SizeOfFood.FoodID', '=', 'Food.FoodID')
        ->where('SizeOfFoodID', '=', $id)->first();
        $kinds_of_food = KindsOfFood::get();
        return view('Admin.pages.edit', compact('data', 'kinds_of_food'));
    }

    public function profileAdmin($id){
        $information = Admin::get()
        ->where('AdminID','=',$id)->first();
        return view('Admin.pages.profile', compact('information'));
    }
}