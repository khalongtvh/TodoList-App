@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row flex-row flex-nowrap">
    @forelse($tasks as $task)
    <div class="col-sm-4">
      <div class="card card-block">
        <h5 class="card-body" style="background-color: #EBECF0;">
          <span>{{$task->title}}({{count($task->cards)}})</span>
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
        <div class="card-body" id="{{$task->id}}" style="background-color: #EBECF0;">
          <div class="list-group" id="card_{{$task->id}}">
            @forelse($task->cards as $key => $card)
            <input type="hidden" value="{{$card->title}}" id="titleCard_{{$card->id}}">
            <button class="btn btn-card text-left showCard" id="{{$card->id}}">
              <span class="titleCard_{{$card->id}}">{{$card->title}}</span>
              @if($card->dates != null)
              <p>{{$card->dates}}</p>
              @endif
            </button>
            @empty
            @endforelse
          </div>
          <!-- <form action="javascript:void(0)"> -->
          <form action="{{url('cards')}}" method="post">
            @csrf
            <div class="card-composer">
              <div class="card-detail">
                <input name="id_task" id="id_task" type="hidden" value="{{$task->id}}">
                <textarea name="title" id="title_{{$task->id}}" class="list-card-composer-textarea js-card-title" dir="auto" placeholder="Enter a title for this card…" data-autosize="true" style="width:100%; overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;"></textarea>
              </div>
              <div class="cc-controls">
                <button type="submit" id="addCard_{{$task->id}}" value="{{$task->id}}" class="btn btn-primary">Add Card</button>
              </div>
            </div>
          </form>
          <!-- <button class="addCard" value="{{$task->id}}" id="addCard_{{$task->id}}">Add a card</button> -->
        </div>
      </div>
    </div>
    @empty
    @endforelse
    <button class="btn btn-primary addList" style="width: 60px;height: 60px;">+</button>
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
  <!-- detail card -->
  <div class="modal fade" id="cardDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body cardDetail">
          <!-- title card -->
          <div class="row">
            <div class="col-sm-1 " style="padding:6px 0px 0px 52px">
              <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <div class="col-6 col-sm-11">
              <div class="form-group">
                <!-- <form action="{{route('tasks.store')}}" method="post"> -->
                <!-- @csrf -->
                <input type="text" name="title_card" id="title_card" class="form-control" style="border:none; padding-left: 0;">
                <input type="hidden" id="idCard_Hidden">
                <p>in list <a href="#">To Do</a></p>
                <!-- </form> -->
              </div>
            </div>
          </div>
          <!-- description -->
          <div class="row">
            <div class="col-sm-1 " style="padding:6px 0px 0px 52px">
              <i class="fa fa-tasks" aria-hidden="true"></i>
            </div>
            <div class="col-6 col-sm-11">
              <div class="form-group">
                <!-- <form action="{{route('tasks.store')}}" method="post"> -->
                <!-- @csrf -->
                <p type="text" class="form-control" style="border:none; padding-left: 0;">Description</p>
                <!-- <input type="hidden" id="idCard_Hidden"> -->
                <!-- <input type="text" name="title_card" id="title_card" class="form-control" style="border:none; padding-left: 0;"> -->
                <textarea name="description_card" id="description_card" class="" dir="auto" placeholder="Add a more detailed description…" data-autosize="true" style="width:100%; overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;"></textarea>
                <button class="btn btn-success" id="addDescription">Save</button>
                <!-- <button class=" btn btn-light">Cancel</button> -->
                <!-- </form> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end detail card -->
  @endsection

  @section('scripts')
  <!-- show detailed Card -->
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // fetch card data
      function fecth_card(task_id) {
        // alert(task_id);
        $.ajax({
          type: "GET",
          url: "/cards",
          dataType: "json",
          data: {
            'task_id': task_id
          },
          success: function(response) {
            console.log(response.card);
            $('#title_card').val(response.card.title);
            $('#description_card').val(response.card.description);
          }
        })
      }

      // show detailed card
      $(document).on('click', '.showCard', function() {
        var id = $(this).attr('id');
        title = document.getElementById('titleCard_' + id);
        $('#cardDetail').modal('show');
        var idCard_Hidden = document.getElementById("idCard_Hidden");
        idCard_Hidden.value = id;
        fecth_card(id);
      });

      // update description card
      $(document).on('click', '#addDescription', function() {
        var idCard_Hidden = $('#idCard_Hidden').val();
        var data = {
          'description': document.getElementById('description_card').value,
          'id_card': idCard_Hidden
        };

        $.ajax({
          type: 'PUT',
          data: data,
          dataType: "json",
          url: "/cards/" + idCard_Hidden,
          success: function(response) {
            fecth_card();
          }
        });
      });
    });
  </script>
  <!-- end show detailed Card -->
  <!-- update title card -->
  <script>
    const input = document.getElementById('title_card');
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        const idCard_Hidden = $('#idCard_Hidden').val();
        const data = {
          'title': input.value,
          'id_card': idCard_Hidden
        };
        event.preventDefault();
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          type: 'PUT',
          data: data,
          dataType: "json",
          url: "/cards/" + idCard_Hidden,
          success: function(response) {
            console.log(response);
            input.blur();
            // alert($(('.titleCard_' + data.id_card)).val());
            // document.getElementsByClassName(('titleCard_' + data.id_card).value = response.card.title);
          }
        });
      }
    });
  </script>
  <!-- end update title card -->

  <script>
    $(document).ready(function() {
      // fetchTask();

      function fetchTask() {
        $.ajax({
          type: "GET",
          url: "/fetch-task",
          dataType: "json",
          success: function(response) {
            // console.log(response.tasks[0].cards);
            $.each(response.tasks, function(key, item) {

            });
          }
        })
      }

      $(document).on('click', '.submitCard', function() {
        var id = $(this).attr('id');
        var task_Id = $(this).val();
        var title = document.getElementById('title_' + task_Id).value;
        var data = {
          'title': title,
          'id_task': task_Id
        };
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: 'cards', // cards.store
          type: 'POST',
          data: data,
          dataType: "json",
          success: function(response) {
            console.log(response);
            document.getElementById('title_' + task_Id).value = '';
            // fetchTask();
          }
        });
      });
    })
  </script>
  <script>
    $(document).on('click', '.addList', function() {
      var id = $(this).val();
      $('#addModal').modal('show');
    });
  </script>
  <!-- edit modal -->
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
          $('#``').val(response.task.description);
          $('#deadline').val(response.task.deadline);
        }
      });
    });
  </script>
  <!--end edit modal -->
  <!-- close modal -->
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