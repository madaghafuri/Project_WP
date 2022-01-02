@extends('layouts.base')

@section('page-content')
  <h1>Manage Games</h1>
  <form action="" class="mb-2 w-25">
    <div>
      <label for="search">Filter by Name</label>
      <input type="search" name="search" class="form-control">
    </div>
    <button type="submit" class="btn btn-secondary">Search</button>
  </form>
  <a href="{{route('manage.create')}}">
    <button class="btn btn-primary mb-3" type="button">Add New Game</button>
  </a>
  <div class="d-flex flex-row flex-wrap gap-3 justify-content-around">
    @foreach ($games as $game)
      <div>
        <div class="card bg-dark text-white">
          <img src="{{$game->coverLink}}" class="card-img" alt="..." style="opacity: 0.60">
          <div class="card-img-overlay">
            <h5 class="card-title">{{$game->name}}</h5>
            <p class="card-text">{{$game->category}}</p>
          </div>
        </div>
        <button class="btn btn-secondary" type="button">
          <i class="bi bi-pencil-fill"></i>
          Update
        </button>
        <form action="{{route('manage.destroy', $game->id)}}" method="POST">
          @csrf
          @method('delete')
          <button class="btn btn-danger" type="submit">
            <i class="bi bi-trash-fill"></i>
            Delete
          </button>
        </form>
      </div>
    @endforeach
  </div>
@endsection