@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <form action="/shorten" method="post">
        <div class="form-row form-group">
            <div class="col-md-5">
                <input type="text" class="form-control" name="url" id="url" placeholder="Long URL (required)" required>
            </div>
            <div class="col-md-3">
                <select class="form-control" name="word_id" id="word_id">
                    <option selected>Short URL keyword (optional)</option>
                    @foreach ($words as $word)
                        <option
                            value="{{ $word->id }}"
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
    @forelse ($urls as $url)
        <div class="row ml-1 mr-1 p-3 shortened-url-box">
            <div class="container">
                <div class="row">
                    <a href="{{ env('APP_URL') . '/' . $url->word->name }}">{{ env('APP_URL') . '/' . $url->word->name }}</a>
                </div>
                <div class="row">
                    <span>{{ $url->created_at->diffForHumans() }} - visited {{ $url->visited }} times</span>
                </div>
                <div class="row">
                    <span>{{ $url->url }}</span>
                </div>
            </div>
        </div>
    @empty
        <div class="row ml-1 mr-1 p-3 shortened-url-box">
            <div class="container">
                <div class="row">
                    <span>No recently created URL's</span>
                </div>
            </div>
        </div>
    @endforelse
@endsection