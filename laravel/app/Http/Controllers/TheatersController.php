<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TheatersController extends Controller
{
    //
    public function index() 
    {
        $theaters = DB::table('theaters')
                        ->get();
                    return $theaters;
    }
}
