<?php

use App\URL;
use App\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $words = Word::all();
    $urls = URL::where('private', 0)->orderBy('created_at', 'DESC')->limit(5)->get();

    return view(
        'home',
        [
            'words' => $words,
            'urls' => $urls,
        ]
    );
});

Route::post('shorten', function (Request $request) {
    $params = $request->all();

    $params['private'] = isset($params['private']) ? true : false;

    if (!strpos($params['url'], 'http')) {
        $params['url'] = 'http://' . $params['url'];
    }

    $url = URL::create($params);

    $url->word->used = 1;
    $url->word->save();

    return redirect('/');
});

Route::get('{word}', function ($word) {
    $word = Word::where('name', $word)->first();
    $url = $word ? $word->url : null;

    if ($url) {
        $url->visited += 1;
        $url->save();
        return Redirect::away($url->url);
    } else {
        return redirect('/');
    }
});
