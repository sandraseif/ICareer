<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IMDBController extends Controller
{
    /**
     * IMDB API call
     * @param \Illuminate\Http\Request
     * @return View
     */
    public function fetch(Request $request){   
      
        $client = new Client();
        $data   = $request->all();
        $value  = session(['key' => $data['movieTitle']]);
        $movieTitle = $data['movieTitle'];
        $response   = $client->request('GET','http://www.omdbapi.com/?apikey=bd81e1f8&r=JSON&s='.$movieTitle);      
        $movies     = json_decode($response->getbody())->Search;
     
        return view('search.search_results')->with('movies',$movies);
        
    }
}
