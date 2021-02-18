$(document).ready(function () {
    let data = [];

    $("#cryptoform-currencys input").change( function( e ) {
        data = $('form#w0').serializeArray()
        updateData(data)
    });

    $("#cryptoform-altcoin").change( function( e ) {
        data = $('form#w0').serializeArray()
        updateData(data)
    });
});



function updateData(data) {
    let url = '/crypto/check-box';
    console.log(data);
    $.get(url, data).done(function (data) {
        if (data.success) {
            console.log(data);
            $('#js-crypto-data').html(data.html);
        }
    });
}

