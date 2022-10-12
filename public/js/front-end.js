// check PasswordvStrength

function checkPasswordStrength() {
    let number = /([0-9])/;
    let alphabets = /([a-zA-Z])/;
    let special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($('#password').val().length < 6) {
        $("#signupUser").attr("disabled", "disabled");
        $("#cpassword").attr("disabled", "disabled");
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('weak-password');
        $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
    } else {
        $("#signupUser").removeAttr("disabled");
        $("#cpassword").removeAttr("disabled");
        if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('strong-password');
            $('#password-strength-status').html("Strong");
        } else {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('medium-password');
            $('#password-strength-status').html("Medium (should include alphabets, numbers and special characters.)");
        }
    }
}

$(document).ready(function () {
    $('#cpassword').on('keyup', function () {
        $("#PasswordUpdate").attr("disabled", "disabled");
        $("#signupUser").attr("disabled", "disabled");
        $("#password-strength-status").hide();
        if ($('#password').val() != "" && $('#cpassword').val() !=
            "") {
            if ($('#password').val() == $('#cpassword').val()) {
                $("#PasswordUpdate").removeAttr("disabled");
                $("#signupUser").removeAttr("disabled");
                $('#password-status').html('Password Matching !').css('color', 'green');
            } else {
                document.getElementById("cpassword");
                $('#password-status').html('Not Matching !').css('color', 'red');
            }
        } else {

        }
    }

    );
});

// end check PasswordvStrength


// login admin
$(document).ready(function () {
    $("#login").on("click", function () {
        let btn = document.querySelector('#login').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let username = $("#username").val();
        let password = $("#password").val();
        if (username != "" && password != "") {
            $.ajax({
                url: base_url + "login/authenticate",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#login").attr("disabled", "disabled");
                    $("#login").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#login").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    $("#login").removeAttr("disabled");
                    document.querySelector('#login').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'All Fields Required');
        }
    });
});

$(document).ready(function () {
    $("#passwordReset").on("click", function () {
        let btn = document.querySelector('#passwordReset').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let username = $("#username").val();
        if (username != "") {
            $.ajax({
                url: base_url + "login/forgot_password_check",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#passwordReset").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#passwordReset").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#passwordReset').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'Username Required!');
        }
    });
});



$(document).ready(function () {
    $("#resent").on("click", function () {
        let btn = document.querySelector('#resent').textContent;
        let email = $("#email").val();
        let remaining = 'remaining';
        $.ajax({
            url: base_url + "login/resent_otp",
            type: "POST",
            delay: 0,
            data: {
                email: email,
            },
            cache: false,
            beforeSend: function () {
                $("#resent").html('Please Wait...');
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $("#resent").attr("disabled", "disabled");
                    timer(remaining);
                    timer(120);
                    sAlert('success', dataResult.msg);
                } else if (dataResult.statusCode == 201) {
                    sAlert('error', dataResult.msg);
                }
            },
            complete: function () {
                document.querySelector('#resent').textContent = btn;
            },
        });

    });
});


$(document).ready(function () {
    $("#otpVerification").on("click", function () {
        $("#resent").attr("disabled", "disabled");
        let btn = document.querySelector('#otpVerification').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        $.ajax({
            url: base_url + "login/forgotVerification",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#otpVerification").html('Please Wait...');
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $("#otpVerification").attr("disabled", "disabled");
                    sAlert('success', dataResult.msg, dataResult.url);
                    document.getElementById("FormData").reset();
                } else if (dataResult.statusCode == 201) {
                    sAlert('error', dataResult.msg);
                }
            },
            complete: function () {
                document.querySelector('#otpVerification').textContent = btn;
            },
        });
    });
});


