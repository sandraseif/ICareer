@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if(!empty($msg))
            <div class="alert"> {{ $msg }}</div>
            @endif
            <div class="input-group">
                <form action="{{url('imdb')}}" method="post">
                     @csrf
                     <input type="hidden" name="type" value="movie"/>
                    <input type="search" class="form-control rounded" placeholder="Search in IMDB" aria-label="Search"
                        aria-describedby="search-addon" name="movieTitle"/>
                    <button type="submit" class="btn btn-outline-primary">search movie</button>
                </form>    
            </div>
            <div class="input-group">
                <form action="{{url('imdb')}}" method="post">
                     @csrf
                     <input type="hidden" name="type" value="episode"/>
                    <input type="search" class="form-control rounded" placeholder="Search in IMDB" aria-label="Search"
                        aria-describedby="search-addon" name="movieTitle"/>
                    <button type="submit" class="btn btn-outline-primary">search episode</button>
                </form>    
            </div>
            <div class="input-group">
                <form action="{{url('imdb')}}" method="post">
                     @csrf
                     <input type="hidden" name="type" value="series"/>
                    <input type="search" class="form-control rounded" placeholder="Search in IMDB" aria-label="Search"
                        aria-describedby="search-addon" name="movieTitle"/>
                    <button type="submit" class="btn btn-outline-primary">search series</button>
                </form>    
            </div>
        </div>        
        <div class="col-md-8">
            <div class="card">    
                <div class="card-header text-center">Favorite Movies    
                <div class="row">
                    <div class="col-md-4 text-right">
                        <a href="/mymovies?rating"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-stars" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
                            <path d="M2.242 2.194a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.256-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53z"/>
                            </svg> Sort By Rating</a>  
                    </div> 
                    <div class="col-md-4 text-right">
                        <a href="/mymovies?date"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg> Sort By date</a>
                    </div> 
                </div>

                </div>
             
                 
                @if(count($movies) > 0)
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Movie Name</th>       
                            <th>IMDB ID</th>
                            <th>Poster</th>
                            <th>Type</th>
                            <th>Added On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{$movie->movie_name}}</td>
                            <td>{{$movie->imdb_id}}</td>  

                            <td><img src="{{$movie->poster}}" class="img-responsive img-rounded"
                   style="max-height: 70px; max-width: 70px;"/></td> 
                            <td>{{$movie->type}}</td>                  
                            <td>{{$movie->created_at}}</td>  
                            <td>
                            <form action="{{ url('/movie/'.$movie->id) }}" method="post">                          
                                {{ csrf_field() }}                                
                                <input type="number" name="rating" placeholder="rating"  value= "{{$movie->rating}}" required max=10>
                                                                           
                                <button type="submit" class="btn btn-link">Update Rating</button>                              
                            </form>
                            </td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>  
                @if(count($movies) > 0)
                    <div class="pagination">
                        <?php echo $movies->render();  ?>
                    </div>
                @endif
            @else
                <i>No Movies found</i>
            @endif          
            </div>
        </div>
    </div>
</div>
@endsection