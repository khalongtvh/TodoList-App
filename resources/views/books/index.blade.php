@extends('layouts.app')

@section('content')
<div class="col-md-8">
  <div class="card">
    <div class="card-header">{{ __('Books') }}</div>

    <div class="card-body">
      <a href="{{route('books.create')}}" class="btn btn-primary">Create New Book</a>
      <div class="mt-3">
        <h3>List of books</h3>
        <table class="table">
          <thead>
            <th>Tile</th>
            <th>Price</th>
            <th>Pages</th>
            <th>Author Name</th>
            <th colspan="2">Action</th>
          </thead>
          <tbody>
            @forelse($books as $book)
            <tr>
              <td>{{$book->title}}</td>
              <td>{{$book->price}}</td>
              <td>{{$book->pages}}</td>
              <td>{{$book->pages}}</td>
              <td></td>
              <td></td>
            </tr>
            @empty
            <tr>
              <td colspan="5">No Book Add Yet!</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        <!-- <ul class="list-group">
          @forelse($books as $book)
          <li class="list-group-item">
            {{$book->name}}
            <span style="float:right">
              <a href="{{route('books.edit', [$book])}}" class="btn btn-warning">Edit</a>
              <form action="{{route('books.destroy', [$book])}}" method="post">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">Delete</button>
              </form>
            </span>
          </li>
          @empty
          <p>No Author!</p> -->
        <!-- <p class="list-group-item">No Author</p> -->
        <!-- @endforelse
        </ul> -->
      </div>

    </div>
  </div>
</div>
@endsection