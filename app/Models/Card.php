<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
  use HasFactory;
  protected $collection = 'cards';
  protected $guarded = [];

  public function task()
  {
    return $this->belongsTo(Task::class);
  }
}
