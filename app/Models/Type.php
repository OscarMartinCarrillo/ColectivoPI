<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Type extends Model
{
    use HasFactory;

    protected $fillable=['nombre', 'descripcion'];

     public function games(){
         return $this->hasMany(Game::class);
     }
}
