import * as $ from 'jquery'
import 'bootstrap'

$(document).ready(function () {

    $('#zoomBtn').click(function () {
        $('.zoom-btn-sm').toggleClass('scale-out');
        if (!$('.zoom-card').hasClass('scale-out')) {
            $('.zoom-card').toggleClass('scale-out');
        }
    });

    $('.zoom-btn-sm').click(function () {
        var btn = $(this);

        if (btn.hasClass('zoom-btn-person')) {
            btn.css('background-color', '#d32f2f');
        }

    });


    $('.county-info').click(function () {
        $('#info-modal').modal("show");
    });
});
