@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <button class="btn btn-primary addBtn">Add New Task</button>
      <!-- <a href="{{route('tasks.create')}}" class="btn btn-primary">Add New Task</a> -->
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
            <!-- <tr>
              <td colspan="5">No Book Add Yet!</td>
            </tr> -->
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
          <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('tasks.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="title" class="col-form-label">Title:</label>
              <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Description:</label>
              <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
              <label for="deadline" class="col-form-label">Deadline:</label>
              <input type="date" name="deadline" value="2022-11-19" min="2018-01-01" max="2040-12-31">
              <!-- <textarea class="form-control" id="message-text"></textarea> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
          <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('update-task')}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="idTask" class="form-control" id="idTask">

            <div class="form-group">
              <label for="title" class="col-form-label">Title:</label>
              <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Description:</label>
              <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
              <label for="deadline" class="col-form-label">Deadline:</label>
              <input type="date" id="deadline" name="deadline" value="2022-11-19" min="2018-01-01" max="2040-12-31">
              <!-- <textarea class="form-control" id="message-text"></textarea> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).on('click', '.addBtn', function() {
    var id = $(this).val();
    // alert(id);
    $('#addModal').modal('show');
  });
</script>
<script>
  $(document).on('click', '.editBtn', function() {
    var idTask = $(this).val();
    // alert(idTask);
    $('#editModal').modal('show');
    $.ajax({
      type: 'GET',
      url: "/edit-task/" + idTask,
      success: function(response) {
        console.log(response.task.title);
        $('#idTask').val(idTask);
        $('#title').val(response.task.title);
        $('#description').val(response.task.description);
        $('#deadline').val(response.task.deadline);
      }
    });
  });
</script>
<script>
  $(document).on('click', '.closeModal', function() {
    var id = $(this).val();
    // alert(id);
    // $('#addModal').modal('hide');
    $('.modal').modal('hide')
  });
</script>
@endsection
<!-- <div class="card-header">{{ __('Books') }}</div> -->