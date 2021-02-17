$(document).ready(function () {
    $("#wrap-check-box input").change( function( e ) {
        e.preventDefault();
        var data = $(this).serializeArray()
        updateData(data)
    });
    $("#cryptoform-altcoin").change( function( e ) {
        e.preventDefault();
        var data = $('form#w0').serializeArray()
        updateData(data)
    });
});



function updateData(data) {
    let url = '/crypto/check-box';
    $.get(url, data).done(function (data) {
        if (data.success) {
            // let selector = '#js-gangster-id-' + id;
            // $(selector).html(data.html);
        }
    });
}

