@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row flex-row flex-nowrap taskslist">
  </div>
  <!-- Modal -->
  <!-- add card -->
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
  <!-- add card -->

  <!-- edit card -->
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
  <!-- end edit card -->

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
            <div class="col-sm-11">
              <div class="form-group">
                <input type="text" name="title_card" id="title_card" class="form-control font-title font-20" style="border:none; padding-left: 0;">
                <input type="hidden" id="idCard_Hidden">
                <p>in list <a href="#" id="title-task-in-modal-detail"></a></p>
              </div>
            </div>
          </div>
          <!-- main -->
          <div class="row">
            <!-- left icon -->
            <div class="col-sm-1 " style="padding:6px 0px 0px 52px">
              <i class="fa fa-tasks" aria-hidden="true"></i>
            </div>
            <!-- end left icon -->

            <!-- description -->
            <div class="col-sm-8">
              <div class="form-group">
                <!-- <form action="{{route('tasks.store')}}" method="post"> -->
                <!-- @csrf -->
                <p type="text" class="form-control font-title font-16">Description</p>
                <!-- <input type="hidden" id="idCard_Hidden"> -->
                <!-- <input type="text" name="title_card" id="title_card" class="form-control" style="border:none; padding-left: 0;"> -->
                <textarea name="description_card" id="description_card" class="form-control" style="margin-bottom:10px" dir="auto" placeholder="Add a more detailed description…" data-autosize="true" style="width:100%; overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;"></textarea>
                <button class="btn btn-success" id="addDescription">Save</button>
                <!-- <button class=" btn btn-light">Cancel</button> -->
                <!-- </form> -->
              </div>
            </div>
            <!-- end description -->

            <!-- right menu -->
            <div class="col-sm-3">
              <div class="form-group">
                <p>Add to card</p>
                <input type="button" class="form-control btn btn-light" id="add-checklist-menu" style = "margin-bottom:10px"value="Checklist">
                <!-- <i class="fa fa-check-square-o" aria-hidden="true"></i>  -->

                <!-- </a> -->
                <input type="button" value="Dates" id="dateID" class="btn btn-light form-control">
                <input type="hidden" id="dates_hidden">
              </div>
            </div>

            <!-- end right menu -->
          </div>
          <div class="row">
            <!-- left icon -->
            <div class="col-sm-1 icon-checklist" style="padding:6px 0px 0px 52px">

            </div>
            <!-- end left icon -->

            <!-- description -->
            <div class="col-sm-8">
              <div class="form-group checklist-group">
              </div>
            </div>
            <div class="col-sm-3">

              <div class="form-group">
                <p>Action</p>
                <a href="#" class="button-link form-control btn btn-light" id="remove-card-menu"><i class="fa fa-archive" aria-hidden="true"></i> <span>Remove</span></a>
              </div>
              <!-- end description -->
            </div>

          </div>
          <!-- end main -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end detail card -->

<!-- modal check list -->
<div class="modal fade checklistModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Check List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="title_checklist" class="col-form-label">Title:</label>
          <input autofocus="true" class="form-control" name="title_checklist" id="title_checklist" placeholder="checklist">
        </div>
        <button type="button" class="btn btn-primary" id="add-checklist">Add</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal check list -->
@endsection

