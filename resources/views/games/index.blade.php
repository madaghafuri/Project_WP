@extends('layouts.base')



@section('page-content')
<div class="d-flex flex-wrap p-3 justify-content-center">
  @foreach($games as $game)
    <a href="{{route('games.show', $game->id)}}" style="text-decoration-line: none; color: black; --hover-backgroundcolor: gray"><div class="card shadow bg-body rounded-3 m-3" style="width: 23rem;">
      <img src={{ $game->coverLink }} class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-text m-0" style="height: 50px">{{ $game->name }}</h5>
        <p class="card-text">{{ $game->category }}</p>
        <div class="d-flex justify-content-end">
          <p style="width: 120px; color:white" class="d-flex justify-content-center p-2 bg-primary rounded m-0">IDR {{ $game->price }}</p>
        </div>
      </div>
    </div></a>
  @endforeach
</div>
<div class="d-flex justify-content-center">
  {{ $games->links() }}
</div>
@endsection