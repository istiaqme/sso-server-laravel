<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apps')->insert([
            'title' => 'Test App',
            'base_url' => 'Localhost',
            'api_key' => 'eyJpdiI6IjJGeTRGUUdLcFdwekl0Q042aGlYaUE9PSIsInZhbHVlIjoiNEtsUmVzMlNJcmZ3YWgxRjBqOWNnUT09IiwibWFjIjoiZmI1ZDllNGNlNjQyY2IzNzliZWI5N2RlNWRkMzI1ZTA3ZTgzMGExODBjMTRhYWMzOWRkMTliNmUyNjhiY2M3MyIsInRhZyI6IiJ9', // 'Hello'
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
