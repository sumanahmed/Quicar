<?php

use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        DB::table('car_types')->truncate();
        DB::statement("SET foreign_key_checks=1");

        $data = Faker\Factory::create();

        DB::table('car_types')->insert([
            'name' => 'Private Car',
            'bn_name' => 'প্রাইভেট কার',
            'created_at' => $data->dateTime($max = 'now'),
            'updated_at' => $data->dateTime($max = 'now'),
        ]);

        DB::table('car_types')->insert([
            'name' => 'Micro Bus',
            'bn_name' => 'মাইক্রো বাস',
            'created_at' => $data->dateTime($max = 'now'),
            'updated_at' => $data->dateTime($max = 'now'),
        ]);

        DB::table('car_types')->insert([
            'name' => 'Ambulance',
            'bn_name' => 'অ্যাম্বুলেন্স',
            'created_at' => $data->dateTime($max = 'now'),
            'updated_at' => $data->dateTime($max = 'now'),
        ]);

        DB::table('car_types')->insert([
            'name' => 'Coaster',
            'bn_name' => 'Coaster',
            'created_at' => $data->dateTime($max = 'now'),
            'updated_at' => $data->dateTime($max = 'now'),
        ]);
    }
}
