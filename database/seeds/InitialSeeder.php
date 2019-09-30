<?php

use Illuminate\Database\Seeder;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!isset(App\User::where('email','mu@sa.com')->get()[0]->email)) {
            \App\User::create([
                'name' => 'Musa',
                'email' => 'mu@sa.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
        
        factory(App\User::class, 5)->create();
        factory(App\Share::class, 3)->create();
        factory(App\LinkGroup::class, 10)->create();
        factory(App\Link::class, 20)->create();
    }
}
