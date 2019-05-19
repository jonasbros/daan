<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $c = 0;
        while($c <= 10) {
            DB::table('routes')->insert([
                'name' => Str::random(10),
                'path' => Str::random(10),
                'searches' => 0,
            ]);

            $c++;
        }   
        
    }
}
