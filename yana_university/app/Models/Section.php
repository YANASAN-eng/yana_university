<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'chapter_id',
        'name',
        'url'
    ];

/**
 * 節登録
 * 
 * @param SectionRequest $request
 * @return void
 */
    public function sectionRegistration($request)
    {
        $this->create([
            'chapter_id' => $request->chapter_id,
            'name' => $request->name,
            'url' => $request->url
        ]);
    }
}
