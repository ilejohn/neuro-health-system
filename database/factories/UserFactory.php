<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use BrainApp\User;
use BrainApp\Patient;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'phoneNumber' => $faker->e164PhoneNumber
    ];
});

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'user_id' => function(){
          return factory('BrainApp\User')->create()->id;
        },
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'age' => $faker->numberBetween(0,100),
        'sex' => $faker->randomElement(['male','female']),
        'phoneNumber' => $faker->e164PhoneNumber,
        'mul-preg' => $faker->randomElement(['yes','no']),
        'ill-preg' => $faker->randomElement(['yes','no']),
        'typ-ill' => $faker->text(50),
        'med-preg' => $faker->randomElement(['yes','no']),
        'typ-med' => $faker->text(50),
        'herb-mix' => $faker->randomElement(['yes','no']),
        'typ-herb' => $faker->text(50),
        'exp-rad' => $faker->randomElement(['yes','no']),
        'bleed' => $faker->randomElement(['yes','no']),
        'loss-wat' => $faker->randomElement(['yes','no']),
        'anything' => $faker->randomElement(['yes','no']),
        'any-describe' => $faker->text(50),
        'urinary' => $faker->randomElement(['yes','no']),
        'admit' => $faker->randomElement(['yes','no']),
        'neu-deform' => $faker->randomElement(['yes','no']),
        'dis-fam' => $faker->text(50),
        'side-deform' => $faker->randomElement(['fore-brain','middle-brain','hind-brain']),
        'age-ill' => $faker->numberBetween(0,150),
        'med-apply' => $faker->randomElement(['yes','no']),
        'treat-meth' => $faker->text(50),
        'pat-think' => $faker->randomElement(['yes','no']),
        'response' => $faker->randomElement(['With Support','Without Support']),
        'reaction' => $faker->text(50),
        'trauma' => $faker->randomElement(['yes','no']),
        'assoc-deform' => $faker->randomElement(['yes','no']),
        'deform-describe' => $faker->text(50),
        'cli-exam' => $faker->text(100)
    ];
});