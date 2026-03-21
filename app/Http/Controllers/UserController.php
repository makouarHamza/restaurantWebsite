<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view("home", compact('foods'));
    }

    public function addToCart(Request $req)
    {
        if (Auth::check()) {
            //food for table, request for from fields, cart for FoodCart table
            $food = Food::findOrfail($req->food_id);


            $cart = new FoodCart();
            $cart->userID = Auth::id();
            $cart->food_id = $req->food_id;
            $cart->food_name = $food->food_name;
            $cart->food_details = $food->food_details;
            $cart->food_image = $food->food_image;
            $cart->food_quantity = $req->quantity;
            $price = $cart->food_quantity * $food->food_price;
            //this price is from food table
            $cart->food_price = $price;

            $cart->save();
            if ($cart->save()) {
                // return redirect()->back()->with('cart_message', 'food added to the cart');
                return redirect('/#menu')->with('cart_message', 'food added to the cart');
            }
        }
    }

    public function foodCart(){
        $current_auth = Auth::id();
        $cart_food =  FoodCart::where('userID',$current_auth)->get();

        return view('show_cart',compact('cart_food'));
    }

    public function removeCart($id){
        $remove_food = FoodCart::findOrFail($id);
        $remove_food->delete();
        return redirect()->back()->with('danger', 'Deleted  Successfully!');
    }

    public function goTO()
    {
        return view("admin.adminfile");
    }
    public function home()
    {
        if (Auth::id() && Auth::user()->role === "admin") {
            return view("admin.dashboard");
        } else if (Auth::id() && Auth::user()->role === 'user') {
            return view('dashboard');
        }
    }
}
