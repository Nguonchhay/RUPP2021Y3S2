@extends('layouts.app')

@section('content')
  <div class="col-lg-8 col-md-10 mx-auto">
    <p>New Category</p>
    <form action="{{ route('categories.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
      </div>

      <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>
@endsection