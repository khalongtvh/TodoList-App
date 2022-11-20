<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
  use HasFactory;
  protected $collection = 'tasks';
  protected $guarded = [];

  public function cards()
  {
    return $this->hasMany(Card::class);
  }
}
