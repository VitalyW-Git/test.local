$('body').on('click', '#checkOne', e => {
    filterByPassport();
});

/** Главная функция (дергает второстепенные) */
function filterByPassport() {
    let inps = $('input.form-control');
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
            $("body").html(response)
        }
    });
}

