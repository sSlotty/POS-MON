$(document).ready(function () {

    $("#form").submit(function (event) {
        event.preventDefault();
        var form_data = $(this).serialize();
        console.log(form_data);
        $.ajax({
            type: 'POST',
            url: 'assets/php/login.php',
            data: form_data,
            dataType: 'json',
            success: function (data) {
                if (data.status) {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,

                    }).then(function () {
                        window.location.href = 'client/index.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'warning !',
                        text: data.message,
                        showDenyButton: true,
                        denyButtonText: `Retry`,
                        showConfirmButton: false
                    }).then(function () {
                        window.location.href = 'login.php';
                    });
                }
            }

        });
    });
});