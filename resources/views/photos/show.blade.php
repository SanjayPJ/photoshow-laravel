@extends('layouts.app')

@section('content')
  @include('inc.messages')
  <h3>{{ $photo->title }}</h3>
    <p>{{ $photo->description }}</p>
{!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']) !!}
<a href="/album/{{$photo->album_id}}" class="button secondary">Back To Gallery</a>
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'button alert']) }}
{!! Form::close() !!}
<br>
<img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}">
<hr>
<p>Size : {{ $photo->size }}</p>
@endsection
