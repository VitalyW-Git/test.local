let minAge = 0;
let maxAge = 100;

$( document ).ready(function() {
    inputRange([minAge, maxAge]);
});

$('body').on('click', '#checkOne, #submit1', e => {
    filterByPassport();
});

/** Главная функция (дергает второстепенные) */
function filterByPassport() {
    let inps = $('input.form-control');
    // для чтения в масив
    let data = inps.serializeArray();

    // console.log(inps);
    console.log(data);

    data = addIssetPassport(data)
    let url = '/user/search-new';
    sendRequest(url, data)
}

/** Добавляем в data объект c UserSearch[issetPassport] */
function addIssetPassport(data)
{
    let hasIssetPassport = false;
    for (let i = 0; i < data.length; i++) {
        let currentItem = data[i];
        if (currentItem.name === 'UserSearch[issetPassport]') {
            hasIssetPassport = true;
        }
    }

    if (!hasIssetPassport) {
        data.push(
            {name: 'UserSearch[issetPassport]', value: ''}
        )
    }
    return data;
}

/** Отправка данных */
function sendRequest(url, data) {
    $.get(url, data).done( response => {
        if (data) {
            // обновляем весь боди
            $("body").html(response)
            inputRange([minAge, maxAge]);
        }
    });
}

/** Ползунок */
function inputRange(value){
    $('#slider').slider({
        range: true,
        min: 0,
        max: 100,
        values: value,
        slide: function(event, ui) {
            let min = ui.values[0];
            let max = ui.values[1];
            $('#min').val(min);
            $('#max').val(max);
            minAge = min;
            maxAge = max;
        }
    });
    $(".min-number").val( minAge );
    $(".max-number").val( maxAge );
}