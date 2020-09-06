<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Movie;
class UserController extends Controller
{
    //

    public function getUserLeaves(Request $request){
      $userLeaves = User::find($request->input('user_id'));
      return $userLeaves->leaves;
    }

    // Returns all movies that the user has
    public function getUserMovies(Request $request){
      //add validation

      $user = User::find($request->input('user_id'));
      return $user->movies;

    }

    //this gets the users movie by id
    public function getUserMovieById(Request $request){
      $movieId = $request->input('movie_id');
      $user = User::find($request->input('user_id'));
      return $user->movies()->where('movie_id',$movieId)->get();
    }

    public function addMovie(Request $request){
      //add validation
      $movie = new movie();
      $movie->user_id = $request->input('user_id');
      $movie->movie_id = $request->input('movie_id');
      $movie->title = $request->input('title');
      $movie->overview = $request->input('overview');
      $movie->releaseDate = $request->input('releaseDate');
      $movie->save();
    }

    //remove the movie id
    public function removeMovie(Request $request){
      //add validation
      $user = User::find($request->input('user_id'));
      $user->movies()->where('movie_id',$request->input('movie_id'))->delete();
      return response(200);

    }
    //checks if user owns given movies
    public function checkUserOwnMovieList(Request $request){
        $movieList = $request->input('movie_list');
        $user = User::find($request->input('user_id'));
        $movieResult= $user->movies()->whereIn('movie_id', $movieList)->get();

        return $movieResult;
    }
    public function checkUserOwnsMovie(Request $request){
      $movie_id = $request->input('movie_id');
      $user = User::find($request->input('user_id'));
      $result =$user->movies()->where('movie_id', $movie_id)->exists();
      if($result){
        return "true";
      }else{return "false";}
    }


}
