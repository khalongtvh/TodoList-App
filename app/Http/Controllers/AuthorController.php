<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
    $authors = Author::all();
    return view('authors.index', compact('authors'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
    return view('authors.create');
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
    // echo $request['name'];
    // dd($request->all()); 
    $request->validate([
      'name' => 'required'
    ]);
    Author::create($request->only('name'));
    return redirect()->route('authors.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Author  $author
   * @return \Illuminate\Http\Response
   */
  public function show(Author $author)
  {
    //

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Author  $author
   * @return \Illuminate\Http\Response
   */
  public function edit(Author $author)
  {
    return view('authors.edit', compact('author'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Author  $author
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Author $author)
  {
    //
    $author->update($request->only('name'));
    return redirect()->route('authors.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Author  $author
   * @return \Illuminate\Http\Response
   */
  public function destroy(Author $author)
  {
    //
    $author->delete();
    return redirect()->back();
  }
}