@section('scripts')
<!-- show detailed Card -->
<script>
  $(document).ready(function() {
    fetchTasks();
    var dateObject = $("#dateID").datepicker("getDate");
    var dateString = $.datepicker.formatDate("dd-mm-yy", dateObject);
    console.log(dateString);

    var date = $("#dateID").datepicker({
      onSelect: function(selected) {
        var selectedDate = $(this).datepicker('getDate');
        var dateString = $.datepicker.formatDate("dd-mm-yy", selectedDate);
        $("#dates_hidden").val(dateString);
        $("#dateID").val('Dates');
        console.log(dateString);
      }
    });
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    // add new card
    $(document).on('click', '.addCard', function() {
      // alert('Add');
      var idTask = $(this).val();
      var new_title = $('#title_' + idTask + '').val();
      data = {
          'title': new_title,
          'idTask': idTask
        },
        $.ajax({
          type: 'POST',
          data: data,
          dataType: "json",
          url: "/cards/",
          success: function(response) {
            console.log(response.card);
            fetchCard(response.card);
            $('#title_' + idTask + '').val('');
          }
        });
      // alert(new_title);
    })
    // fetch tasks
    function fetchTask(task) {
      $.each(task.cards, function(key, card) {
        fetchCard(card);
      });
    }

    function fetchTasks() {
      $.ajax({
        type: "GET",
        url: "/fetch-tasks",
        dataType: "json",
        success: function(response) {
          // console.log(response.data);
          var tasks = response.data;
          $.each(tasks, function(key, task) {
            const tasks = $('.taskslist');
            tasks.append('<div class="col-sm-4">\
                            <div class="card card-block">\
                              <div class="card-body" style="background-color: #EBECF0;">\
                                <h5>' + task.title + '\
                                <div class="dropdown float-right">\
                                  <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>\
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">\
                                    <button type="button" value="' + task._id + '" class="editBtn dropdown-item">Edit</button>\
                                    <form action="{{route("tasks.destroy", [' + task + '])}}" method="post">\
                                      @csrf\
                                      @method("DELETE")\
                                      <button class="dropdown-item">Delete</button>\
                                    </form>\
                                  </div>\
                                </div>\
                                </h5>\
                                <div class="list-group tasks_list" id="card_' + task._id + '">\
                                </div>\
                                <form action="javascript:void(0)">\
                                  @csrf\
                                  <div class="card-composer">\
                                    <div class="card-detail">\
                                      <input name="id_task" id="id_task" type="hidden" value="' + task._id + '">\
                                      <input type="text" name="title" id="title_' + task._id + '" class="list-card-composer-textarea js-card-title form-control title_card" rows="1" dir="auto" placeholder="Enter a title for this card…" data-autosize="true" style="width:100%; overflow: hidden; overflow-wrap: break-word; resize: none; height: 54px;"></input>\
                                    </div>\
                                    <div class="cc-controls">\
                                      <button type="submit" id="addCard_' + task._id + '" value="' + task._id + '" class="btn btn-primary addCard">Add Card</button>\
                                    </div>\
                                  </div>\
                                </form>\
                              </div>\
                            </div>\
                          </div>');
            fetchTask(task);
          });
          $('.taskslist').append('<button class="btn btn-outline-light addList" style="width: 40px;height: 40px; border-radius: 50px">+</button>');
        }
      })
    };
    // fetch card
    function fetchCard(card) {
      var cards = $('#card_' + card.task_id);
      console.log(card.title);
      cards.append('<input type="hidden" value="' + card._id + '" id="titleCard_' + card._id + '">\
                            <button class="btn btn-card text-left showCard showCard_' + card._id + '" id="' + card._id + '">\
                              <span id="title-card-' + card._id + '" class="titleCard_' + card._id + '">' + card.title + '</span>\
                                <p style="margin-bottom:0">\
                                  <lable id="dates_card" style="display:none" class="btn btn-danger"></lable>\
                                  <lable id="checklist_card" style="display:none"></lable>\
                                </p>\
                            </button>\
              ');
      if (card.dates != 0) {
        $('lable#dates_card').removeAttr('style');
        $('lable#dates_card').text(card.dates);
      }
      // if (card.dates != 0) {
      //   $('lable#dates_card').removeAttr('style');
      //   $('lable#dates_card').text(card.dates);
      // }
    }
    // fetch checklist
    function fetch_checklist(card_id) {
      // alert(task_id);
      $.ajax({
        type: "GET",
        url: "/checklist",
        dataType: "json",
        data: {
          'card_id': card_id
        },
        success: function(response) {
          // console.log(response.data);
          var group = $('div.checklist-group');
          group.html("");
          $('.icon-checklist').html("");
          if (response.data != '') {
            group.append('<p type="text" class="form-control font-title font-16">Checklist</p>');
            $('.icon-checklist').append('<i class="fa fa-check-square-o" aria-hidden="true"></i>');
            response.data.forEach(element => {
              console.log(element._id);
              // group.append('<p type="text" class="form-control" style="border:none; padding-left: 0;">' + element.title + '</p>');
              group.append('  <div class="form-row align-items-center">\
                                <div class="col-auto my-1">\
                                  <div class="form-check">\
                                    <input class="form-check-input status_checklist status_checklist_' + element._id + '" type="checkbox" id="' + element._id + '">\
                                  </div>\
                                </div>\
                                <div class="col-sm-10 my-1">\
                                  <div class="input-group">\
                                    <input type="text" class="form-control title_checklist_carModal title_checklist_' + element._id + '" value=' + element.title + ' id="' + element._id + '" placeholder="checklist">\
                                  </div>\
                                </div>\
                                <div class="col-auto my-1">\
                                  <button type="submit" id="' + element._id + '" class="btn btn-danger remove_checklist">X</button>\
                                </div>\
                              </div>');
              if (element.status == "true") {
                $('.status_checklist_' + element._id + '').attr('checked', 'checked');
                $('.title_checklist_' + element._id + '').attr('style', 'color:green; text-decoration: line-through; text-decoration-color: red');
              }
            });
          }
        }
      })
    }

    // update status checklist
    $(document).on('change', '.status_checklist', function() {
      var id = $(this).attr('id');
      // console.log(id);
      var status = $(this).is(':checked');
      data = {
          'id': id,
          'status': status
        },
        // console.log(data);
        $.ajax({
          type: 'PUT',
          data: data,
          dataType: "json",
          url: "/checklist/" + id,
          success: function(response) {
            console.log("update status checklist " + response.data.title + " " + response.data.status);
            fetch_checklist(response.data.card_id);
          }
        });
    });

    // update title checklist
    $(document).on('keypress', '.title_checklist_carModal', function(event) {
      if (event.key === "Enter") {
        data = {
          'id': $(this).attr('id'),
          'title': $(this).val()
        };
        $.ajax({
          type: 'PUT',
          data: data,
          dataType: "json",
          url: "/checklist/" + $(this).attr('id'),
          success: function(response) {
            console.log("update tilte checklist" + response.data.title);
            fetch_checklist(response.data.card_id);
          }
        });
      }
    })

    // remove checklist
    $(document).on('click', '.remove_checklist', function() {
      var id_checklist = $(this).attr('id');
      data = {
        'id': id_checklist,
      };
      $.ajax({
        type: 'DELETE',
        url: "checklist/" + id_checklist,
        success: function(response) {
          console.log(response.data);
          var id_card = response.data.card_id;
          fetch_checklist(id_card);
        },
      })
    });

    // add new checklist
    $(document).on('click', '#add-checklist', function() {
      var title = document.getElementById('title_checklist').value;
      var id_card = document.getElementById('idCard_Hidden').value;
      // alert(id_card);
      data = {
        'title': title,
        'id_card': id_card
      };
      $.ajax({
        type: 'POST',
        url: "/checklist/",
        dataType: 'json',
        data: data,
        success: function(response) {
          console.log(response.checklist);
          $('.checklistModal').modal('hide');
          fetch_checklist(id_card);
        },
      })
    });

    // show modal add checklist
    $(document).on('click', '#add-checklist-menu', function() {
      $('.checklistModal').modal('show');
      // $('.checklistModal').on('show.bs.modal', function() {
      //   $('#title_checklist').trigger('focus')
      // })
    });
    // remove card 
    $(document).on('click', '#remove-card-menu', function() {
      // alert('a');
      var id_card = document.getElementById('idCard_Hidden').value;
      $.ajax({
        type: 'DELETE',
        url: "cards/" + id_card,
        success: function(response) {
          // console.log(response.data.task_id);
          // console.log(response.task.title);
          $('#card_' + response.data.task_id).html('');
          fetchTask(response.task);
          $('.modal').modal('hide');
        },
      })

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
          $('#title-task-in-modal-detail').text(response.card.task.title);
          console.log($('#title-task-in-modal-detail').text());
        }
      })
    }
    // update title card in modal
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
            // console.log(response.card._id);
            input.blur();
            $('span#title-card-' + response.card._id).text(response.card.title);
          }
        });
      }
    });
    // show detailed card
    $(document).on('click', '.showCard', function() {
      var id = $(this).attr('id');
      title = document.getElementById('titleCard_' + id);
      $('#cardDetail').modal('show');
      var idCard_Hidden = document.getElementById("idCard_Hidden");
      idCard_Hidden.value = id;
      fecth_card(id);
      fetch_checklist(id);
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
          fecth_card(idCard_Hidden);
        }
      });
    });
  });
</script>
<!-- end show detailed Card -->
<!-- update title card modal -->
<script>

</script>
<!-- end update title card -->

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