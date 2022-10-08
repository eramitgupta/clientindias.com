
// delete AccountsDelete user
$(document).ready(function () {
    $('.AccountsDelete').click(function (e) {
        e.preventDefault();
        var deleteid = $(this)
            .closest("tr").find(
                '.deletevalue')
            .val();
        // console.log(deleteid)
        swal({
            title: "Are you sure?",
            text: "Do you want to remove!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        delay: 0,
                        url: base_url + "admin/deleteLogin",
                        data: {
                            "delete_id": deleteid,
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#" + deleteid).remove();
                                sAlert('success', dataResult.msg);
                            } else if (dataResult.statusCode == 201) {
                                sAlert('error', dataResult.msg);
                            }
                        }
                    });
                }
            });
    });
});

// user password update
$(document).ready(function () {
    $("#UserPasswordUpdate").on("click", function () {
        let btn = document.querySelector('#UserPasswordUpdate').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let CurrentPassword = $("#CurrentPassword").val();
        let password = $("#password").val();
        let cpassword = $("#cpassword").val();
        if (password != "" && cpassword != "" && CurrentPassword != "") {
            $.ajax({
                url: base_url + "admin/user/passwordUpdateCode",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
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
                    document.querySelector('#UserPasswordUpdate').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'All Fields Required');
        }
    });
});

// admin passwordUpdateCode
$(document).ready(function () {
    $("#PasswordUpdate").on("click", function () {
        let btn = document.querySelector('#PasswordUpdate').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let CurrentPassword = $("#CurrentPassword").val();
        let password = $("#password").val();
        let cpassword = $("#cpassword").val();
        if (password != "" && cpassword != "" && CurrentPassword != "") {
            $.ajax({
                url: base_url + "admin/authentication/passwordUpdateCode",
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


// delete Accounts admin
$(document).ready(function () {
    $('.AccountsDelete').click(function (e) {
        e.preventDefault();
        var deleteid = $(this)
            .closest("tr").find(
                '.deletevalue')
            .val();
        // console.log(deleteid)
        swal({
            title: "Are you sure?",
            text: "Do you want to remove!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        delay: 0,
                        url: base_url + "admin/authentication/deleteLogin",
                        data: {
                            "delete_id": deleteid,
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#" + deleteid).remove();
                                sAlert('success', dataResult.msg);
                            } else if (dataResult.statusCode == 201) {
                                sAlert('error', dataResult.msg);
                            }
                        }
                    });
                }
            });
    });
});

// check PasswordvStrength

function checkPasswordStrength() {
    let number = /([0-9])/;
    let alphabets = /([a-zA-Z])/;
    let special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
    if ($('#password').val().length < 6) {
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('weak-password');
        $('#password-strength-status').html("Weak (should be atleast 6 characters.)");
    } else {
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
        $("#password-strength-status").hide();
        if ($('#password').val() != "" && $('#cpassword').val() !=
            "") {
            if ($('#password').val() == $('#cpassword').val()) {
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

// delete Category
$(document).ready(function () {
    $('.CategoryDelete').click(function (e) {
        e.preventDefault();
        var deleteid = $(this)
            .closest("tr").find(
                '.deletevalue')
            .val();
        // console.log(deleteid)
        swal({
            title: "Are you sure?",
            text: "Do you want to remove!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        delay: 0,
                        url: base_url + "admin/category/delete",
                        data: {
                            "delete_id": deleteid,
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#" + deleteid).remove();
                                sAlert('success', dataResult.msg);
                            } else if (dataResult.statusCode == 201) {
                                sAlert('error', dataResult.msg);
                            }
                        }
                    });
                }
            });
    });
});


// delete Banner
$(document).ready(function () {
    $('.BannerDelete').click(function (e) {
        e.preventDefault();
        var deleteid = $(this)
            .closest("tr").find(
                '.deletevalue')
            .val();
        // console.log(deleteid)
        swal({
            title: "Are you sure?",
            text: "Do you want to remove!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        delay: 0,
                        url: base_url + "admin/banner/delete",
                        data: {
                            "delete_id": deleteid,
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#" + deleteid).remove();
                                sAlert('success', dataResult.msg);
                            } else if (dataResult.statusCode == 201) {
                                sAlert('error', dataResult.msg);
                            }
                        }
                    });
                }
            });
    });
});
// Delete Inquiry web
$(document).ready(function () {
    $('.DeleteInquiry').click(function (e) {
        e.preventDefault();
        var deleteid = $(this)
            .closest("tr").find(
                '.deletevalue')
            .val();
        // console.log(deleteid)
        swal({
            title: "Are you sure?",
            text: "Do you want to remove!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        delay: 0,
                        url: base_url + "admin/inquiry/delete",
                        data: {
                            "delete_id": deleteid,
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#" + deleteid).remove();
                                sAlert('success', dataResult.msg);
                            } else if (dataResult.statusCode == 201) {
                                sAlert('error', dataResult.msg);
                            }
                        }
                    });
                }
            });
    });
});


