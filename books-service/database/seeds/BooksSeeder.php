<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'isbn' => '9780333383841',
            'name' => 'A Tale of Two Cities',
            'language' => 'English',
            'genre' => 'Historical fiction',
            'authors' => 'Charles Dickens',
            'availability' => true,
            'published_on' => 1859,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'isbn' => '9780460874519',
            'name' => 'The Little Prince',
            'language' => 'French',
            'genre' => 'Novella',
            'authors' => 'Antoine de Saint-Exupéry',
            'availability' => true,
            'published_on' => 1943,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'isbn' => '9781593083328',
            'name' => 'Harry Potter and the Philosopher\'s Stone',
            'language' => 'English',
            'genre' => 'Fantasy',
            'authors' => 'J. K. Rowling',
            'availability' => true,
            'published_on' => 1997,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('books')->insert([
            'isbn' => '9781595404190',
            'name' => 'And Then There Were None',
            'language' => 'English',
            'genre' => 'Mystery',
            'authors' => 'Agatha Christie',
            'availability' => true,
            'published_on' => 1939,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
