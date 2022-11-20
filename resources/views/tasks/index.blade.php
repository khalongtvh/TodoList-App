@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row flex-row flex-nowrap">
    @forelse($tasks as $task)
    <div class="col-sm-4">
      <div class="card card-block">
        <h5 class="card-header">
          <span>{{$task->title}}(9)</span>
          <div class="dropdown float-right">
            <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <button type="button" value="{{$task->id}}" class="editBtn dropdown-item">Edit</button>
              <!-- <a class="dropdown-item" href="#">Edit</a> -->
              <form action="{{route('tasks.destroy', [$task])}}" method="post">
                @csrf
                @method("DELETE")
                <button class="dropdown-item">Delete</button>
              </form>
            </div>
          </div>
        </h5>
        <div class="card-body" id="{{$task->id}}">
          <form action="{{route('cards.store')}}" method="post">
            @csrf
            <div class="card-composer">
              <div class="card-detail">
                <input name="id_task" type="hidden" value="{{$task->id}}">
                <textarea name="title" class="list-card-composer-textarea js-card-title" dir="auto" placeholder="Enter a title for this card…" data-autosize="true" style="width:100%; overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;"></textarea>
              </div>
              <div class="cc-controls">
                <button type="submit" class="btn btn-primary">Add Card</button>
              </div>
            </div>
          </form>
          <!-- <button class="addCard" value="{{$task->id}}" id="addCard_{{$task->id}}">Add a card</button> -->
        </div>
      </div>
    </div>
    @empty
    @endforelse
    <button class="btn btn-primary addBtn" style="width: 60px;height: 60px;">+</button>
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
  $(document).on('click', '.addCard', function() {

  });
</script>
<script>
  $(document).on('click', '.addBtn', function() {
    var id = $(this).val();
    // alert(id);
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