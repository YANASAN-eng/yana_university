<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public function book(){
        return $this->belongTo(Book::class);
    }
    public function section(){
        return $this->hasMany(Section::class);
    }
}
