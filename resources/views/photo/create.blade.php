@extends('layouts.main');
@section('content')
    <div class="callout primary">
        <div class="row column">
            <h1>Upload photo</h1>
            <p class="lead">Upload photo to gallery</p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div>
            {!! Form::open(array('action'=> 'PhotoController@store','enctype'=>'multipart/form-data')) !!}
            {!! Form::label('title','Title') !!}
            {!! Form::text('title', null,
                array('required',
                      'name'=>'title',
                      'placeholder'=>'Photo Title')) !!}

            {!! Form::label('description','Description') !!}
            {!! Form::text('description', null,
                array('required',
                      'name'=>'description',
                      'placeholder'=>'Gallery Description')) !!}

            {!! Form::label('location','Location') !!}
            {!! Form::text('location', null,
                array('required',
                      'name'=>'location',
                      'placeholder'=>'Location')) !!}

            {!! Form::label('image','Photo') !!}
            {!! Form::file('image')!!}
<input type="hidden" name="gallery_id" value = "{{$gallery_id}}">
            {!! Form::submit('submit!',
     array('class'=>'button')) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection