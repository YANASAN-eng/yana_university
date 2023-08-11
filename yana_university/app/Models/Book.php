<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function subject(){
        return $this->belongTo(Subject::model);
    }
    public function chapter(){
        return $this->hasMany(Chapter::model);
    }
}
