<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrl as RequestsCreateUrl;
use App\Shortcode;
use App\URL;
use Illuminate\Http\Request;

class CreateURL extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RequestsCreateUrl $request)
    {
        $params = $request->validated();

        // private is a checkbox so if it's set its true
        $params['private'] = isset($params['private']);

        // if the user enters a long URL that does not start with http then we add it for them
        // http because that matches http:// and https://
        if (strpos($params['url'], 'http')) {
            $params['url'] = 'http://' . $params['url'];
        }

        if ($params['name']) {
            // if short_code field has been filled out save shortcode
            $shortcode = Shortcode::create([
                'user_created' => 1,
                'name' => $params['name'],
            ]);
        } else {
            // if shortcode isn't filled out get all unused system shortcodes and pick one at random
            $shortcodes = Shortcode::where([
                'used' => 0,
                'user_created' => 0
            ])->get()->toArray();
            $shortcode = $shortcodes[rand(0, count($shortcodes) - 1)];
        }
        
        $params['shortcode_id'] = $shortcode['id'];
        $url = URL::create($params);

        // mark shortcode as used so it can't be used again
        $url->shortcode->used = 1;
        $url->shortcode->save();

        $successMessage = 'Created url with shortcode: ' . $shortcode['name'];
        return redirect()->to('/')->with('msg', $successMessage);
    }
}
