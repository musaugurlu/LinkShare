<?php

use Illuminate\Database\Seeder;

class ManyToManySeeder extends Seeder
{
    public function run()
    {
        $links = App\Link::all();

        App\LinkGroup::all()->each(function ($lg) use ($links) {
            // $lg->links()->attach(
            //     $links->random(rand(1,1))->pluck('id')->toArray()
            // );

            $lg->links()->attach(1);
        });
    }
}
