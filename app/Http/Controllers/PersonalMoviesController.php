<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Movie;
use Auth;
use Redirect;

class PersonalMoviesController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $movies = Movie::orderBy('id', 'DESC')->paginate(10);
        return view('profile.favorite_movies')->withMovies($movies);
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
      
        $data            = $request->all();
        $data['user_id'] =   Auth::user()->id;
        $value = $request->session()->get('key');

        $existedMovie = Movie::where('imdb_id',$data['imdb_id'])->first();

        if($existedMovie){
            $msg = "Movie is already added.";
        }else{
            $movie = Movie::create($data);
            $msg   = "Movie has been added.";
        }
   
        $movies = Movie::orderBy('id', 'DESC')->paginate(10);    
        return view('profile.favorite_movies')->withMovies($movies)->with('msg',$msg);;
    
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
        //
    }
}
