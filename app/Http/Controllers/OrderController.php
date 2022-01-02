<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Order_Detail;
use Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = auth()->user()->id;
      $cartItems = Cart::session($user)->getContent();
      if(Cart::session($user)->isEmpty()){
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
    public function store(StoreOrderRequest $request)
    {
      $userID = auth()->user()->id;
      $validation = $request->validate([
          'card-name' => 'required|string|min:6',
          'card-number' => 'required|regex:/^[0-9]+\s[0-9]+\s[0-9]+\s[0-9]+$/',
          'month' => 'required|numeric|between:1,12',
          'cvv' => 'required|digits_between:3,4',
          'country' => 'required',
          'zip-code' => 'required|numeric'
      ]);
      if($validation){
        Order::create([
          'user_id' => $userID,
          'total_price' => Cart::session(auth()->user()->id)->getSubTotal()
        ]);

        foreach ($request['game_id'] as $gameID) {
          Order_Detail::create([
            'order_id' => Order::where('user_id', auth()->user()->id)->id,
            'game_id' => $gameID,
            'price' => $request['price']
          ]);
        }

        return redirect()->route('order.show', auth()->user()->id)->with('success', 'Your ourder has been created');
      }

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $order = Order::where('user_id', $id)->first();
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
