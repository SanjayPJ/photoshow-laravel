@extends('layouts.app')
@section('content')
    <h3>Create Album</h3>
    <hr style="margin-top: 0">
    @include('inc.messages')
    {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::text('name', '', ['placeholder' => 'Album Name']) }}
        {{ Form::textarea('description', '', ['placeholder' => 'Album Description']) }}
        {{ Form::file('cover_image') }}
        {{ Form::submit('Submit', ['class' => 'button secondary expanded']) }}
    {!! Form::close() !!}
@endsection