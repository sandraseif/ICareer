<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Filterable;

class Movie extends Model
{   
    use Filterable;
    protected $table =  "users_movies";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['movie_name','imdb_id','rating','user_id','poster','type'];
}
