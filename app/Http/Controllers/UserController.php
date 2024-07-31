<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\add_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){
        if(Auth::id()){
            $user_count = Auth::user()->id;
             $add_cart_count = add_cart::where('user_id',$user_count)->count(); 
        }else{
            $add_cart_count = '';
        }
         
        $show_product = Product::all();
        return view('home.index', compact('show_product','add_cart_count'));
    }

    public function dashboard(){
        if(Auth::id()){
            $user_count = Auth::user()->id;
             $add_cart_count = add_cart::where('user_id',$user_count)->count(); 
        }else{
            $add_cart_count = '';
        }
        $show_product = Product::all();
        return view('home.index', compact('show_product','add_cart_count'));
    }


    //adding product to the cart
    public function my_cart($id) {
        // Find the product by its ID
        $my_cart = Product::find($id);
    
        // Get the currently authenticated user
        $cart_user = Auth::user();
    
        // Create a new entry in the add_cart table
        $my_cart_create = add_cart::create([
            'user_id' => $cart_user->id,
            'product_id' => $my_cart->id,
        ]);
    
        // Return the view with the created cart item
        return redirect()->back();
    }

    //showing product to the cart

    public function add_cart() {
        $user_count = Auth::user()->id;
        $add_cart_count = add_cart::where('user_id',$user_count)->count();

        $cart_owner = Auth::user();
        $cart_ownerId = $cart_owner->id;
        $show_cart_item = add_cart::where('user_id', $cart_ownerId)->get();   
        return view('home.add_cart',compact('show_cart_item','add_cart_count'));
    }

    public function remove_cart($id){
        $remove_cart = add_cart::find($id)->delete();
        return redirect()->back();
    }


    //we will redirect from cart to order table
    public function form_cart(Request $request)
{
    $rec_user = Auth::user();
    $rec_user_id = $rec_user->id;

    $select_order = add_cart::where('user_id', $rec_user_id)->get();

    // Validate the request
    $request->validate([
        'name' => ['nullable', 'string', 'max:255'],
        'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255'],
        'address' => ['nullable', 'string', 'max:40', 'regex:/.*[a-zA-Z]+.*/'],
        'phone' => ['nullable', 'digits:11'],
    ]);

    // Create an order for each product
    foreach ($select_order as $select_orders) {
        $order = Order::create([
            'rec_name' => $request->name,
            'rec_email' => $request->email,
            'rec_address' => $request->address,
            'rec_phone' => $request->phone,
            'rec_user_id' => $rec_user_id,
            'rec_product_id' => $select_orders->product_id, // Assuming `product_id` exists in add_cart model
        ]);    
    }

    $cart_remove = add_cart::where('user_id',$rec_user_id)->get();
    foreach($cart_remove as $cart_removes){
        $remove = add_cart::find($cart_removes->id)->delete();
    }


    toastr()->success('Order Placed Successfully');
    return redirect()->route('order');
}


public function order(){
    $user_count = Auth::user()->id;
    $add_cart_count = add_cart::where('user_id',$user_count)->count(); 
    
    $confirm_user = Auth::user()->id;
    $all_order = Order::where('rec_user_id',$confirm_user)->paginate(3);
    return view('home.order',compact('all_order','add_cart_count'));
}

public function product_details($id){
    $user_count = Auth::user()->id;
    $add_cart_count = add_cart::where('user_id',$user_count)->count();

    $details_product = Product::find($id);
    return view('home.detail',compact('details_product','add_cart_count'));

}
























    
}
