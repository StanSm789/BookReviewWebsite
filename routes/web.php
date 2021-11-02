<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BookController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('book', BookController::class);

Route::resource('review', ReviewController::class);

Route::resource('like', LikeController::class);

Route::resource('image', ImageController::class);

Route::resource('user', UserController::class);

Route::resource('following', FollowingController::class);

/**
     *
     * Recommendation feature
     */
Route::get('recommended', function () {

    $sql = "select book_id, avg(rating) AS avg_marks, count(rating) as people from reviews GROUP BY book_id ORDER BY avg_marks DESC, book_id;";
    $reviews = DB::select($sql);

    $sqlCount = "select count(id) as c from users;";
    $total = DB::select($sqlCount);
    $count = (int) implode(" ",get_object_vars($total[0]));
    $result = array();

    foreach($reviews as $review) {
        if ($review->avg_marks >= 4 && (int) $review->people/$count >= 0.5) {
            $result[] = $review;
        }
    }
    $books = array();

    foreach($result as $item) {
        $books[] = DB::select("select * from books where id = ?", [$item->book_id]);
    }

    //dd($books);
    return view('recommended')->with('books', $books);
});

/**
     *
     * Documentation web page
     */
    Route::get('documentation', function () {
        return view('documentation');
    });

    /**
     *
     * Task two web page
     */
    Route::get('taskTwo', function () {
        return view('taskTwo');
    });

require __DIR__.'/auth.php';