// courses upload data

$(document).ready(function () {
    $("#uploadCourse").on("click", function () {
        let btn = document.querySelector('#uploadCourse').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let uploadVideoFile = $("#file").val();
        let category = $("#category").val();
        if (category != "") {
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            if (uploadVideoFile != "") {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }
                    }, false);
                    return xhr;
                },
                url: base_url + "admin/courses/UploadCourse",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    if (uploadVideoFile != "") {
                        $(".progress-bar").width('0%');
                    }
                    $("#uploadCourse").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#uploadCourse").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#uploadCourse').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'Course Name Required*');
        }
    });
});

// UpdateUpload Course

$(document).ready(function () {
    $("#UpdateUploadCourse").on("click", function () {
        let btn = document.querySelector('#UpdateUploadCourse').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let uploadVideoFile = $("#file").val();
        let category = $("#category").val();
        if (category != "") {
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            if (uploadVideoFile != "") {
                                var percentComplete = ((evt.loaded / evt.total) * 100);
                                $(".progress-bar").width(percentComplete + '%');
                                $(".progress-bar").html(percentComplete + '%');
                            }
                        }
                    }, false);
                    return xhr;
                },
                url: base_url + "admin/courses/UploadCourseUpdate",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    if (uploadVideoFile != "") {
                        $(".progress-bar").width('0%');
                    }
                    $("#UpdateUploadCourse").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#UpdateUploadCourse").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#UpdateUploadCourse').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'Course Name Required*');
        }
    });
});

//CourseDataDelete

$(document).ready(function () {
    $('.CourseDataDelete').click(function (e) {
        e.preventDefault();
        var deleteid = $(this)
            .closest("tr").find(
                '.deletevalue')
            .val();
        // console.log(deleteid)
        swal({
            title: "Are you sure?",
            text: "Do you want to remove!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        delay: 0,
                        url: base_url + "admin/courses/delete",
                        data: {
                            "delete_id": deleteid,
                        },
                        success: function (dataResult) {
                            var dataResult = JSON.parse(dataResult);
                            if (dataResult.statusCode == 200) {
                                $("#" + deleteid).remove();
                                sAlert('success', dataResult.msg);
                            } else if (dataResult.statusCode == 201) {
                                sAlert('error', dataResult.msg);
                            }
                        }
                    });
                }
            });
    });
});


