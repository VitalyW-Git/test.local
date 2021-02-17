$(document).ready(function () {
    let data = [];

    $("#cryptoform-currencys input").change( function( e ) {
        e.preventDefault();
        data = $('form#w0').serializeArray()
        updateData(data)
    });
    $("#cryptoform-altcoin").change( function( e ) {
        e.preventDefault();
        data = $('form#w0').serializeArray()
        updateData(data)
    });
});



function updateData(data) {
    let url = '/crypto/check-box';
    console.log(data);
    $.get(url, data).done(function (data) {
        if (data.success) {
            // let selector = '#js-gangster-id-' + id;
            // $(selector).html(data.html);
        }
    });
}

