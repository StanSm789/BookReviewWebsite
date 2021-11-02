<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    function reviews() {
        return $this->hasMany('App\Models\Review');
        }
    
    function images() {
        return $this->hasMany('App\Models\Image');
        }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'authorName',
        'year',
        'publisher',
        'description',
        'recommendedRetailPrice',
        'url'
    ];
}
