<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
  use HasFactory;
  protected $collection = 'tasks';
  // protected $fillable = [
  //   'title', 'deadline', 'description'
  // ];
  protected $guarded = [];
}
