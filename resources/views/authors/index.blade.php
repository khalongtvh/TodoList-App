@extends('layouts.app')

@section('content')
<div class="col-md-8">
  <div class="card">
    <div class="card-header">{{ __('Authors') }}</div>
    <div class="card-body">
      <form action="{{route('authors.store')}}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      <!-- <a href="{{route('authors.create')}}" class="btn btn-primary">Create New Author</a> -->
      <div class="mt-3">
        <h3>List of authors</h3>
        <ul class="list-group">
          @forelse($authors as $author)
          <li class="list-group-item">
            {{$author->name}} 
            <span style="float:right">
              <a href="{{route('authors.edit', [$author])}}" class="btn btn-warning">Edit</a>
              <form action="{{route('authors.destroy', [$author])}}" method="post">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">Delete</button>
              </form>
            </span>
          </li>
          @empty
          <p>No Author!</p>
          <!-- <p class="list-group-item">No Author</p> -->
          @endforelse
        </ul>
      </div>

    </div>
  </div>
</div>
@endsection