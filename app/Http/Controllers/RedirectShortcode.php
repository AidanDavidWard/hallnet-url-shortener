<?php

namespace App\Http\Controllers;

use App\Shortcode;
use Illuminate\Http\Request;

class RedirectShortcode extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $shortcode)
    {
        $word = Shortcode::where('name', $shortcode)->first();
        $url = $word ? $word->url : null;

        if ($url) {
            $url->visited += 1;
            $url->save();
            return redirect()->away($url->url);
        } else {
            return redirect()->back()->withErrors(['shortcode' => "Shortcode '$shortcode' not found"]);
        }
    }
}
