!$(document).ready(function() {

    $('form').submit(function(event) {

        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,

            success: function(result){
                var jsonData = JSON.parse(result);
                if (jsonData.status == 'success') {
                    alert('Регистрация прошла успешно');
                }
                else {
                    alert(jsonData.messages);
                }
            }
        });
    });
});