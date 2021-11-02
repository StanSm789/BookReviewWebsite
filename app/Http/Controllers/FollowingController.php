<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Book;
use App\Models\Like;
use App\Models\Image;
use App\Models\Following;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Redirect;
use Session;

class FollowingController extends Controller
{

    /**
     * Middleware to see if the user is logged in or not to grant access to UserController CRUD
     */
    public function __construct() {
        $this->middleware('auth');
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userIdent = Auth::id();
        $sql = "select * from users where id in (select followed_id from followings where user_id = ?);";
        $users = DB::select($sql, array($userIdent));

        $reviews = array();
        foreach ($users as $user) {
            $sqlReviews = "select r.user_id, r.rating, r.review, r.date, b.name from reviews as r, books as b where r.user_id = ? and b.id = r.book_id; "; 
            $reviews[] = DB::select($sqlReviews, array($user->id));
        }
        return view('followings.index')->with('users', $users)->with('reviews', $reviews);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userIdent = Auth::id();
        $followedPerson = $_GET['followed_id'];

        if ($this->checkIfFollowing($userIdent, $followedPerson) == null && $userIdent != $followedPerson ) {
            $following = new Following();
            $following->user_id = Auth::id();
            $following->followed_id = $_GET['followed_id'];
            $following->save();
            return back();
        } else {
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = Auth::id();
        $followed_id = $id;
        $deleteFromFollowings = "delete from followings where user_id = ? and followed_id = ?";
        DB::delete($deleteFromFollowings, [$user_id, $followed_id]);

        return Redirect::back();
    }

    private function checkIfFollowing($userId, $followedId) 
    {
        $sql = "select * from followings where user_id = ? and followed_id = ?;";
        $result = DB::select($sql, array($userId, $followedId));

        return $result;
    }
}
