$(document).ready(function(){

    $("#userSave").click(function(e) {

        $("#user-form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {

                var formdata = new FormData(document.getElementById("user-form"));
                $.ajax({
                    type: "POST",
                    url: SITE_URL+"user_save",
                    dataType: "json",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        if (response.success == true) {
                            $("#user-form")[0].reset();
                            $('#add_user').modal('hide');
                            alertNotif(response.msg, 'success');
                            
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 2000);

                        } else {
                            $('.error-msg').show();
                            $('.error-msg').html(response.msg);
                        }
                    }
                });
            }
        });
    });

    $("#saveHouse").click(function(e) {

        e.preventDefault();
		var formdata = new FormData(document.getElementById("addHouse-form"));

        $.ajax({
            type: "POST",
            url: SITE_URL+"resident/saveHouse",
            dataType: "json",
            data: formdata,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                if (response.success == true) {
                    $("#addHouse-form")[0].reset();
                    alertNotif(response.msg, 'success');

                } else {
                    alertNotif(response.msg, 'error');
                }
            }
        });
 
    });

    $("#updateProfle").click(function(e) {

        e.preventDefault();
		var formdata = new FormData(document.getElementById("update-user-form"));
        $.ajax({
            type: "POST",
            url: SITE_URL+"auth/update_profile",
            dataType: "json",
            data: formdata,
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                if (response.success == true) {
                    $("#update-user-form")[0].reset();
                    $('#edit_profile').modal('hide');
                    alertNotif(response.msg, 'success');
                    
                    setTimeout(function() {
                        window.location.reload(1);
                    }, 2000);

                } else {
                    $('.error-msg1').show();
                    $('.error-msg1').html(response.msg);
                }
            }
        });
    });

    $("#changePass").click(function(e) {

        e.preventDefault();
		var formdata = new FormData(document.getElementById("change-pass-form"));
        var username = $('#username').val();

        if(username){
            $.ajax({
                type: "POST",
                url: SITE_URL+"auth/changePass",
                dataType: "json",
                data: formdata,
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    if (response.success == true) {
                        $("#change-pass-form")[0].reset();
                        $('#changepass').modal('hide');
                        alertNotif(response.msg, 'success');
                        
                        setTimeout(function() {
                            window.location.reload(1);
                        }, 2000);
    
                    } else {
                        $('.error-msg').show();
                        $('.error-msg').html(response.msg);
                    }
                }
            });
        }else{
            $('.error-msg').show();
            $('.error-msg').html('Username is required!');
        }
       
    });

    $("#update_brgy_info").click(function() {

        $("#brgy_info_form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {
                var formdata = new FormData(document.getElementById("brgy_info_form"));
                $.ajax({
                    type: "POST",
                    url: SITE_URL+"brgy_info_save",
                    dataType: "json",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(response) {
                        if (response.success == true) {
                            $("#brgy_info_form")[0].reset();
                            $('#barangay').modal('hide');
                            alertNotif(response.msg, 'success');
                            
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 2000);

                        } else {
                            $('.brgy-error-msg').show();
                            $('.brgy-error-msg').html(response.msg);
                        }
                    }
                });

            }
        });

		
    });

    $("#createResident").click(function() {

        $("#resident-form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {
                //Will execute only when the form passed validation.
                createRes();
            }
        });
    });

    $("#certIDform").validate({
        errorElement : 'span',
        errorClass: 'help-block',
        highlight: function(input) {
            $(input).parents('.form-group').addClass('has-error');
        },
        unhighlight: function(input) {
            $(input).parents('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    $("#edit-certIDform").validate({
        errorElement : 'span',
        errorClass: 'help-block',
        highlight: function(input) {
            $(input).parents('.form-group').addClass('has-error');
        },
        unhighlight: function(input) {
            $(input).parents('.form-group').removeClass('has-error');
        },
        errorPlacement: function(error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    $("#residentUpdate").click(function() {

        $("#update-resident-form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {
                //Will execute only when the form passed validation.
                editRes();
            }
        });
    });

    $("#createPermit").click(function() {

        $("#permit-form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {
                //Will execute only when the form passed validation.
                createPermit();
            }
        });
    });

    $("#updatePermit").click(function() {

        $("#update-permit-form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {
                //Will execute only when the form passed validation.
                updatePermit();
            }
        });
    });

    $("#createBlotter").click(function() {

        $("#blotter-form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {
                //Will execute only when the form passed validation.
                createBlotter();
            }
        });
    });

    $("#updateBlotter").click(function() {

        $("#update-blotter-form").validate({
            errorElement : 'span',
            errorClass: 'help-block',
            highlight: function(input) {
                $(input).parents('.form-group').addClass('has-error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-group').removeClass('has-error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function() {
                //Will execute only when the form passed validation.
                updateBlotter();
            }
        });
		
    });
})
function createBlotter(){
    var formdata = new FormData(document.getElementById("blotter-form"));
    $.ajax({
        type: "POST",
        url: SITE_URL+"blotter/save_blotter",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            if (response.success == true) {
                $("#blotter-form")[0].reset();
                alertNotif(response.msg, 'success');
                
                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            } else {
                alertNotif(response.msg, 'error');
            }
        }
    });
}
function updateBlotter(){
    var formdata = new FormData(document.getElementById("update-blotter-form"));
    $.ajax({
        type: "POST",
        url: SITE_URL+"blotter/update_blotter",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            if (response.success == true) { 
                alertNotif(response.msg, 'success');
                
                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            } else {
                alertNotif(response.msg, 'error');
            }
        }
    });
}

