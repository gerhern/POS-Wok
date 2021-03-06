<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{User, TimeRecord, Supplier, Appointment, Item, Order, OrderItem};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Jerry',
            'password' => bcrypt('12345678'),
            'privileges' => 'Admn',
            'salary' => '27.92',
            'status' => 'Activo'
        ]);

        User::create([
            'name' => 'Jeremias',
            'password' => bcrypt('00000000'),
            'privileges' => 'User',
            'salary' => '27.92',
            'status' => 'Activo'
        ]);

        User::factory(30)->create();
        TimeRecord::factory(30)->create();
        Supplier::factory(5)->create();
        Appointment::factory(5)->create();
        Item::factory(50)->create();
        Order::factory(5)->create();
        OrderItem::factory(5)->create();
    }
}
