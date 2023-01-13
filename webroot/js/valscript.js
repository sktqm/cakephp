$(document).ready(function () {
    $('form').submit(function (e) {

        alert('myscript.js');
        // Error removing if input is correct/valid
        var removeErr = document.getElementsByClassName('error-message');
        for (i = 0; i < removeErr.length; i++) {
            removeErr[i].innerHTML = "";
        }

        errorcheck = 0;
        var letters = /^[A-Za-z\s]+$/;
        var firstname = $("#first-name").val();
        firstname = firstname.trim();
        if (firstname == "") {
            $('#firstname-error').html("Please enter your first name");
            errorcheck = 1;
        } else if (!firstname.match(letters)) {
            $('#firstname-error').html("Please enter characters only");
            errorcheck = 1;
        } else if (firstname.length < 3) {
            $('#firstname-error').html("Please enter at least 3 characters");
            errorcheck = 1;
        }

        var lastname = $("#last-name").val();
        lastname = lastname.trim();
        if (lastname == "") {
            $('#lastname-error').html("Please enter your last name");
            errorcheck = 1;
        } else if (!lastname.match(letters)) {
            $('#lastname-error').html("Please enter characters only");
            errorcheck = 1;
        } else if (lastname.length < 3) {
            $('#lastname-error').html("Please enter at least 3 characters");
            errorcheck = 1;
        }

        if (errorcheck == 0) {

        } else {
            return false;
        }

    });
});