// view data
$(document).on('click', '.view_data', function () {
    let id = $(this).attr("id");
    if (id != '') {
        $.ajax({
            url: base_url + "admin/courses/GetViewCourses",
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

$(document).on('click', '.user_income_view', function () {
    let id = $(this).attr("id");
    let name = $(this).attr("name");
    let value = $(this).attr("value");
    $("#summary1").attr('data-name', name);
    $("#summary2").attr('data-name', name);
    $("#summary3").attr('data-name', name);
    document.getElementById("summary1").name = id;
    document.getElementById("summary2").name = id;
    document.getElementById("summary3").name = id;
    $('#exampleModalScrollableTitle').html('View Income' + ' ' + name + ' Wallet Bal ' + ' ₹ ' + value);
    if (id != '') {
        $.ajax({
            url: base_url + "admin/user/UserIncomeView",
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

$(document).on('click', '.user_income_view_summary', function () {
    let data = $(this).attr("data");
    let id = $(this).attr("name");
    let value = $(this).attr("value");
    let UserName = $(this).attr("data-name");

    $('#exampleModalScrollableTitle').html('View Income' + ' '+ UserName + ' ' + value);
    if (id != '') {
        $.ajax({
            url: base_url + "admin/user/UserIncomeViewSummary",
            method: "POST",
            data: {
                id: id,
                value: value,
            },
            success: function (data) {
                $('#dataSet').html(data);
                $('#detailsModal').modal('show');
            }
        });
    }
});

$(document).on('click', '.user_income_view_manger_summary', function () {
    let data = $(this).attr("data");
    let id = $(this).attr("name");
    let value = $(this).attr("value");
    let UserName = $(this).attr("data-name");

    $('#exampleModalScrollableTitle').html('View Income' + ' '+ UserName + ' ' + value);
    if (id != '') {
        $.ajax({
            url: base_url + "manger/user/UserIncomeViewSummary",
            method: "POST",
            data: {
                id: id,
                value: value,
            },
            success: function (data) {
                $('#dataSet').html(data);
                $('#detailsModal').modal('show');
            }
        });
    }
});
// manger
$(document).on('click', '.user_income_view_manger', function () {
    let id = $(this).attr("id");
    let name = $(this).attr("name");
    let value = $(this).attr("value");
    $("#summary1").attr('data-name', name);
    $("#summary2").attr('data-name', name);
    $("#summary3").attr('data-name', name);
    document.getElementById("summary1").name = id;
    document.getElementById("summary2").name = id;
    document.getElementById("summary3").name = id;
    $('#exampleModalScrollableTitle').html('View Income' + ' ' + name + ' Wallet Bal ' + ' ₹ ' + value);
    if (id != '') {
        $.ajax({
            url: base_url + "manger/user/UserIncomeView",
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

function linkCopy() {
    // Get the text field
    var copyText = document.getElementById("affiliatelink");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
    // Alert the copied text
    alert("Copied the text: " + copyText.value);
}

// pay by user admin panel
$(document).on('click', '.user_income_pay', function () {
    let id = $(this).attr("id");
    let name = $(this).attr("name");
    let value = $(this).attr("value");
    $('#PayModalScrollableTitle').html(name + ', Wallet Bal, ' + ' ₹ ' + value);
    document.getElementById("id").value = id;
    $('#detailsModal').modal('show');
});

$(document).on('click', '.user_income_pay_manger', function () {
    let id = $(this).attr("id");
    let name = $(this).attr("name");
    let value = $(this).attr("value");
    $('#PayModalScrollableTitle').html(name + ', Wallet Bal, ' + ' ₹ ' + value);
    document.getElementById("id").value = id;
    $('#detailsModal').modal('show');
});

$(document).ready(function () {
    $("#PayUserSend").on("click", function () {
        let btn = document.querySelector('#PayUserSend').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let amount = $("#amount").val();
        let transaction_no = $("#transaction_no").val();
        let file = $("#file").val();
        if (amount != "" && transaction_no != "" && file != "") {
            $.ajax({
                url: base_url + "admin/user/SendUserPay",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#PayUserSend").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#PayUserSend").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        $('#detailsModal').modal('show');
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#PayUserSend').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'All Fields Required');
        }
    });
});

$(document).ready(function () {
    $("#PayUserSendManger").on("click", function () {
        let btn = document.querySelector('#PayUserSendManger').textContent;
        formData = new FormData(document.forms.namedItem("FormData"));
        let amount = $("#amount").val();
        let transaction_no = $("#transaction_no").val();
        let file = $("#file").val();
        if (amount != "" && transaction_no != "" && file != "") {
            $.ajax({
                url: base_url + "manger/user/SendUserPay",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $("#PayUserSendManger").html('Please Wait...');
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $("#PayUserSendManger").attr("disabled", "disabled");
                        sAlert('success', dataResult.msg, dataResult.url);
                        document.getElementById("FormData").reset();
                    } else if (dataResult.statusCode == 201) {
                        $('#detailsModal').modal('show');
                        sAlert('error', dataResult.msg);
                    }
                },
                complete: function () {
                    document.querySelector('#PayUserSendManger').textContent = btn;
                },
            });
        } else {
            sAlert('error', 'All Fields Required');
        }
    });
});