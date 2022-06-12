@extends('layouts.app')

@section('content')
    <div class="gallery">
        <div class="gallery__container">
            @foreach($galleries as $gallery)
                <div class="gallery__image">
                    <img src="{{ $gallery->link }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
@endsection
