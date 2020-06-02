<?php

namespace App\Http\Controllers;

use App\URL;
use Illuminate\Http\Request;

class DisplayHomepage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $urls = URL::where('private', 0)->orderBy('created_at', 'DESC')->limit(10)->get();
    
        return view('home', ['urls' => $urls]);
    }
}
