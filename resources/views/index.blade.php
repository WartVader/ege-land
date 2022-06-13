@extends('layouts.app')

@section('content')
    <div class="canvas">
        <form id="upload-canvas">
            <div class="canvas__brush">
                <input type="number" class="canvas__brush-thickness" id="thickness" min="0" value="10">
                <input type="color" class="canvas__brush-color" id="color">
                <span class="canvas__brush-btn" onclick="$('#color').click()"><img src="/icons/palette.svg" alt=""></span>
                <input type="checkbox" class="canvas__brush-eraser" id="eraser">
                <span class="canvas__brush-btn" onclick="$('#eraser').click()">
                <svg id="eraser-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M480 416C497.7 416 512 430.3 512 448C512 465.7 497.7 480 480 480H150.6C133.7 480 117.4 473.3 105.4 461.3L25.37 381.3C.3786 356.3 .3786 315.7 25.37 290.7L258.7 57.37C283.7 32.38 324.3 32.38 349.3 57.37L486.6 194.7C511.6 219.7 511.6 260.3 486.6 285.3L355.9 416H480zM265.4 416L332.7 348.7L195.3 211.3L70.63 336L150.6 416L265.4 416z"/></svg>
            </span>

            </div>
            <canvas id="canvas"></canvas>
            <div>
                <button type="submit">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
    <a href="/gallery">Галерея</a>

    <script src="js/app.js"></script>
@endsection
