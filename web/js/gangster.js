$(document).ready(function () {

    $('body').on('click', '.js-change-gangster', function (e) {
        e.preventDefault();
        let btnOrderAjax = $(this);
        // let gangsterId = btnOrderAjax.attr('data-gangster-id');
        // let gangsterStatus = btnOrderAjax.attr('data-js-update-status');

        let gangsterId = btnOrderAjax.attr('data-update-gangster-id');
        updateGangsterAjax(gangsterId);
    })
});

function updateGangsterAjax(id) {
    let url = '/gangster/update-gangster';
    let data = {id: id};
    $.get(url, data).done(function (data) {
        if (data.success) {
            //console.log(data);
            let slector = '#js-gangster-id-' + id;
            $(slector).html(data.html);
        }
    });
}

function updateAjax(id, status) {
    let url = '/gangster/status';
    let data = {id: id, status: status};
    $.get(url, data).done(function (data) {
        if (data['success']) {
            let status = data.view.status;
            let slector = '#js-update-status-' + id;
            $(slector).text(status);
        }
    });
}