@extends('layouts.base')

@section('page-content')
  <div class="d-flex flex-row gap-4">
    <h6><i class="bi bi-arrow-right-circle-fill"></i>Shopping Cart</h6>
    <h6><i class="bi bi-chevron-right"></i></h6>
    <h6><i class="bi bi-arrow-right-circle-fill"></i>Transaction Information</h6>
    <h6><i class="bi bi-chevron-right"></i></h6>
    <h6><i class="bi bi-arrow-right-circle-fill"></i>Transaction Receipt</h6>
  </div>
  <h1>Transaction Information</h1>
  <form action="{{route('order.store')}}" method="POST">
    @csrf
    <div>
      <label for="">Card Name</label>
      <input type="text" name="card-name" class="form-control">
    </div>
    <div>
      <label for="">Card Number</label>
      <input type="text" name="card-number" class="form-control" placeholder="0000 0000 0000 0000">
      <label for="">VISA or Master Card</label>
    </div>
    <div>
      <div>
        <label for="">Expired Date</label>
        <div>
          <input type="month" name="month" class="form-control">
          <input type="datetime" name="date" class="form-control">
        </div>
      </div>
      <div>
        <label for="">CVC / CVV</label>
        <input type="text" class="form-control" name="cvv">
      </div>
    </div>
    <div>
      <div>
        <label for="">Country</label>
        <input type="text" class="form-control" name="country">
      </div>
      <div>
        <label for="">ZIP</label>
        <input type="text" class="form-control" name="zip-code">
      </div>
    </div>
    <?php $total = 0 ?>
    @foreach ($cartItems as $cartItem)
      <input type="hidden" value="{{$cartItem->id}}" name="game_id">
      <input type="hidden" value="{{$cartItem->price}}" name="price">
    @endforeach
    <div class="d-flex flex-row justify-content-between align-items-center">
      <div class="d-flex flex-row">
        <p>Total Price: </p>
        <b><p>Rp. {{Cart::session(auth()->user()->id)->getSubTotal()}}</p></b>
      </div>
      <div class="d-flex flex-row">
        <button class="btn btn-light shadow" type="reset">Cancel</button>
        <button class="btn btn-secondary shadow" type="submit">Checkout</button>
      </div>
    </div>
  </form>
  
@endsection