$(document).ready(function() {

    var $inputPass = $('input#password'),
        $inputPass2 = $('input#password2'),
        $inputMail = $('input#mail'),
        $errorPass = $('.passLabel'),
        $errorPass2 = $('.pass2Label'),
        $errorMail = $('.mailLabel'),
        $regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/,
        $regexPass = /^(?=.*[A-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@])(?!.*[iIoO])\S{6,20}$/;

    $inputMail.keyup(function () {
        if (!$regex.test($(this).val())) {
            $($errorMail).text("Mail invalide");
            $(this).css({
                borderColor: 'red',
                color: 'red'
            });
        } else {
            $($errorMail).text("Mail valide");
            $(this).css({
                borderColor: 'green',
                color: 'green'
            });
        }
    });
    $inputPass.keyup(function () {
        if (!$regexPass.test($(this).val())) {
            $($errorPass).text("Mot de passe incorrect");
            $(this).css({
                borderColor: 'red',
                color: 'red'
            });
        } else {
            $($errorPass).text("Mot de passe correct");
            $(this).css({
                borderColor: 'green',
                color: 'green'
            });
        }
    });
    $inputPass2.keyup(function () {
        if ($inputPass.val() != $inputPass2.val()) {
            $($errorPass2).text("Le mot de passe n'est pas identique");
            $(this).css({
                borderColor: 'red',
                color: 'red'
            });
        } else {
            $($errorPass2).text("Mot de passe correct");
            $(this).css({
                borderColor: 'green',
                color: 'green'
            });
        }
    });
});