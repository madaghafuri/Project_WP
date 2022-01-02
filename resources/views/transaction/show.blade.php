@extends('layouts.base')

@section('page-content')
  <?php $total = 0 ?>
  <h1>Transaction Receipt</h1>
  <div>
    <p>Transaction ID: {{$order->id}}</p>
    <p>Created at: {{$order->created_at}}</p>
    @foreach ($order->order_detail as $detail)
      <?php $total += $detail->price ?>
      <div>
        <img src="{{$detail->game->coverLink}}" alt="">
        <div>
          <h5>{{$detail->game->name}}</h5>
          <p>
            <i class="bi bi-tag"></i>
            Rp. {{$detail->price}}
          </p>
        </div>
      </div>
    @endforeach
    <div>
      <p>Total Price: </p>
      <b><p>Rp. {{$total}}</p></b>
    </div>
  </div>
@endsection