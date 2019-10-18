<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TheatersController extends Controller
{
    //
    public function index(Request $request) 
    {
        $slug = $request->input('theater');

        $query = DB::table('theaters');

        if ($slug !== null) {
            $query ->where('slug', $slug);
            return (array)$query->first();
        } else {
            return $query->get();
        }    

        
    }

    public function open () 
    {
        
    }

}
