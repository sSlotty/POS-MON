$(document).ready(function () {
    $('#dataTable').DataTable({
        "order": [0, 'asc'],
        "language": [{
            "emptyTable": `<div class="col-md-12 mt-5">
            <center style="opacity: 0.5;">
            <i class="fad fa-box-open" style="font-size: 100px; color:red;"></i>
            <p class="text-center">ไม่มีสินค้าภายในคลัง</p>
            </center>
        </div>`}
        ]
    });

    $('.delete').click(function () {
        var el = this;

        var deletedid = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: " You want to delete ID " + deletedid,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'php/remove.php',
                    type: 'POST',
                    data: {
                        id: deletedid
                    },
                    success: function (data) {
                        if (data.status) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener(
                                        'mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            }).then(function () {
                                window.location = 'index.php';
                            })

                        } else {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener(
                                        'mouseleave', Swal
                                        .resumeTimer)
                                }
                            })

                            Toast.fire({
                                icon: 'warning',
                                title: data.message
                            })

                        }
                    }
                })
            }
        })
    });

    $('.status').click(function () {
        var el_status = this;

        var updated_id = $(this).data('id');

        $.ajax({
            url: 'php/updated_status.php',
            type: 'POST',
            data: {
                id: updated_id
            },
            success: function (data) {
                if (data.status) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener(
                                'mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener(
                                'mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    })

                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener(
                                'mouseenter', Swal
                                .stopTimer)
                            toast.addEventListener(
                                'mouseleave', Swal
                                .resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'warning',
                        title: data.message
                    })

                }
            }
        })
    })
});