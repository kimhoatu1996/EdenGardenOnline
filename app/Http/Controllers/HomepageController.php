<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\KindsOfFood;
use App\Models\Food;


class HomepageController extends Controller
{
    public function index(){
        $kindsoffood = KindsOfFood::get();
        return view('Homepage.homepage',compact('kindsoffood'));
    }
    public function menu(){
        $kindsoffood = KindsOfFood::get();
        return view('Homepage.menu',compact('kindsoffood'));
    }
    public function kindoffood($id)
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
        return view('Homepage.kindoffood', compact('kindsoffood', 'data'));
    }
}
