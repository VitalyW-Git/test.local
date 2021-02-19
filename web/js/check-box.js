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
        if (data.success || data.error == null) {
            //успешная отправка
            $('#js-crypto-data').html(data.html);
        } else {
            // Если при обработке данных на сервере произошла ошибка
            $("#output").text(data.error)
        }
    }).fail(function() {
        // Если произошла ошибка при отправке запроса
        $("#output").text("Ошибка при отправке!");
    });
}

