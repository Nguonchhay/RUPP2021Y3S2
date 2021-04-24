@extends('layouts.app')

@section('content')
    <div class="col-lg-8 col-md-10 mx-auto">
        <h1>Categories</h1>

        <table class="table table-border">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>
                <a class="btn btn-primary" href="{{ route('categories.create') }}">+ New</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                  <ul>
                    <li>
                      <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit </a>
                    </li>
                    <li>
                      <form id="categoryDelete{{$category->id}}" method="POST" action="{{ route('categories.destroy', $category->id) }}">
                        @csrf
                        @method('DELETE')
                      </form>
                      <a class="btn btn-danger" href="#" onclick="document.getElementById('categoryDelete{{$category->id}}').submit()">Delete</a>
                    </li>
                  </ul>
                </td>
              </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  <hr>
@endsection