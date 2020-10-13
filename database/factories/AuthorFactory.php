<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */



use App\Models\Book;
use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date' => now()->subYears(10),
    ];
});