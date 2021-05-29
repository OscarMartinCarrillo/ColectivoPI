<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Game extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'minduracion', 'maxduracion', 'dificultad', 'edad', 'minjugadores', 'maxjugadores', 'foto'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
