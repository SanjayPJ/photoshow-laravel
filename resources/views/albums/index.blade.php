@extends('layouts.app')
@section('content')
    @include('inc.messages')
    <h3>Album</h3>
    <hr style="margin-top: 0">
    @if (count($albums) > 0)
        <div id="album">
            <div class="grid-x grid-margin-x">
                @foreach ($albums as $album)
                <div class="medium-4 cell">
                <a href="/album/{{ $album->id }}" class="thumbnail"><img src="storage/album_covers/{{ $album->cover_image }}" alt="{{ $album->name }}"></a>
                <br>
                <h4>{{ $album->name }}</h4>
                </div>                    
                @endforeach
            </div>
        </div>
    @endif
@endsection