<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email','password', 'first_name','last_name' 
    ];
    protected $collection = 'customers';
    protected $guarded = [];
}
