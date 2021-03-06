<?php

use Illuminate\Database\Seeder;

class ThingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Thing::class, 50)->create()->each(function($u) {
            $u->players()->save(App\Player::inRandomOrder()->first());
        });
    }
}
