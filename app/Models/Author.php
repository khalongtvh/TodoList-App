<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
  use HasFactory;
  protected $collection = 'authors';
  protected $fillable  = [
    'name'
  ];
  public function books()
  {
    return $this->hasMany(Book::class);
  }
}
