<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class checklist extends Model
{
  use HasFactory;
  protected $collection = 'checklists';
  protected $guarded = [];

  public function card()
  {
    return $this->belongsTo(Card::class, 'card_id');
  }
}
