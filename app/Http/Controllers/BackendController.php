<?php

namespace App\Http\Controllers;

use App\Topping;

use App\Pizza;

use App\Order;

use App\User;

use Auth;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $users = User::count();
      $orders = Order::count();
      return view('backend.index', compact('users', 'orders'));
    }

    public function indexUser()
    {
      $user = Auth::user();
      return view('backend.indexUser', compact('user'));
    }

    public function components()
    {
      $components = Topping::where('type', '=', 'składnik')->get();
      return view('backend.components', compact('components'));
    }

    public function sauces()
    {
      $sauces = Topping::where('type', '=', 'sos')->get();
      return view('backend.sauces', compact('sauces'));
    }

    public function pizzas()
    {
      $pizzas = Pizza::all();
      return view('backend.pizzas', compact('pizzas'));
    }

    public function pendingOrders()
    {
      $pendingOrders = Order::where('status', '=', 'nowe')->get();
      return view('backend.pendingOrders', compact('pendingOrders'));
    }

    public function confirmedOrders()
    {
      $confirmedOrders = Order::where('status', '=', 'zatwierdzone')->get();
      return view('backend.confirmedOrders', compact('confirmedOrders'));
    }

    public function detailsOrder($id)
    {
      $orderPizza = Order::find($id)->orderPizza;
      $orderTopping = Order::find($id)->orderTopping;
      return view('backend.detailsOrder', compact('orderPizza', 'id', 'orderTopping'));
    }

    public function confirm(Request $request)
    {
      if($request->orderId) {
        $order = Order::where('id', $request->orderId)->update(['status' => 'zatwierdzone']);
      }
    }

    public function pendingOrdersUser()
    {
      $user = Auth::user();
      $orders = User::find($user->id)->orders->where('status', '=', 'nowe');
      return view('backend.pendingOrdersUser', compact('orders'));
    }

    public function confirmedOrdersUser()
    {
      $user = Auth::user();
      $orders = User::find($user->id)->orders->where('status', '=', 'zatwierdzone');
      return view('backend.confirmedOrdersUser', compact('orders'));
    }
}
