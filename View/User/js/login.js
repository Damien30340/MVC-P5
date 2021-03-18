$(document).ready(function() {

    var $inputPass = $('input#password'),
        $inputMail = $('input#mail'),
        $errorPass = $('.passLabel'),
        $errorMail = $('.mailLabel'),
        $regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
        $regexPass = /^(?=.*[A-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@])(?!.*[iIoO])\S{6,20}$/;

    $inputMail.keyup(function () {
        if (!$regex.test($(this).val())) {
            $($errorMail).text("Format incorrect");
            $(this).css({
                borderColor: 'red',
                color: 'red'
            });
        } else {
            $($errorMail).text("Format correct");
            $(this).css({
                borderColor: 'green',
                color: 'green'
            });
        }
    });
    $inputPass.keyup(function () {
        if (!$regexPass.test($(this).val())) {
            $($errorPass).text("Format incorrect");
            $(this).css({
                borderColor: 'red',
                color: 'red'
            });
        } else {
            $($errorPass).text("Format correct");
            $(this).css({
                borderColor: 'green',
                color: 'green'
            });
        }
    });
});