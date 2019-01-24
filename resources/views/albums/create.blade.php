@extends('layouts.app')
@section('content')
    <h3 style="margin-bottom: 20px">Create Album</h3>
    @include('inc.messages')
    {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::text('name', '', ['placeholder' => 'Album Name']) }}
        {{ Form::textarea('description', '', ['placeholder' => 'Album Description']) }}
        {{ Form::file('cover_image') }}
        {{ Form::submit('Submit', ['class' => 'button secondary expanded']) }}
    {!! Form::close() !!}
@endsection