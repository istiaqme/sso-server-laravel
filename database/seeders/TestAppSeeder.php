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
            'token' => 'TestAppToken',
            'title' => 'Test App',
            'base_url' => 'Localhost',
            'api_key' => 'eyJpdiI6ImxVMjQ3cEdtejBYWFpxYlVoaVRjUFE9PSIsInZhbHVlIjoicW5JMEhKei9uSzV4UXNjSlRtQ2pHZz09IiwibWFjIjoiYTBkMjhlOGYxY2EwNTBhMDhkMjI3NDlhMTE2NmVlNGJkYzRlZDgzNDdlNWE0N2Q2ZmQxZGExMmQyMDdjZGNiNCIsInRhZyI6IiJ9', // 'Hello'
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