function updatePermit(){
    var formdata = new FormData(document.getElementById("update-permit-form"));
    $.ajax({
        type: "POST",
        url: SITE_URL+"business/update_permit",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            if (response.success == true) {
                $("#update-permit-form")[0].reset();
                $('#editPermit').modal('hide');
                alertNotif(response.msg, 'success');
                
                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            } else {
                alertNotif(response.msg, 'error');
            }
        }
    });
}
function createPermit(){
    var formdata = new FormData(document.getElementById("permit-form"));
    $.ajax({
        type: "POST",
        url: SITE_URL+"business/create_permit",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            if (response.success == true) {
                $("#permit-form")[0].reset();
                $('#addPermit').modal('hide');
                alertNotif(response.msg, 'success');
                
                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            } else {
                alertNotif(response.msg, 'error');
            }
        }
    });
}
function createRes(){
    var formdata = new FormData(document.getElementById("resident-form"));
    $.ajax({
        type: "POST",
        url: SITE_URL+"resident/save_resident",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            if (response.success == true) {
                $("#resident-form")[0].reset();
                alertNotif(response.msg, 'success');
                
                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            } else {
                alertNotif(response.msg, 'error');
            }
        }
    });
}
function editRes(){
    var formdata = new FormData(document.getElementById("update-resident-form"));
    $.ajax({
        type: "POST",
        url: SITE_URL+"resident/update_resident",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        cache: false,
        success: function(response) {
            console.log(response.msg)
            if (response.success == true) {
                alertNotif(response.msg, 'success');
                
                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            } else {
                alertNotif(response.msg, 'error');
            }
        }
    });
}

function requestStatus(that){
    var status = $(that).val();
    var id = $(that).attr('data-id');

    $.ajax({
        type: "POST",
        url: SITE_URL+"request/update_req/"+id,
        dataType: "json",
        data: {status:status},
        cache: false,
        success: function(response) {
            console.log(response.msg)
            if (response.success == true) {
                alertNotif(response.msg, 'success');
                
                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            } else {
                alertNotif(response.msg, 'error');
            }
        }
    });
}



function alertNotif(msg,state){
    if(state=='success'){
        $(".alertSuccess").fadeToggle(350);
        $('#msg').html(msg);
    }else{
        $(".alertError").fadeToggle(350);
        $('#alertErrorMessage').html(msg);
    }
    
}

function load_unseen_notification(view = ''){
    $.ajax({
        url: SITE_URL+"request/fetch/",
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
        $('#notification-msg').html(data.notification);
        if(data.unseen_notification > 0)
        {
            $('.count').html(data.unseen_notification);
        }
        }
    });
}

load_unseen_notification();
$('#notif').click(function(){
    $('.count').html('');
    load_unseen_notification('yes');
});

setInterval(function(){
    load_unseen_notification();
}, 5000);