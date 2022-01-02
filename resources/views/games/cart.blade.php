@extends('layouts.base')

@section('page-content')
  <div class="d-flex flex-row gap-4">
    <h6><i class="bi bi-arrow-right-circle-fill"></i>Shopping Cart</h6>
    <h6><i class="bi bi-chevron-right"></i></h6>
    <h6><i class="bi bi-arrow-right-circle-fill"></i>Transaction Information</h6>
    <h6><i class="bi bi-chevron-right"></i></h6>
    <h6><i class="bi bi-arrow-right-circle-fill"></i>Transaction Receipt</h6>
  </div>
  <h1>Shopping Cart</h1>
  <div class="rounded-3 p-5 bg-white mb-4 shadow">
  <?php $total = 0 ?>
    
      @foreach ($cartItems as $details)
        <?php $total += $details->price ?>
        <div class="d-flex flex-row gap-3 mb-2">
          <img class="rounded-3" src={{$details->attributes->image}} alt="">
          <div class="d-flex flex-row justify-content-between w-100 align-items-center">
            <div>
              <div class="d-flex flex-row gap-3">
                <h5 class="mb-0">{{ $details->name }}</h5>
                <button class="btn btn-sm btn-dark rounded-pill" disabled>{{ $details->attributes->category }}</button>
              </div>
              <div class="d-flex flex-row" style="color: gray">
                <p><i class="bi bi-tag"></i></p>
                <p>IDR {{ $details->price }}</p>
              </div>
            </div>
            <form action="{{route('cart.destroy', $details->id)}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-secondary btn-sm d-flex flex-row gap-1" type="submit">
                <p class="mb-0"><i class="bi bi-trash-fill"></i></p>
                <p class="mb-0">Delete</p>
              </button>
            </form>
          </div>
        </div>
      @endforeach
    
    <div id="total-price" class="mt-3">
      <p>Total Price: {{$total}}</p>
    </div>
    <button class="btn btn-secondary d-flex flex-row gap-2 mt-3 mb-2">
      <p class="mb-0"><i class="bi bi-truck"></i></p>
      <b><p class="mb-0">Checkout</p></b>
    </button>
  </div>
@endsection

