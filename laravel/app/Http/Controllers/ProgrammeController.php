<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->input('theater', null);

        $date = date('Y-m-d');

        $theater_id = DB::table('theaters')
            ->where('slug', $slug)
            ->limit('1')
            ->value('id');
        
        $movie_ids = DB::table('screenings')    
            ->where('theater_id', $theater_id)
            ->distinct('movie_id')
            ->pluck('movie_id');
         
        $movies = DB::table('movies')
            ->whereIn('id', $movie_ids)
            ->get(); 

        $movies->times = [];    

        foreach ($movies as $movie)  {
            $movie->times[] = 
            DB::table('screenings')
                ->where('theater_id', $theater_id)
                ->where('movie_id', $movie->id)
                ->where('begins_at', 'like', $date.'%')
                ->pluck('begins_at');
        }  
        
        return $movies;
    }
}
