<?php

use Illuminate\Database\Seeder;

class InitUserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bs_user')->insert(['username'=> 'menglong']);
        DB::table('bs_user')->insert(['username'=> 'bufang']);
        DB::table('bs_user')->insert(['username'=> 'libai']);
    }
}
