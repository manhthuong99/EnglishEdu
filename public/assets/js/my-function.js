$(document).ready(function (e) {
    $("#avatar").on('change', (function (e) {
        let files = e.target.files
        let f = files[0]
        let fileReader = new FileReader();
        fileReader.onload = (function (e) {
            $("#avatar-preview").attr("src", e.target.result);
        });
        fileReader.readAsDataURL(f);
    }));
    $('#re-password').on('keyup', function () {

        let password = $('#password').val();
        let rePassword = $('#re-password').val();
        let message = "";
        if (password !== rePassword) {
            message = "Hai mật khẩu không khớp nhau!"
            $('#validate-password').attr("class", "text-danger")
        } else {
            message = ""
        }
        $('#validate-password').text(message);
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#province').on('change', function () {
        let provinceId = $('#province').val()
        $.ajax({

            type: 'POST',
            url: '/admin/center/district',
            // dataType: "json",
            data: ({
                "id": provinceId
            }),
            success: function (data) {
                $("#district").html(data)
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
    })
    $('#type_customer').on('change', function () {
        let type_customer = $('#type_customer').val()
        if (type_customer == 0){
            $('#other_customer').css('display','block')
        }
        else {
            $('#other_customer').css('display','none')
        }
    })
    $('#type').on('change', function () {
        let other_type = $('#type').val()
        if (other_type == 0) {
            $('#other_type').css('display', 'block')
        } else {
            $('#other_type').css('display', 'none')
        }
    })
});


