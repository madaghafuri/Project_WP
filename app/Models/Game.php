<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'description',
    'category',
    'developer',
    'publisher',
    'price',
    'coverLink',
    'trailerLink'
  ];

  public function order_detail(){
    return $this->hasMany(Order_Detail::class);
  }
}
