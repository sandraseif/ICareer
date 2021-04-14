<?php

use Illuminate\Database\Seeder;

class UsersMoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->create(['email'=>'user@email.com'])->each(function ($u) {
            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'Grace Is Gone','imdb_id'=>'tt0772168','rating'=>3,'user_id'=>$u->id]
            ));

            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'Gone in 60 Seconds','imdb_id'=>'tt0071571','rating'=>4,'user_id'=>$u->id]
            ));

            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'The Social Network','imdb_id'=>'tt1285016','rating'=>4,'user_id'=>$u->id]
            ));

            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'The Social Dilema','imdb_id'=>'tt11464826','rating'=>4,'user_id'=>$u->id]
            ));

            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'Gone','imdb_id'=>'tt1838544','rating'=>4,'user_id'=>$u->id]
            ));
        });

        factory(App\User::class, 1)->create(['email'=>'user2@email.com'])->each(function ($u) {
            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'Grace Is Gone','imdb_id'=>'tt0772168','rating'=>3,'user_id'=>$u->id]
            ));

            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'The Social Dilema','imdb_id'=>'tt11464826','rating'=>4,'user_id'=>$u->id]
            ));
        });

        factory(App\User::class, 1)->create(['email'=>'user3@email.com'])->each(function ($u) {
            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'Social Nightmare','imdb_id'=>'tt2953196','rating'=>3,'user_id'=>$u->id]
            ));

            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'The Social Network','imdb_id'=>'tt1285016','rating'=>4,'user_id'=>$u->id]
            ));

            $u->movies()->save(factory(App\Movie::class)->make(
                ['movie_name'=>'Gone in 60 Seconds','imdb_id'=>'tt0071571','rating'=>4,'user_id'=>$u->id]
            ));
        });
    }
}
