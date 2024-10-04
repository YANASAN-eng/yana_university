<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable =[
        'lecture_id',
        'name',
        'url',
    ];
    /**
     * 登録処理
     * 
     * @param　Request $request
     * @return void
     */
    public function fieldRegistration($request)
    {
        $this->create([
            'lecture_id' => $request->lecture_id,
            'name' => $request->name,
            'url' => $request->url
        ]);
    }
    /**
     * 親：Lecture
     * 子：Field
     */
    public function fieldToLecture()
    {
        return $this->belongsTo(Lecture::class);
    }
    /**
     * 親：Field
     * 子：Chapter
     */
    public function fieldToChapter()
    {
        return $this->hasMany(Chapter::class);
    }
}
