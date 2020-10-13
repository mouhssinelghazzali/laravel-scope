<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */



use App\Models\Book;
use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'author_id' => factory(Author::class),
    ];
});