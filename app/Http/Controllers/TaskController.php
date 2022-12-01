<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Card;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $tasks = Task::all();
    return view('tasks.index', compact('tasks'));;
  }
  public function fetch_tasks()
  {
    $tasks = Task::with('cards')->get();
    return response()->json(['data' => $tasks]);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    // echo 'a';
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
    // dd($request->all());
    $request->validate([
      'title' => 'required'
    ]);
    Task::create([
      'title' => $request->title,
      'deadline' => $request->deadline,
      'description' => $request->description
    ]);

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Task  $task
   * @return \Illuminate\Http\Response
   */
  public function show(Task $task)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Task  $task
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
    $task = Task::find($id);
    return response()->json([
      'status' => '200',
      'task' => $task
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Task  $task
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    //
    // dd($request->all());
    $task = Task::find($request['idTask']);
    // dd($task);
    $task->update([
      'title' => $request['title'],
      'deadline' => $request['deadline'],
      'description' => $request['description'],
    ]);
    return redirect()->back()->with('status', 'Update Successful');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Task  $task
   * @return \Illuminate\Http\Response
   */
  public function destroy(Task $task)
  {
    //
    // dd($task->title);
    $task->delete();
    return response()->json([
      'status' => 'Create Account Success.',
    ]);
  }

  public function ajax_search(Request $request)
  {
    $output = '';
    if ($request->ajax()) {
      $cards = Card::where('title', 'LIKE', '%' . $request->search . '%')->get();
      if (count($cards) != 0) {
        foreach ($cards as $card) {
          $output .= '<div class = "list-group tasks_list showCard " id = "' . $card->id . '">      
                          <p class="btn btn-card text-left">
                            <span >' . $card->title . '</span>
                            <input type="hidden" value="' . $card->id . '"/>
                          </p>
                        </div> ';
        }
      } else {
        $output = ('Not Found!');
      }
    }
    return response()->json($output);
  }
}
