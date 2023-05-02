<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Food;
use App\Models\KindsOfFood;
use App\Models\SizeOfFood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Employee;


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
        $data = FooD::select(
            'size_of_food.Size',
            'size_of_food.Price',
            'Food.FoodID',
            'Food.FoodName',
            'Food.FoodDetails',
            'Food.FoodPicture',
            'kinds_of_food.KindsOfFoodName',
            'size_of_food.SizeOfFoodID'
        )
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
            'image' => 'required',
            'category' => 'required'
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
            'date' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);
        Admin::where('AdminID', '=', $request->id)->update([
            'AdminFullName' => $request->fullname,
            'Gender' => $request->gender,
            'Email' => $request->email,
            'DateofBirth' => $request->date,
            'PhoneNumber' => $request->phone
        ]);
        return redirect('Admin/admin');
    }

    public function save(Request $request)
    {

        $id = $request->id;
        $food = Food::where('FoodID', $id)->count();
        if ($food > 0) {
            return back()->with('fail', 'ID already exists!');
        } else {
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
    }

    public function delete($id)
    {
        SizeOfFood::where('FoodID', '=', $id)->delete();
        FooD::where('FoodID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }

    public function accountcustomer()
    {
        $data = Customer::select('*')
            ->get();
        return view('Admin.pages.accountcustomer', compact('data'));
    }
    public function deleteAccountcustomer($id)
    {
        Customer::where('CustomerID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Account deleted successfully!');
    }

    public function employee()
    {
        $employees = Employee::select(
            'EmployeePicture',
            'EmployeeID',
            'EmployeeFullName',
            'Gender',
            'DateOfBirth',
            'Email',
            'PhoneNumber'
        )->get();
        return view('Admin.pages.employee', compact('employees'));
    }
    public function DeleteEmployee($id)
    {
        $employee = Employee::where('EmployeeID', '=', $id)->delete();
        return redirect()->back()->with('success', 'Employee deleted successfully!');
    }
    public function editEmployee($id)
    {
        $employee = Employee::select('*')
            ->where('EmployeeID', '=', $id)->first();
        return view('Admin.pages.editemployee', compact('employee'));
    }
    public function updateEmployee(Request $request)
    {
        $employee = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        Employee::where('EmployeeID', '=', $request->id)->update([
            'EmployeeFullName' => $request->name,
            'EmployeePicture' => $request->image,
            'Gender' => $request->gender,
            'Email' => $request->email,
            'PhoneNumber' => $request->phone
        ]);
        return redirect('Admin/admin');
    }
    public function saveEmployee(Request $request)
    {
        $id = $request->id;
        $food = Employee::where('EmployeeID', $id)->count();
        if ($food > 0) {
            return back()->with('fail', 'ID already exists!');
        } else {
            $employee = $request->validate([
                'id' => 'required',
                'name' => 'required',
                'image' => 'required',
                'gender' => 'required',
                'date' => 'required',
                'email' => 'required',
                'phone' => 'required',

            ]);

            $employee = new Employee();
            $employee->EmployeeID = $request->id;
            $employee->EmployeeFullName = $request->name;
            $employee->EmployeePicture = $request->image;
            $employee->Gender = $request->gender;
            $employee->DateOfBirth = $request->date;
            $employee->Email = $request->email;
            $employee->PhoneNumber = $request->phone;
            $employee->save();
            return redirect()->back()->with('success', 'Employee provice successfully!');
        }
    }
    public function addEmployee()
    {
        return view('Admin.pages.addemployee');
    }
}
