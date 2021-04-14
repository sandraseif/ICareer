@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Favorite Movies</div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Movie Name</th>
                            <th>Rating</th>
                            <th>IMDB ID</th>
                            <th>Added On</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Driver Name</td>
                            <td>John Doe</td>
                            <td>Mary Sue</td>
                            <td>22-01-2021</td>
                        </tr>
                        <tr>
                            <td>Origin</td>
                            <td>Downtown</td>
                            <td>Uptown</td>
                            <td>22-01-2021</td>
                        </tr>
                    </tbody>
                </table>              
            </div>
        </div>
    </div>
</div>
@endsection