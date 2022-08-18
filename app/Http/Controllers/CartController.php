<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Detail;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cartID = Cart::where('user_id', auth()->user()->id)->first()->id;
      $cartItems = Cart_Detail::all()->where('cart_id', $cartID);
      return view('games.cart', compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      Cart_Detail::create([
        'game_id' => $req->id,
        'cart_id' => Cart::where('user_id', auth()->user()->id)->first()->id,
        'price' => $req->price
      ]);
      return redirect()->back()->with('success', 'Game sucessfully added to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
    }

    public function remove(Request $req){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cart_Detail::destroy($id);
      return redirect()->route('cart.index');
    }
}
