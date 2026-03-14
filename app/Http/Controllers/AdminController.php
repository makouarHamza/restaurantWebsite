<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function addFood()
    {
        return view('admin.addfood');
    }

    public function postAddFood(Request $req)
    {
        $food = new Food();
        $food->food_name = $req->food_name;
        $food->food_details = $req->food_details;
        $image = $req->food_image;
        if ($image = $req->food_image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $food->food_image = $imagename;
        }
        $food->food_price = $req->food_price;

        $food->save();

        if($image=$req->food_image && $food->save()){
            $req->food_image->move('food_img',$imagename);
        }

        return redirect()->back()->with('success','Added Successfully!');
    }
}
