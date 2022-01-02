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
  <form action="">
    <div>
      <label for="">Card Name</label>
      <input type="text">
    </div>
    <div>
      <label for="">Card Number</label>
      <input type="text">
      <label for="">VISA or Master Card</label>
    </div>
    <div>
      <div>
        <label for="">Expired Date</label>
        <div>
          <input type="text">
          <input type="text">
        </div>
      </div>
      <div>
        <label for="">CVC / CVV</label>
        <input type="text">
      </div>
    </div>
    <div>
      <div>
        <label for="">Country</label>
        <input type="text">
      </div>
      <div>
        <label for="">ZIP</label>
        <input type="text">
      </div>
    </div>
  </form>
  
@endsection