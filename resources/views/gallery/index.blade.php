@extends('layouts.main');
@section('content-index')
    <div class="callout primary">
        <div class="row column">
            <h1>Photo Gallery</h1>
            <p class="lead">Create a gallery and start uploading</p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        @foreach($galleries as $gallery)
        <div class="column">
            <a href="/gallery/show/{{ $gallery->id }}">
                <img class="thumbnail" src="/images/{{$gallery->cover_image}}">
            </a>
            <h5>{{$gallery->name}}</h5>
            <p>{{$gallery->description}}</p>
        </div>
            @endforeach
    </div>
    @endsection
