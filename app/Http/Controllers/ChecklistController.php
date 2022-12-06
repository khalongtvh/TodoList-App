<?php

namespace App\Http\Controllers;

use App\Models\checklist;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    //
    // dd($request->all());
    $checklist = checklist::where('card_id', $request['card_id'])->get();
    return response()->json([
      'status' => 'success',
      'data' => $checklist,
      'countChecklist' => count($checklist),
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
    //
    // dd($request->all());
    $checklist = Checklist::create([
      'title' => $request['title'],
      'card_id' => $request['id_card'],
      'status' => 'fasle',
    ]);
    return response()->json($checklist);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\checklist  $checklist
   * @return \Illuminate\Http\Response
   */
  public function show(checklist $checklist)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\checklist  $checklist
   * @return \Illuminate\Http\Response
   */
  public function edit(checklist $checklist)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\checklist  $checklist
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, checklist $checklist)
  {
    //
    // dd($request['status']);
    if ($request['status'] != null) {
      $checklist->update([
        'status' => $request['status'],
      ]);
    }
    if ($request['title'] != null) {
      $checklist->update([
        'title' => $request['title'],
      ]);
    }
    return response()->json([
      'data' => $checklist
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\checklist  $checklist
   * @return \Illuminate\Http\Response
   */
  public function destroy(checklist $checklist)
  {
    //
    // dd($checklist->title);
    $checklist->delete();
    return Response()->json([
      'status' => 'success',
      'data' => $checklist
    ]);
  }
}