$(document).ready(function () {
    $("#Newpassword").on("click", function () {
        let btn = document.querySelector('#Newpassword').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let password = $("#password").val();
        let cPassword = $("#cPassword").val();
        if (password != "" && cPassword != "") {
            $.ajax({
                url: base_url + "login/NewPassword",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#Newpassword").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#Newpassword").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#Newpassword').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'Password Required!');
        }
    });
});

$(document).ready(function () {
    window.onload = function () {
        checkAvailability();
    };
});
//
function checkAvailability() {
    $("#loaderIcon").show();
    $.ajax({
        type: "POST",
        url: base_url + "Sign_up/checkFefer",
        cache: false,
        delay: 0,
        data: {
            referral_code: $("#referral_code").val(),
        },
        success: function (data) {
            $("#availability-status").html(data);
            $("#loaderIcon").hide(3000);
        }
    });
}

// user acoount Sign_up

$(document).ready(function () {
    $("#signupUser").on("click", function () {
        let btn = document.querySelector('#signupUser').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        $.ajax({
            url: base_url + "Sign_up/UserSignUp",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#signupUser").attr("disabled", "disabled");
                $("#signupUser").html('Please Wait...');
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $("#signupUser").attr("disabled", "disabled");
                    sAlert('success', dataResult.msg, dataResult.url);
                    document.getElementById("FormData").reset();
                } else if (dataResult.statusCode == 201) {
                    sAlert('error', dataResult.msg);
                }
            },
            complete: function () {
                $("#signupUser").removeAttr("disabled");
                document.querySelector('#signupUser').textContent = btn;
            },
        });
    });
});

//

$(document).ready(function () {
    $("#AccountotpVerification").on("click", function () {
        $("#resent").attr("disabled", "disabled");
        let btn = document.querySelector('#AccountotpVerification').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        $.ajax({
            url: base_url + "login/AccountVerification",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#AccountotpVerification").html('Please Wait...');
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $("#AccountotpVerification").attr("disabled", "disabled");
                    sAlert('success', dataResult.msg, dataResult.url);
                    document.getElementById("FormData").reset();
                } else if (dataResult.statusCode == 201) {
                    sAlert('error', dataResult.msg);
                }
            },
            complete: function () {
                document.querySelector('#AccountotpVerification').textContent = btn;
            },
        });
    });
});


$(document).ready(function () {
    $("#Accountresent").on("click", function () {
        let btn = document.querySelector('#Accountresent').textContent;
        let email = $("#email").val();
        let remaining = 'remaining';
        $.ajax({
            url: base_url + "login/AccountSentOTP",
            type: "POST",
            delay: 0,
            data: {
                email: email,
            },
            cache: false,
            beforeSend: function () {
                $("#Accountresent").html('Please Wait...');
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $("#Accountresent").attr("disabled", "disabled");
                    timer(remaining);
                    timer(120);
                    sAlert('success', dataResult.msg);
                } else if (dataResult.statusCode == 201) {
                    sAlert('error', dataResult.msg);
                }
            },
            complete: function () {
                document.querySelector('#Accountresent').textContent = btn;
            },
        });

    });
});


$(document).ready(function () {
    $("#PasswordUpdate").on("click", function () {
        let btn = document.querySelector('#PasswordUpdate').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let CurrentPassword = $("#CurrentPassword").val();
        let password = $("#password").val();
        let cpassword = $("#cpassword").val();
        if (password != "" && cpassword != "" && CurrentPassword != "") {
            $.ajax({
                url: base_url + "user/authentication/passwordUpdateCode",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#PasswordUpdate").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#PasswordUpdate").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#PasswordUpdate').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'All Fields Required');
        }
    });
});


$(document).ready(function () {
    $("#eqFormData").on("click", function () {
        let btn = document.querySelector('#eqFormData').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        $.ajax({
            url: base_url + "Inquiry/save",
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#eqFormData").html('Please Wait...');
            },
            success: function (dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $("#eqFormData").attr("disabled", "disabled");
                    sAlert('success', dataResult.msg, dataResult.url);
                    document.getElementById("FormData").reset();
                } else if (dataResult.statusCode == 201) {
                    sAlert('error', dataResult.msg);
                }
            },
            complete: function () {
                document.querySelector('#eqFormData').textContent = btn;
            },
        });
    });
});

$(document).ready(function () {
    $("#pay").on("click", function () {
        let btn = document.querySelector('#pay').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let transaction_no = $("#transaction_no").val();
        if (transaction_no != "") {
            $.ajax({
                url: base_url + "Checkout/payment",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#pay").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#pay").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#pay').textContent = btn;
                },
            });
        } else {
            sAlert('error', '* Fields Required');
        }
    });
});


function linkCopy() {
    // Get the text field
    var copyText = document.getElementById("affiliatelink");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
    // Alert the copied text
    sAlert('success', 'Copied The Affiliate Link');
}

$(document).on('click', '.view_data_user', function () {
    let id = $(this).attr("id");
    if (id != '') {
        $.ajax({
            url: base_url + "user/video/GetViewCourses",
            method: "POST",
            data: {
                id: id,
            },
            success: function (data) {
                $('#dataSet').html(data);
                $('#detailsModal').modal('show');
            }
        });
    }
});