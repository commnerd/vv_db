<?php

use App\Scaffolding\Instantiation;
use Faker\Generator as Faker;
use App\Title1Narrative;

$factory->define(Title1Narrative::class, function (Faker $faker) {
    return [
        'application' => Instantiation::inRandomOrder()->where('entity_id', 1)->firstOrFail(),
    ];
});
