<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function addFood()
    {
        return view('admin.addfood');
    }

    public function postAddFood(Request $req)
    {
        $req->validate([
            'food_image' => 'required|image|mimes:png,jpg,jpeg,gif|max:10240',
            'food_price' => 'required|numeric|min:0',
            'food_name' => 'required|min:2|string',
            'food_details' => 'required|min:8',
        ]);

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

        if ($image = $req->food_image && $food->save()) {
            $req->food_image->move('food_img', $imagename);
        }

        return redirect()->back()->with('success', 'Added Successfully!');
    }

    public function showFood()
    {
        $foods = Food::all();
        return view('admin.showfood', compact('foods'));
    }

    public function deleteFood($id)
    {
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->back()->with('danger', 'Deleted  Successfully!');
    }

    public function updateFood($id)
    {
        $food = Food::findOrFail($id);
        return view('admin.updatefood', compact('food'));
    }

    public function postUpdateFood(Request $req, $id)
    {
        $req->validate([
            'food_image' => 'image|mimes:png,jpg,jpeg,gif|max:10240',
            'food_price' => 'required|numeric|min:0',
            'food_name' => 'required|min:2|string',
            'food_details' => 'required|min:8',
        ]);

        $food = Food::findOrFail($id);
        $food->food_name = $req->food_name;
        $food->food_details = $req->food_details;
        $image = $req->food_image;
        if ($image = $req->food_image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $food->food_image = $imagename;
        }
        $food->food_price = $req->food_price;

        $food->save();

        if ($image = $req->food_image && $food->save()) {
            $req->food_image->move('food_img', $imagename);
        }

        return redirect()->back()->with('update', 'Updeted Successfully!');
    }
}
