<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubgruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $path = 'SQL/sub_grupos.sql';
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::unprepared(file_get_contents($path));
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->command->info('Ciudades table seeded!');
    }
}
