<?php

namespace App\Http\Controllers;

use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\Task;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // dd($request->all());
    // return CardResource::collection($request->all());
    $card = Card::with('task')->find($request['task_id']);
    // return CardResource::collection($card);
    return Response()->json([
      'status' => 200,
      'message' => 'add successfully',
      'card' => $card
    ]);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {

    // echo $request->id_task;
    $validator = Validator::make($request->all(), [
      'title' => 'required'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 400,
        'message' => 'add failed'
      ]);
    } else {
      $card = new Card();
      $card->title = $request->title;
      $card->task_id = $request->idTask;
      $card->dates = 0;
      $card->status = 0;
      $card->background = $request->background;
      $card->description = "";
      $card->save();
      return response()->json([
        'status' => 200,
        'message' => 'add successfully',
        'card' => $card
      ]);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Card  $card
   * @return \Illuminate\Http\Response
   */
  public function show(Card $card)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Card  $card
   * @return \Illuminate\Http\Response
   */
  public function edit(Card $card)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Card  $card
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {
    //
    // dd($request->all());
    $card = Card::find($request['id_card']);
    if ($request['title'] != null) {
      $card->update([
        'title' => $request['title'],
      ]);
    }
    if ($request['description'] != null) {
      $card->update([
        'description' => $request['description'],
      ]);
    }
    return response()->json([
      'status' => '200',
      'card' => $card
    ]);
    // return redirect()->back()->with('status', 'Update Successful');
    // dd($card->title);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Card  $card
   * @return \Illuminate\Http\Response
   */
  public function destroy(Card $card)
  {
    //
    // dd($card->task_id);
    $card->delete();
    $task = Task::with('cards')->where('_id', $card->task_id)->first();
    return response()->json([
      'data' => $card,
      'task' => $task
    ]);
  }
}
