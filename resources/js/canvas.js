window.addEventListener('load', () => {
    canvasDraw();
    canvasSave();
});

function canvasSave() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#upload-canvas').submit(function(e) {
        e.preventDefault();
        let formData = new FormData();

        const canvas = $('#canvas')[0];
        const img = canvas.toDataURL('image/png');

        formData.append('image', img);

        $.ajax({
            type:'POST',
            url: `/gallery`,
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                console.log(response)
                if (response) {
                    alert('Image has been uploaded successfully');
                }
            },
            error: function(response){
                console.log(response);
            }
        });
    });
}

function canvasDraw() {
    const $canvas = $('#canvas');
    const $thickness = $('#thickness');
    const $color = $('#color');
    const $eraser = $('#eraser');
    const canvas = $canvas[0];
    const ctx = canvas.getContext('2d');

    canvas.height = canvas.clientHeight;
    canvas.width = canvas.clientWidth;

    let painting = false;

    function isMouseOnCanvas(e) {
        let position = getCursorPosition(e);
        if (position.x >= canvas.width || position.x <= 0 ||
            position.y >= canvas.height || position.y <= 0) {
            endPosition();
        }
    }
    function getCursorPosition(e) {
        const rect = canvas.getBoundingClientRect()
        return {
            x: e.clientX - rect.left,
            y: e.clientY - rect.top
        }
    }

    function startPosition(e) {
        painting = true;
        draw(e);
    }
    function endPosition() {
        painting = false;
        ctx.beginPath();
    }
    function draw(e) {
        if (!painting) return;
        ctx.lineWidth = parseInt($thickness.val());
        ctx.strokeStyle = $eraser.prop('checked') ? 'white' : $color.val(); // check if picked eraser or not
        ctx.lineCap = 'round';

        let position = getCursorPosition(e);
        ctx.lineTo(position.x, position.y);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(position.x, position.y);
        isMouseOnCanvas(e);
    }

    //eventListeners
    $canvas.on('mousedown', startPosition);
    $canvas.on('mouseup', endPosition);
    $canvas.on('mousemove', draw);
}
