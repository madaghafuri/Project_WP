<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Detail extends Model
{
    use HasFactory;

    protected $fillable = [
      'cart_id',
      'game_id',
      'price',
    ];

    public function game(){
      return $this->belongsTo(Game::class);
    }

    public function cart(){
      return $this->belongsTo(Cart::class);
    }
}
