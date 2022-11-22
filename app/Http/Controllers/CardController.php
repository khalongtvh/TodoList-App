<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CardController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
      Card::create([
        'title' => $request->title,
        'task_id' => $request->id_task,
        'dates' => $request->dates,
        'status' => 0,
        'background' => $request->background,
      ]);
      // return response()->json([
      //   'status' => 200,
      //   'message' => 'add successfully'
      // ]);
      return redirect()->back();
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
    $card->update([
      'title' => $request['title'],
    ]);
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
  }
}
