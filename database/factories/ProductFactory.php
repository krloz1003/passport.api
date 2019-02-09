<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	return [
		'name' => $faker->sentence(2),
		'description' => $faker->paragraph(5),
		'price' => $faker->numberBetween(10, 200),
		'picture' => \Faker\Provider\Image::image(storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'products', 200, 200,'city', false),
	];
});
