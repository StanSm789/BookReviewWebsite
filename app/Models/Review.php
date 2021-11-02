<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    use HasFactory;

    /**
     * Function finds likes of a current user.
     */
    public function isLikedBy($user)
    {
        return (bool) $user->likes->where('review_id', $this->id)->where('like', true)->count();
    }

    /**
     * Function finds likes of a current user.
     */
    public function isDislikedBy($user)
    {
        return (bool) $user->likes->where('review_id', $this->id)->where('like', false)->count();
    }

    /**
     * Function counts likes for a particular review.
     */
    public function countLikes($review)
    {
        $sql = "select count() from likes where like = 1 and review_id = ?;";
        $count = DB::select($sql, array($review->id));
        
        $result = get_object_vars($count[0]);

        return implode(" ",$result);
    }

    /**
     * Function counts dislikes for a particular review.
     */
    public function countDislikes($review)
    {
        $sql = "select count() from likes where like = 0 and review_id = ?;";
        $count = DB::select($sql, array($review->id));

        $result = get_object_vars($count[0]);

        return implode(" ",$result);
    }

    /**
     * Function compares the total number of likes with the total number of dislikes.
     */
    public function compareLikesAndDislikes($review)
    {
       $likes = (int) $this->countLikes($review);
       $dislikes = (int) $this->countDislikes($review);
       $result = true;

       $likes > $dislikes || ($likes == 0 && $dislikes ==0) ? $result = true : $result = false;
       return $result;
    }

    function likes() {
        return $this->hasMany('App\Models\Like');
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rating',
        'review',
        'book_id',
        'user_id'
    ];
}
