<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
  
  public function order(){
    return $this->belongsTo(Order::class);
  }

  public function game(){
    return $this->belongsTo(Game::class);
  }

  protected $fillable = [
    'order_id',
    'game_id',
    'price',
  ];
}
