document.addEventListener('DOMContentLoaded', () => {

    const ajaxSend = async (formData) => {
        const fetchResp = await fetch('/regForm', {
            method: 'POST',
            body: formData
        });
        if (!fetchResp.ok) {
            throw new Error(`Ошибка по адресу ${url}, статус ошибки ${fetchResp.status}`);
        }

        return await fetchResp.text();
    };

    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            ajaxSend(formData)
                .then((response) => {
                    var jsonData = JSON.parse(response);
                    console.log(jsonData);
                    if (jsonData.status == 'success') {
                        alert('Регистрация прошла успешно');
                    }
                    else {
                        alert(jsonData.messages);
                    };
                    //form.reset(); // очищаем поля формы
                })
                .catch((err) => console.error(err))
        });
    });

});