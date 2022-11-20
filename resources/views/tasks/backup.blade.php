<div class="card">
  <div class="card-body">
    <div class="mt-3">
      <h3>List of books</h3>
      <table class="table">
        <thead>
          <td>Tile</td>
          <td colspan="2">Action</td>
        </thead>
        <tbody>
          @forelse($tasks as $task)
          <tr>
            <td>{{$task->title}}</td>
            <td><button type="button" value="{{$task->id}}" class="btn btn-warning editBtn">Edit</button></td>
            <td>
              <form action="{{route('tasks.destroy', [$task])}}" method="post">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5">No Book Add Yet!</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>