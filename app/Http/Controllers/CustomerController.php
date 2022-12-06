<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('user.login');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('user.register');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|email|unique:customers|max:255',
      'password' => 'required|same:confirm_pass|max:255',
      'confirm_pass' => 'required|max:255'
    ]);

    Customer::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'password' => $request->password,
    ]);
    session()->flash('success', 'Create Account Success');
    return redirect()->back();
    // echo 'sdsdsd';
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function show(Customer $customer)
  {
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function edit(Customer $customer)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Customer $customer)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Customer $customer)
  {
    //
  }

  public function register()
  {
    return view('user.register');
  }

  public function login(Request $request)
  {

    $this->validate($request, [
      'email' => 'required|email|max:255',
      'password' => 'required|max:255',
    ]);
    $email = Customer::where('email', $request->email)->first();
    $password = Customer::where('password', $request->password)->first();
    if ($email == null || $password == null) {
      session()->flash('danger', 'Incorrect account or password.');
      return redirect()->back();
    } else {
      return view('tasks.index');
    }
  }

  public function logout()
  {
    Session::put('user', null);
    return redirect()->route('home');
  }
}
