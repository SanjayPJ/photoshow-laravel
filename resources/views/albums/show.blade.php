@extends('layouts.app')

@section('content')
  @include('inc.messages')
  <h3>{{ $album->name }}</h3>
  <a href="/" class="button secondary">Back</a>
  <a href="/photo/create/{{$album->id}}" class="button primary">Upload Photo To Album</a>
  <hr style="margin-top: 0">
  @if (count($album->photos) > 0)
        <div id="album">
            <div class="grid-x grid-margin-x">
                @foreach ($album->photos as $photo)
                <div class="medium-4 cell">
                <a href="/photo/{{ $photo->id }}" class="thumbnail"><img src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}"></a>
                <br>
                <h4>{{ $photo->title }}</h4>
                </div>                    
                @endforeach
            </div>
        </div>
    @endif
@endsection
