$(document).ready(function () {

    $("#form").submit(function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        // console.log(form_data);
        $.ajax({
            type: 'POST',
            url: 'assets/php/register.php',
            data: form_data,
            dataType: 'json',
            success: function (data) {
                if (data.status) {
                    Swal.fire(
                        'Success!',
                        data.message,
                        'success'
                      ).then(function() {
                        window.location.href = 'login.php';
                        });
                } else {
                    Swal.fire(
                        'Warning!',
                        data.message,
                        'warning'
                      ).then(function() {
                        window.location.href = 'register.php';
                        });
                }
            }
        
        });
    });
});
