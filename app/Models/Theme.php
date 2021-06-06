<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable=['nombre', 'category_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
