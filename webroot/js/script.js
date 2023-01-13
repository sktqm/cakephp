$(document).ready(function () {
    $('form').submit(function (e) {

        //         // Error removing if input is correct/valid
        var removeErr = document.getElementsByClassName('error-message');
        for (i = 0; i < removeErr.length; i++) {
            removeErr[i].innerHTML = "";
        }

        errorcheck = 0;
        var letters = /^[A-Za-z\s]+$/;
        var firstname = $("#firstname").val();
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

        var lastname = $("#lastname").val();
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

        // email validation
        var validRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var email = $("#email").val();
        email = email.trim();
        if (email == null || email == "") {
            $('#email-error').html("Please enter your email");
            errorcheck = 1;
        } else if (!email.match(validRegex)) {
            $('#email-error').html("Please enter valid email");
            errorcheck = 1;
        }

        // phone number validation
        var phonenumber = $("#phonenumber").val();
        phonenumber = phonenumber.trim();
        if (phonenumber == "") {
            $('#phonenumber-error').html("Please enter your phone number");
            errorcheck = 1;
        } else if (isNaN(phonenumber)) {
            $('#phonenumber-error').html("Please enter numeric only");
            errorcheck = 1;
        } else if (phonenumber.length != 10) {
            $('#phonenumber-error').html("please enter 10 digit only");
            errorcheck = 1;
        }
        // password validation
        var regularExpressionP = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        if ($("#password").val() == null) {
        } else {
            var password = $("#password").val();
            password = password.trim();
            if (password == "") {
                $('#password-error').html("Please enter your password");
                errorcheck = 1;
            } else if (password.length < 8) {
                $('#password-error').html("please enter atleast 8 characters");
                errorcheck = 1;
            } else if (!password.match(regularExpressionP)) {
                $('#password-error').html("!!password should contain alteast 8 digits, 1 Special Character, 1 number, 1 uppercase, 1 lowercase");
                errorcheck = 1;
            }

            // confirm password validation
            var confirmpassword = $("#confirmpassword").val();
            confirmpassword = confirmpassword.trim();
            if (confirmpassword == "") {
                $('#confirmpassword-error').html("!!Please enter your confirm password");
                errorcheck = 1;
            } else if (confirmpassword.length < 8) {
                $('#confirmpassword-error').html("!!please enter atleast 8 characters");
                errorcheck = 1;
            } else if (!confirmpassword.match(regularExpressionP)) {
                $('#confirmpassword-error').html("!!password should contain alteast 8 digits, 1 Special Character, one number, 1 uppercase, 1 lowercase");
                errorcheck = 1;
            } else if (confirmpassword != password) {
                $('#confirmpassword-error').html("!!confirm password do not matched");
                errorcheck = 1;
            }
        }

        // gender validation
        var gender = "";
        var ele = document.getElementsByName('gender');
        for (i = 0; i < ele.length; i++) {
            if (ele[i].checked) {
                gender = ele[i].value;
            }
        }
        gender = gender.trim();
        if (gender == "") {
            $('#gender-error').html("Please select your gender");
            errorcheck = 1;
        }

        if (errorcheck == 0) {

        } else {
            return false;
        }

    });

    // error removing on keyup
    $('input[name=firstname]').keyup(function () {
        $('#firstname-error').html("");
    });
    $('input[name=lastname]').keyup(function () {
        $('#lastname-error').html("");
    });
    $('input[name=email]').keyup(function () {
        $('#email-error').html("");
    });
    $('input[name=phonenumber]').keyup(function () {
        $('#phonenumber-error').html("");
    });
    $('input[name=password]').keyup(function () {
        $('#password-error').html("");
    });
    $('input[name=confirmpassword]').keyup(function () {
        $('#confirmpassword-error').html("");
    });
    $('input[name=gender]').click(function () {
        $('#gender-error').html("");
    });

});