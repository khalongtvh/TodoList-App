@extends('layouts.app')

@section('content')
<div class="col-md-8">
  <div class="card">
    <div class="card-header">{{ __('Update Author') }}</div>

    <div class="card-body">
      <form action="{{route('authors.update', [$author])}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{$author->name}}">
        </div>
        <button class="btn btn-primary">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection