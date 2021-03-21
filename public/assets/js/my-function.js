$(document).ready(function (e) {
    $("#avatar").on('change', (function (e) {
        var files = e.target.files
        var f = files[0]
        var fileReader = new FileReader();
        fileReader.onload = (function (e) {
            console.log(e.target.result)
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
        console.log(provinceId)
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
});

