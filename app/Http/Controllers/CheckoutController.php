<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Order;
use App\Product;
use App\OrderItem;
use Session;
use App\Notifications\OrderPlaced;
use Event;
use App\Events\OrderEvent;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }
    public function placeOrder(Request $request)
    {
        $isTesting     = (null !== $request->isTesting) ? true : false;
        $isTestCountry = (null !== $request->testCountry) ? $request->testCountry : '';

        // check if user country is blocked or not
        $blockedCountries = blockedCountry($isTesting, $isTestCountry);
        if ($blockedCountries) {
            return redirect()->back()->with('error', 'Your country is blocked for placing an order!');
        } else {
          $order = Order::create($request->all());
          $items = session()->get('cart');

    	    if ($order) {
      	       foreach ($items as $item) {
              		$product = Product::where('name', $item['name'])->first();
              		$orderItem = new OrderItem([
                      'product_id'    =>  $product->id,
                      'order_id'    =>  $product->id,
                      'quantity'      =>  $item['quantity']
                  ]);

              		$order->items()->save($orderItem);
              	}
              	event(new OrderEvent($request->all(),$product,$item['quantity']));
              	Session::forget('cart');
                return redirect()->route('index')->with('status', 'Your order placed!');
    	     }
        }
    }
}
