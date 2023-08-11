<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'subject_name' => '数学',
            'subject_url' => '/math',
        ]);
        Subject::create([
            'subject_name' => '物理学',
            'subject_url' => '/physics',
        ]);
        Subject::create([
            'subject_name' => 'プログラミング',
            'subject_url' => '/programming',
        ]);
        Subject::create([
            'subject_name' => 'イラスト創作',
            'subject_url' => '/math',
        ]);
    }
}
