<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Lecture extends Model
{
    use HasFactory;

    protected $table = "lectures";
    
    protected $fillable = [
        'name',
        'url',
        'lecture_image',
    ];
    /**
     * 講義登録
     * 
     * @param  LectureRequest $request
     * @return void
     */
    public function lectureRegistration($request)
    {
        $this->create([
            'name' => $request->name,
            'url' => $request->url,
            'lecture_image' => basename($request->file('lecture_image')->store('lectures', 'public')),
        ]);
    }
    /**
     * 講義データ全部取得
     * 
     * @param void
     * @return DB
     */
    public function allget()
    {
        $lectures = $this->get();
        return $lectures;
    } 
    /**
     * 親：Lecture
     * 子：Field
     */
    public function lectureToFields()
    {
        return $this->hasMany(Field::class);
    }
}
