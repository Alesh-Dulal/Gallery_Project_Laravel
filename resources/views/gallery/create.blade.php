@extends('layouts.main');
@section('content')
    <div class="callout primary">
        <div class="row column">
            <h1>Create Gallery</h1>
            <p class="lead">Create a gallery and start uploading</p>
        </div>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div>
            {!! Form::open(array('action'=> 'GalleryController@store','enctype'=>'multipart/form-data')) !!}
            {!! Form::label('name','Name') !!}
            {!! Form::text('name', null,
                array('required',
                      'name'=>'name',
                      'placeholder'=>'Name')) !!}

            {!! Form::label('description','Description') !!}
            {!! Form::text('description', null,
                array('required',
                      'name'=>'description',
                      'placeholder'=>'Gallery Description')) !!}

            {!! Form::label('cover_image','Cover Image') !!}
            {!! Form::file('cover_image')!!}

            {!! Form::submit('submit!',
     array('class'=>'button')) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection