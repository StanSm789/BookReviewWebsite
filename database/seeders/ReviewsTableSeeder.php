<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Australia/Brisbane');

        DB::table('reviews')->insert([
            'rating' => 5,
            'review' => 'Great book!!!',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 1,
            'user_id'=> 3
            ]);
        
        DB::table('reviews')->insert([
            'rating' => 4,
            'review' => 'Such a good book but a bit pessimistic!!!',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 1,
            'user_id'=> 4
            ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'review' => 'Nice than the previous ones',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 1,
            'user_id'=> 5
            ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'review' => 'Not too bad',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 1,
            'user_id'=> 6
            ]);
        DB::table('reviews')->insert([
            'rating' => 2,
            'review' => 'Did not like it',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 2,
            'user_id'=> 3,
            ]);
        
        DB::table('reviews')->insert([
            'rating' => 3,
            'review' => 'Average book',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 2,
            'user_id'=> 4
            ]);
        DB::table('reviews')->insert([
            'rating' => 1,
            'review' => 'very bad book',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 2,
            'user_id'=> 5
            ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'review' => 'Not too bad',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 2,
            'user_id'=> 6
            ]);

        DB::table('reviews')->insert([
            'rating' => 3,
            'review' => 'Average book',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 3,
            'user_id'=> 3
            ]);
        DB::table('reviews')->insert([
            'rating' => 1,
            'review' => 'No, do not buy',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 3,
            'user_id'=> 4
            ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'review' => 'Not too bad',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 3,
            'user_id'=> 5
            ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'review' => 'Not too bad',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 3,
            'user_id'=> 6
            ]);
        DB::table('reviews')->insert([
            'rating' => 4,
            'review' => 'maybe, you can buy it',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 1,
            'user_id'=> 1
            ]);
        DB::table('reviews')->insert([
            'rating' => 5,
            'review' => 'Just a comment',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 1,
            'user_id'=> 2
            ]);
        DB::table('reviews')->insert([
            'rating' => 2,
            'review' => 'Some random comment',
            'date' => Carbon::now()->subDays(rand(0, 7))->format('F j, Y, g:i a'),
            'book_id' => 1,
            'user_id'=> 7
            ]);
    }
}
