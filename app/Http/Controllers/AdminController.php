<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function admin(){

        return view('Admin.admin');
    }

    public function adminLogin(){
        return view('Login.login');
    }

    public function checkLogin(Request $request){
        $admin = Admin::where('AdminID', '=',$request->get('id'))->first();
        if($admin){
            if($admin->PassWordAdmin == $request->password){
                $request->session()->put('AdminID', $admin->AdminID); //lay va luu vao bien trong ngoac don 'AdminID'
                return redirect('Admin/admin');
            }else {
                return back()->with('fail','Password not matches');
            }
        }else{
            return back()->with('fail','Admin not found');
        }
    }

    public function Logout(){
        if(Session::has('AdminID')){
            Session::pull('AdminID');
            return redirect('Homepage/homepage');
        }
    }
}
