<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->input('theater', null);

        $theater_id = DB::table('theaters')
            ->where('slug', $slug)
            ->limit('1')
            ->value('id');
        
        

        $result = DB::table('screenings')
            ->where('theater_id', $theater_id)
            ->join('movies', 'screenings.movie_id', '=', 'movies.id')
            ->get();
        
        return $result;
    }
}
