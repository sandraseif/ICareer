<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table =  "users_movies";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['movie_name','imdb_id','rating','user_id'];
}
