<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {

	return [
		'name' => $faker->name,
		'prov_id' => mt_rand(1,13),
		'telephone' => '123-456-7890',
		'postal'=>'M1M 2G4',
		'salary'=>mt_rand(10000,50000),
	];
});