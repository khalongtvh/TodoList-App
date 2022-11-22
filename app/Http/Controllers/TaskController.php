<?php

namespace App\Http\Controllers;

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
    //
    // $tasks = Task::all();
    $tasks = Task::with('cards')->get();
    return view('tasks.index', compact('tasks'));
  }
  public function fetch_task()
  {
    $tasks = Task::with('cards')->get();
    return response()->json(['tasks' => $tasks]);
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
    dd($request->all());
    // $task = Task::find($request['idTask']);
    // // dd($task);
    // $task->update([
    //   'title' => $request['title'],
    //   'deadline' => $request['deadline'],
    //   'description' => $request['description'],
    // ]);
    // return redirect()->back()->with('status', 'Update Successful');
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
    // dd($task);
    $task->delete();
    return redirect()->back()->with('status', 'Delete Successful');
  }
}
