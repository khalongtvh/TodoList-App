@extends('layouts.app')

@section('content')
<div class="col-md-8">
  <div class="card">
    <div class="card-header">{{ __('Menu') }}</div>
    <div class="card-body">
      <ul class="list-item">
        <li class="list-group-item">
          <a href="{{route('authors.index')}}">Authors</a>
        </li>
        <li class="list-group-item">
          <a href="{{route('books.index')}}">Books</a>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection