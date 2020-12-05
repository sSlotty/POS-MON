$(document).ready(function () {

    $("#form-edit").submit(function (event) {
        event.preventDefault();
        // var form_data = $(this).serialize();

        var allForm = new FormData();

        allForm.append('name', $('#name').val());
        allForm.append('price', $('#price').val());
        allForm.append('amount', $('#amount').val());
        allForm.append('product_id', $('#product_id').val());

        allForm.append('type', $('#type').val());

        var checkFile = $('#image').val();
        console.log(checkFile);
        if (checkFile == '') {

        } else {
            allForm.append('image', $('#image').get(0).files[0]);
        }

        $.ajax({
            type: 'POST',
            url: 'php/edit.php',
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