<?php

namespace Database\Factories;

use App\Models\survey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class surveyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Region' => Str::random(10),
            'Zone' => Str::random(5),
            'Ward_Type' => Str::random(10),
            'Street_Name' => Str::random(10),
            'Building_Name' => $this->faker->phoneNumber,
            'Flat_No'  =>  $faker->randomDigit,
            'Floor_No'  =>    $faker->randomDigit,
            'Mobile_No' => $this->faker->phoneNumber,
            'PinCode2' => $faker->postcode,
            'Email_Id' => $this->faker->unique()->safeEmail,
            'Town' => $faker->city,
            'Country' => $faker->country,
        ];
    }
}
