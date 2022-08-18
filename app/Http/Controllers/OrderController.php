<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Cart;
use App\Models\Cart_Detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public $lastID;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $transactions = Order::where('user_id', auth()->user()->id)->get();
      return view('transaction.history', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = auth()->user()->id;
      $cartID = Cart::where('user_id', auth()->user()->id)->first()->id;
      $cartItems = Cart_Detail::all()->where('cart_id', $cartID);
      if($cartItems->isEmpty()){
        return redirect()->back();
      }
      return view('transaction.create', compact('cartItems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $userID = auth()->user()->id;
      $totalPrice = 0;
      $cartID = Cart::where('user_id', auth()->user()->id)->first()->id;
      $cartItems = Cart_Detail::all()->where('cart_id', $cartID);
      foreach ($cartItems as $details) {
        $totalPrice += $details->price;
      }
      $order = Order::create([
        'user_id' => $userID,
        'total_price' => $totalPrice
      ]);

      $this->lastID = $order->id;
      foreach($cartItems as $detail){
        $things = Order::where('user_id', $userID)->where('id', $this->lastID)->first();
        Order_Detail::create([
          'order_id' => $things->id,
          'game_id' => $detail->game_id,
          'price' => $detail->price
        ]);
      }
      foreach ($cartItems as $detail) {
        $detail->destroy($detail->id);
      }
      return redirect()->route('order.show', $this->lastID);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $order = Order::where('id', $id)->first();
      return view('transaction.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
