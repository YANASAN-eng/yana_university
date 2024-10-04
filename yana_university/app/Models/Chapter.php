<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'field_id',
        'name',
        'url'
    ];

    /**
     * 章登録
     * 
     * @param ChapterRequest $request
     * @return void
     */
    public function chapterRegistration($request)
    {
        $this->create([
            'field_id' => $request->field_id,
            'name' => $request->name,
            'url' => $request->url,
        ]);
    }
    /**
     * 親：Field
     * 子：Chapter
     */
    public function chapterToField()
    {
        return $this->belongsTo(Field::class);
    }
}
