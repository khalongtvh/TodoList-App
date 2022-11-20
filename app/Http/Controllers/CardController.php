<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

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
    //
    // dd($request->all());
    Card::create([
      'title' => $request->title,
      'task_id' => $request->id_task,
      'dates' => $request->dates,
      'status' => 0,
      'background' => $request->background,
    ]);

    return redirect()->back();
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
  public function update(Request $request, Card $card)
  {
    //
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
