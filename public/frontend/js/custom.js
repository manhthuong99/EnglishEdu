$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#validate-email').on('blur', function () {
        let email = $('#validate-email').val();
        let validate = validateEmail(email)
        if (!validate && email != ''){
            $('#email-error').text('Email sai định dạng')
        }
        else $('#email-error').empty()


    })
    function validateEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    $("#avatar").on('change', (function (e) {
        console.log(111)
        let files = e.target.files
        let f = files[0]
        let fileReader = new FileReader();
        fileReader.onload = (function (e) {
            $("#avatar-preview").attr("src", e.target.result);
        });
        fileReader.readAsDataURL(f);
    }));
    $('#updateAccount').on('click')
})
