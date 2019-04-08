<?php

use Faker\Generator as Faker;
use App\BudgetLineItem;

$factory->define(BudgetLineItem::class, function (Faker $faker) {
    return [
    	'year' => '2019/2020',
    	'fund_id' => $faker->randomNumber,
    	'funding_source' => $faker->name,
    	'activity_category' => $faker->name,
    	'program_code' => 'Administration',
    	'object_code' => sprintf('%04d', rand(0, 9999)),
    	'salary_position' => $faker->name,
    	'fte' => $faker->randomNumber,
    	'amount' => $faker->randomFloat(2, 200, 10000),
    ];
});
