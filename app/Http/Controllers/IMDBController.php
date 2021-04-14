<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Movie;
use Auth;

class IMDBController extends Controller
{
    /**
     * IMDB API call
     * @param \Illuminate\Http\Request
     * @return View
     */
    public function fetch(Request $request, $movie = null){   
      
        $client = new Client();
        $data   = $request->all();

        $user   =  Auth::user()->id;
        $moviesImdbIDs =  Movie::where('user_id',$user)->get()->pluck('imdb_id')->toArray();
        
        
        if($movie)
            $movieTitle = $movie;
        else{
            $movieTitle = $data['movieTitle'];
            $request->session()->put('key', $data['movieTitle']);
        }
           
            
        $response   = $client->request('GET','http://www.omdbapi.com/?apikey=bd81e1f8&r=JSON&s='.$movieTitle);      
        $movies     = json_decode($response->getbody())->Search;
        
            foreach($movies as $index => $movie){ 
                if(in_array($movie->imdbID,$moviesImdbIDs))
                    array_splice($movies,$index,1);
            }
       
        return view('search.search_results')->with('movies',$movies);
        
    }
}
