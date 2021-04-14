@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">Favorite Movies</div>
                @if(count($movies) > 0)
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Movie Name</th>                           
                            <th>IMDB ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{$movie->Title}}</td>
                            <td>{{$movie->imdbID}}</td>
                            <td>
                            <form action="{{ url('movie') }}" method="post">   
                                <input type="hidden" name="imdb_id" value="{{ $movie->imdbID }}">  
                                <input type="hidden" name="movie_name" value="{{ $movie->Title }}">                         
                                {{ csrf_field() }}                                
                                <input type="number" name="rating" placeholder="rating" max=10>
                                                                           
                                <button type="submit" class="btn btn-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                                    </svg></button>
                                  
                            </form>
                            </td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>  
            @else
                <i>No Movies found</i>
            @endif          
            </div>
        </div>
    </div>
</div>
@endsection