$(document).ready(function() {
    var base_url = "http://localhost/test/";
    var notifyParams = {
        autoHide: true,
        TimeShown: 3000,
        HorizontalPosition: 'left',
        VerticalPosition: 'bottom',
        ShowOverlay: false
    };

    $('#emailForm').submit(function(event) {
        event.preventDefault();
        var data = $('#emailForm').serialize();

        $.ajax({
            type: 'POST',
            url: base_url + 'welcome/sendMail',
            data: data,
            success: function(result_data, textStatus, jqXHR) {
                var result_data = JSON.parse(result_data)
                if (result_data.success) {

                    window.location.replace(base_url + "welcome/thank_page");

                } else {
                    jError(result_data.message), notifyParams;
                }
            },
            error: function(data) {
                jError('Error', notifyParams);
            }
        });
    });
});