<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $delivered = Order::where('status', 'delivered')->get()->count();

        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    public function home()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.product_details', compact('data', 'count'));
    }

    public function add_to_cart($id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $data = new Cart();

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        toastr()->timeout(5000)->success('Product added to cart successfully');

        return redirect()->back();
    }

    public function my_cart()
    {
        if (Auth::id()) {

            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();

            $cart = Cart::where('user_id', $userId)->get();
        }

        return view('home.my_cart', compact('count', 'cart'));
    }

    public function cart_remove($id)
    {
        $data = Cart::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function place_order(Request $request)
    {
        $name = $request->receiver_name;

        $phone = $request->receiver_phone;

        $address = $request->receiver_address;

        $userId = Auth::user()->id;

        $cart = Cart::where('user_id', $userId)->get();

        foreach ($cart as $item) {
            $order = new Order();

            $order->receiver_name = $name;

            $order->receiver_phone = $phone;

            $order->receiver_address = $address;

            $order->user_id = $userId;

            $order->product_id = $item->product_id;

            $order->save();
        }

        Cart::where('user_id', $userId)->delete();

        return redirect()->back();
    }



    // Controller for header
    public function shop()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.components.shop', compact('product', 'count'));
    }

    public function why()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.components.why', compact('product', 'count'));
    }

    public function testi()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.components.testi', compact('product', 'count'));
    }

    public function contact()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();

            $userId = $user->id;

            $count = Cart::where('user_id', $userId)->count();
        } else {
            $count = '';
        }

        return view('home.components.contact', compact('product', 'count'));
    }
}
