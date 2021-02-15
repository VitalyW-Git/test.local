$(document).ready(function () {
    $('.js-btn-user-order, .js-btn-user-delete').on('click', function (e) {
        e.preventDefault();
        let btnOrderAjax = $(this);
        let btnDeleteAjax = $(this);
        let userId = btnOrderAjax.attr('data-user-id');
        let userDeleteId = btnDeleteAjax.attr('data-user-delete-id');

        sendAjax(userId);
        sendDeleteAjax(userDeleteId);
        // console.log(btnDeleteAjax);
    })
});

function sendAjax(id) {
    let url = '/user/order-ajax';
    let data = {id: id};
    $.post(url, data).done(function (data) {
        // $('h1#js-count-text').text(data['count']);
        // $('h1#js-user-error').text(data['error']);
        if (data['success']) {
            let html = data.view;
            $('#js-user-views').html(html);
        }
    });
}

function sendDeleteAjax(id) {
    let url = '/user/delete';
    let data = {id: id};
    $.get(url, data).done(function (data) {
        if (data['success']) {
            let html = data.view;
            $('#js-user-views').html(html);

            let deleteId = '.data-user-delete' +id;
            $(deleteId).remove();

            console.log(data)
        }

    });
}


// let a = $(this);
// let b = $('.js-btn-user-order');
// let c = e.target;
//
// console.log(a);
// console.log(b);
// console.log(c);
// let abcd = $(e.target);
// console.log(abcd);