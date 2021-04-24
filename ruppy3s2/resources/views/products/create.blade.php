@extends('layouts.app')

@section('content')
  <div class="col-lg-8 col-md-10 mx-auto">
    <p>New Product</p>
    <form action="{{ route('products.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id" required>
          <option>Please select one</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
      </div>

      <div class="form-group">
        <label for="unit_price">Unit Price</label>
        <input type="text" class="form-control" placeholder="Unit Price" name="unit_price" id="unit_price" required >
      </div>

      <div class="form-group">
        <label for="qty_in_stock">Quantity in Stock</label>
        <input type="number" class="form-control" placeholder="Quantity In Stock" name="qty_in_stock" id="qty_in_stock" required>
      </div>

      <button type="submit" class="btn btn-primary">Send</button>
    </form>
  </div>
@endsection