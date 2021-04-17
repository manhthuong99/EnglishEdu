$(document).ready(function (e) {
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
})
