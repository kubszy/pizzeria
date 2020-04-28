<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Session;

use Carbon\Carbon;

use App\Pizza;

use App\Topping;

use App\Order;

use App\OrderPizza;

use App\OrderTopping;

class FrontendController extends Controller
{
    public function indexFrontend()
    {
      // Session::forget('cart');
      $pizzas = Pizza::all();
      foreach ($pizzas as $key => $pizza) {
        $pizzas[$key]->description = Str::limit($pizza->description, 50);
      }
      return view('frontend.index', compact('pizzas'));
    }

    public function addToCart($id, $type)
    {
      if ($type != 'topping') {
        $item = Pizza::find($id);
      } else {
        $item = Topping::find($id);
      }

      $cart = session()->get('cart');
      if(!$cart) {
        $cart = [
                $id => [
                    "name" => $item->name,
                    'description' => $item->description,
                    'price' => $item->price,
                    "quantity" => 1,
                    "type" => $type,
                ]
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Pizza została dodana do koszyka! W celu wybrania dodatków przejdź do koszyka.');
      }

      if(isset($cart[$id])) {
        $cart[$id]['quantity'] ++;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Pizza została dodana do koszyka! W celu wybrania dodatków przejdź do koszyka.');
      }
        $cart[$id] = [
          "name" => $item->name,
          'description' => $item->description,
          'price' => $item->price,
          "quantity" => 1,
          "type" => $type,
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Pizza została dodana do koszyka! W celu wybrania dodatków przejdź do koszyka.');
    }

    public function cart()
    {
      // dd(session()->get('cart'));
      $sauces = Topping::where('type', 'sos')->get();
      $components = Topping::where('type', 'składnik')->get();
      return view('frontend.cart', compact('components', 'sauces'));
    }

    public function removeFromCart(Request $request)
    {
      if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('delete', 'Pozycja usunięta z koszyka!');
      }
    }

    public function saveCart(Request $request)
    {
      $cart = session()->get('cart');
      if (empty($cart)) {
        return redirect()->back()->with('warning', 'Coś poszło nie tak ;()');
      } else {
        $sum = 0;
        $order = new Order();
        $order->user_id = $request->userId;
        $order->order_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        foreach($cart as $id => $details) {
          $sum += $details['price'] * $details['quantity'];
        }
        $order->total_price = $sum;
        $order->save();

        foreach($cart as $key => $item) {
          if ($item['type'] != 'pizza') {
            $order_topping = new OrderTopping();
            $order_topping->order_id = $order->id;
            $order_topping->topping_id = $key;
            $order_topping->price = $item['price'];
            $order_topping->quantity = $item['quantity'];
            $order_topping->save();
          } else {
            $order_pizza = new OrderPizza();
            $order_pizza->order_id = $order->id;
            $order_pizza->pizza_id = $key;
            $order_pizza->price = $item['price'];
            $order_pizza->quantity = $item['quantity'];
            $order_pizza->save();
          }
        }
        $request->session()->forget('cart');
        session()->flash('saveOrder', 'Zamówienie zostało zapisane pod nr: ' . $order->id);
      }
    }
}
