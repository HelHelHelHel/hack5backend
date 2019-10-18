<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index(Request $request)
    {
        $orderby = $request->input('orderby', 'name');

        if (!in_array($orderby, ['name', 'rating', 'year'])) {
            $orderby = 'name';
        }

        $orderway = $request->input('orderway', 'asc');
        $limit = $request->input('limit', 10);
        $page = max(1, $request->input('page', 1));

        $movies_in_theaters = DB::table('screenings ')
            ->pluck('movie_id');

        $query = DB::table('movies');

        $query->whereIn('id', $movies_in_theaters)
            ->orderby('name', 'asc')
            ->limit($limit)
            ->offset(($page * $limit) - $limit);

        $movies = $query->get();

        return $movies;    
    }
}
