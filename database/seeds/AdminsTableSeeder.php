<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::insert([
            [
                'name' => 'Super Administrator',
                'no_tlp'=> '08777777777',
                'email' => 'admin@app.com',
                'password' => Hash::make('adminadmin'),
                'super' => 1,
                'suspend' => 0,
            ],
        ]);

        \App\Barang::insert([
            [
                'name' => 'Router',
                'type' => 'barang',
                'pict' => 'router.png',
                'description' => 'ini router',
                'stock' => 100,
            ],
            [
                'name' => 'Switch',
                'type' => 'barang',
                'pict' => 'switch.png',
                'description' => 'ini switch',
                'stock' => 100,
            ],
        ]);
    }
}
