@extends('layouts.app')
@section('content')
    @include('inc.messages')
    <h3 style="margin-bottom: 20px">Album</h3>
    @if (count($albums) > 0)
        <?php $col_count = count($albums); $i = 1; ?>
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