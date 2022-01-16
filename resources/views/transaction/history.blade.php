@extends('layouts.base')

@section('page-content')
  <h1>Transaction History</h1>
  <div class="bg-white p-3 rounded-3">
    @foreach ($transactions as $order)
      <div class="border-bottom">
        <p>Transaction ID: {{$order->id}}</p>
        <p>Purchased Date: {{$order->created_at}}</p>
        <div class="d-flex flex-row gap-3 overflow-auto">
          @foreach ($order->order_detail as $item)
            <img class="rounded-3 img-fluid" style="max-width: 30%" src="{{$item->game->coverLink}}" alt="">
          @endforeach
        </div>
        <div class="d-flex flex-row gap-2">
          <p>Total Price: </p>
          <b><p>Rp. {{$order->total_price}}</p></b>
        </div>
      </div>
    @endforeach
  </div>
@endsection