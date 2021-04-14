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
                    <input type="search" class="form-control rounded" placeholder="Search in IMDB" aria-label="Search"
                        aria-describedby="search-addon" name="movieTitle"/>
                    <button type="submit" class="btn btn-outline-primary">search</button>
                </form>    
            </div>
        </div>        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Favorite Movies</div>
                @if(count($movies) > 0)
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Movie Name</th>       
                            <th>IMDB ID</th>
                            <th>Added On</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr>
                            <td>{{$movie->movie_name}}</td>
                            <td>{{$movie->rating}}</td>
                            <td>{{$movie->imdb_id}}</td>
                            <td>{{$movie->created_at}}</td>
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