<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Order_Detail;
use Cart;
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
    public function store(Request $request)
    {
      $userID = auth()->user()->id;
      // $validation = $request->validate([
      //     'card-name' => 'required|string|min:6',
      //     'card-number' => 'required|regex:/^[0-9]+\s[0-9]+\s[0-9]+\s[0-9]+$/',
      //     'month' => 'required|numeric|between:1,12',
      //     'cvv' => 'required|digits_between:3,4',
      //     'country' => 'required',
      //     'zip-code' => 'required|numeric'
      // ]);

      $order = Order::create([
        'user_id' => $userID,
        'total_price' => Cart::session(auth()->user()->id)->getSubTotal()
      ]);
      
      $this->lastID = $order->id;
      $orderDetail = Cart::session(auth()->user()->id)->getContent();
      foreach($orderDetail as $detail){
        $things = Order::where('user_id', $userID)->where('id', $this->lastID)->first();
        Order_Detail::create([
          'order_id' => $things->id,
          'game_id' => $detail->id,
          'price' => $detail->price
        ]);
      }
      // foreach ($request['game_id'] as $gameID) {
      //   Order_Detail::create([
      //     'order_id' => Order::where('user_id', auth()->user()->id)->id,
      //     'game_id' => $gameID,
      //     'price' => $request['price']
      //   ]);
      // }
      Cart::session($userID)->clear();
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
