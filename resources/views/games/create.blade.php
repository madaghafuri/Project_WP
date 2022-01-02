@extends('layouts.base')

@section('page-content')
  <h1>Create Games</h1>
  <form action="{{route('manage.store')}}" method="POST">
    @csrf
    <div>
      <label for="">Game Name</label>
      <input type="text" class="form-control" name="name">
    </div>
    <div>
      <label for="">Game Description</label>
      <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div>
      <label for="">Game Category</label>
      <input type="text" class="form-control" name="category">
    </div>
    <div>
      <label for="">Game Developer</label>
      <input type="text" class="form-control" name="developer">
    </div>
    <div>
      <label for="">Game Publisher</label>
      <input type="text" class="form-control" name="publisher">
    </div>
    <div>
      <label for="">Price (IDR)</label>
      <input type="number" class="form-control" name="price">
    </div>
    <div>
      <label for="">Game Cover</label>
      <input type="file" class="form-control" name="cover">
    </div>
    <div>
      <label for="">Game Trailer</label>
      <input type="file" class="form-control" name="trailer">
    </div>
    <div class="d-flex flex-row gap-3 mt-3 justify-content-end">
      <button type="reset" class="btn btn-light shadow">Cancel</button>
      <button class="btn btn-secondary shadow" type="submit">Save</button>
    </div>
  </form>
@endsection