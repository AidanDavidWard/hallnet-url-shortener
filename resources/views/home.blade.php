@extends('layouts.main')

@section('title', 'Home')

@section('content')
<form action="/shorten">
    <div class="form-row form-group">
        <div class="col-md-5">
            <input type="text" class="form-control" id="long_url" placeholder="Long URL (required)">
        </div>
        <div class="col-md-3">
            <select class="form-control" id="short_url">
                <option selected>Short URL keyword (optional)</option>
                @foreach ($words as $word)
                    <option
                        value="{{ $word->id }}"
                        @if ($word->used)
                            disabled
                            class="disabled"
                        @endif
                    >
                        {{ $word->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <input type="checkbox" name="private" id="private">
            <label for="private">Private?</label>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">SHORTEN</button>
        </div>
    </div>
</form>

<div class="row pl-3 pr-3 pb-3">
    <h1>Recently shortened URL's</h1>
</div>
<div class="row ml-1 mr-1 p-3 shortened-url-box">
    <div class="container">
        <div class="row">
            <a href="{{ env('APP_URL') . '/' . 'aardvaark' }}">{{ env('APP_URL') . '/' . 'aardvaark' }}</a>
        </div>
        <div class="row">
            <span>3 weeks ago</span>
        </div>
        <div class="row">
            <span>http://example-of-an-example.com/example/page1/</span>
        </div>
    </div>
</div>
<div class="row ml-1 mr-1 p-3 shortened-url-box">
    <div class="container">
        <div class="row">
            <a href="{{ env('APP_URL') . '/' . 'aardvaark' }}">{{ env('APP_URL') . '/' . 'aardvaark' }}</a>
        </div>
        <div class="row">
            <span>3 weeks ago</span>
        </div>
        <div class="row">
            <span>http://example-of-an-example.com/example/page1/</span>
        </div>
    </div>
</div>
<div class="row ml-1 mr-1 p-3 shortened-url-box">
    <div class="container">
        <div class="row">
            <a href="{{ env('APP_URL') . '/' . 'aardvaark' }}">{{ env('APP_URL') . '/' . 'aardvaark' }}</a>
        </div>
        <div class="row">
            <span>3 weeks ago</span>
        </div>
        <div class="row">
            <span>http://example-of-an-example.com/example/page1/</span>
        </div>
    </div>
</div>
<div class="row ml-1 mr-1 p-3 shortened-url-box">
    <div class="container">
        <div class="row">
            <a href="{{ env('APP_URL') . '/' . 'aardvaark' }}">{{ env('APP_URL') . '/' . 'aardvaark' }}</a>
        </div>
        <div class="row">
            <span>3 weeks ago</span>
        </div>
        <div class="row">
            <span>http://example-of-an-example.com/example/page1/</span>
        </div>
    </div>
</div>
<div class="row ml-1 mr-1 p-3 shortened-url-box">
    <div class="container">
        <div class="row">
            <a href="{{ env('APP_URL') . '/' . 'aardvaark' }}">{{ env('APP_URL') . '/' . 'aardvaark' }}</a>
        </div>
        <div class="row">
            <span>3 weeks ago</span>
        </div>
        <div class="row">
            <span>http://example-of-an-example.com/example/page1/</span>
        </div>
    </div>
</div>
@endsection