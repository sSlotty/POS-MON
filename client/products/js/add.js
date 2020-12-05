$(document).ready(function () {

    $("#form-add").submit(function (event) {
        event.preventDefault();
        // var form_data = $(this).serialize();

        var allForm = new FormData();

        allForm.append('name', $('#name').val());
        allForm.append('price', $('#price').val());
        allForm.append('amount', $('#amount').val());
        allForm.append('type', $('#type').val());
        
        allForm.append('image', $('#image').get(0).files[0]);

 

        $.ajax({
            type: 'POST',
            url: 'php/add.php',
            data: allForm,
            dataType: 'json',
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                if (data.status) {
                    Swal.fire(
                        'Success!',
                        data.message,
                        'success'
                    ).then(function () {
                        window.location.href = 'index.php';
                    });
                } else {
                    Swal.fire(
                        'Warning!',
                        data.message,
                        'warning'
                    ).then(function () {
                        window.location.href = 'index.php';
                    });
                }
            }

        });
    });
});