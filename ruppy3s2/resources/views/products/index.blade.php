@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        <h1>Products</h1>

        <table class="table table-border">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Name</th>
              <th>Unit Price</th>
              <th>Quantity In Stock</th>
              <th>Created By</th>
              <th>
                <a class="btn btn-primary" href="{{ route('products.create') }}">+ New</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->unit_price }}</td>
                <td>{{ $product->qty_in_stock }}</td>
                <td>{{ $product->user->name }}</td>
                <td>
                  <ul>
                    @can('update', $product)
                      <li>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit </a>
                      </li>
                    @endcan

                    @can('delete', $product)
                      <li>
                        <form id="productDelete{{$product->id}}" method="POST" action="{{ route('products.destroy', $product->id) }}">
                          @csrf
                          @method('DELETE')
                        </form>
                        <a class="btn btn-danger" href="#" onclick="document.getElementById('productDelete{{$product->id}}').submit()">Delete</a>
                      </li>
                    @endcan
                  </ul>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  <hr>
@endsection