<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Optional;


class OptionalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $optionals = [
            'Sedili riscaldati',
            'ADAS',
            'Volante riscaldato',
            'Ruota di scorta',
            'Fari led Matrix'
        ];

        foreach($optionals as $optional){
            $new_optional = new Optional();
            $new_optional->name = $optional;
            $new_optional->slug = Str::slug($optional);
            $new_optional->save();
        }
    }
}
