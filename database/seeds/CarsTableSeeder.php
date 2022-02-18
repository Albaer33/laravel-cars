<?php

use Illuminate\Database\Seeder;
use App\Car;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = config('cars');

        foreach ($cars as $car) {
            $new_car = new Car();
            $new_car->fill($car);
            $new_car->save();
        }
    }
}
