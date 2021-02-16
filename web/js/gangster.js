
$(document).ready(function () {

    var myColors = ['red', 'purple', '#e84751', 'blue', 'orange', '#323643'];

    $('body').on('click', '.js-change-gangster', function (e) {
        e.preventDefault();
        let btnOrderAjax = $(this);
        let gangsterId = btnOrderAjax.attr('data-update-gangster-id');
        updateGangsterAjax(gangsterId);


    })

    $('body').on('click', '.js-status-gangster', function (e) {
        e.preventDefault();
        let btnOrderAjax = $(this);
        let gangsterStatusId = btnOrderAjax.attr('data-gangster-id');
        updateStatusAjax(gangsterStatusId);

        /**
         * изменение цвета при нажатии на кнопку 'Изменить статус'
         * @type {number}
         */
        var randomize = Math.floor(Math.random()*myColors.length);
        $('.panel-body').css("background-color", myColors[randomize]);

    })
});

/**
 * Изменяем данные Gangster
 * @param id
 */
function updateGangsterAjax(id) {
    let url = '/gangster/update-gangster';
    let data = {id: id};
    $.get(url, data).done(function (data) {
        if (data.success) {
            let selector = '#js-gangster-id-' + id;
            $(selector).html(data.html);
        }
    });
}

/**
 * Изменяме статтус Gangster
 * @param id
 */
function updateStatusAjax(id) {
    let url = '/gangster/status';
    let data = {id: id};
    $.get(url, data).done(function (data) {
        if (data['success']) {
            console.log(data)
            let status = data.view.status;
            let slector = '#js-update-status-' + id;
            $(slector).text(status);
        }
    });
}
