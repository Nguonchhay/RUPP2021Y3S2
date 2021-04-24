@extends('layouts.app')

@section('content')
  <div class="col-lg-8 col-md-10 mx-auto">
    <p>Edit Category</p>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" value="{{ $category->name }}" class="form-control" placeholder="Name" name="name" id="name" required>
      </div>

      <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>
@endsection