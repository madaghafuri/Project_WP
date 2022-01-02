@extends('layouts.base')

@section('page-content')
  <div class="d-flex flex-row gap-3 mb-3" style="color: gray">
    <h6><i class="bi bi-house-fill"></i></h6>
    <h6><i class="bi bi-chevron-right"></i></h6>
    <h6>{{ $details->category }}</h6>
    <h6><i class="bi bi-chevron-right"></i></h6>
    <h6>{{ $details->name }}</h6>
  </div>
  <div class="d-flex flex-row justify-content-center gap-3">
    <div class="rounded-3 embed-responsive embed-responsive-16by9">
      <iframe class="rounded-3 embed-responsive-item" style="min-width: 854px; min-height: 480px; height: 100%" src={{ $details->trailerLink }} frameborder="0"></iframe>
    </div>
    <div class="d-flex flex-column justify-content-around">
      <img class="rounded-3" src={{ $details->coverLink }} alt="">
      <b><h4>{{ $details->name }}</h4></b>
      <b><p>Genre: {{ $details->category }}</p></b>
      <b><p>Release Date: {{ $details->created_at }}</p></b>
      <b><p>Developer: {{ $details->developer }}</p></b>
      <b><p>Publisher: {{ $details->publisher }}</p></b>
      <form action="{{route('cart.store')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$details->id}}" name="id">
        <input type="hidden" value="{{$details->name}}" name="name">
        <input type="hidden" value="{{$details->price}}" name="price">
        <input type="hidden" value="{{$details->coverLink}}" name="image">
        <input type="hidden" value="{{$details->category}}" name="category">
        <button class="btn btn-primary d-flex flex-row justify-content-center align-items-center" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modal" type="submit">
          <h5 class="mb-0 me-4">IDR {{ $details->price }}</h5>
          <h5 class="mb-0 me-4">|</h5>
          <h4 class="mb-0 me-2"><i class="bi bi-cart3"></i></h4>
          <h5 class="mb-0">Add to Cart</h5>
        </button>
      </form>
      @if (session('success'))
        <div class="position-absolute top-50 start-50 translate-middle" id="modal" aria-labelledby="modal" tabindex="-1" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="mb-0">{{session('success')}}</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <img src="{{$details->coverLink}}" class="rounded-3" alt="">
                <p>{{$details->name}}</p>
                <p>{{$details->category}}</p>
              </div>
              <div class="modal-footer">
                <a href="{{route('games.index')}}">
                  <button class="btn btn-light shadow">Continue Shopping</button>
                </a>
                <a href="{{route('cart.index')}}">
                  <button class="btn btn-primary shadow">Go to Cart</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
  <div class="mt-5">
    <h3>Game Description</h3>
    <p>{{$details->description}}</p>
  </div>
@endsection