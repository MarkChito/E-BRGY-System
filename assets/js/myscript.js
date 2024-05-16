$(document).ready(function(){
    
    $(".myadmin-alert .closed").click(function(event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);
        return false;
    });
    /* Click to close */
    $(".myadmin-alert-click").click(function(event) {
        $(this).fadeToggle(350);
        return false;
    });

    $('.dropify').dropify();

    img = $('#picData').val();
    if(!img==''){
        resetPreview('editimg', img,'ResidentImage.jpg');
    }

    profile = $('#profileData').val();
    if(!profile==''){
        resetPreview('avatar', profile,'ProfileImage.jpg');
    }

    $('#importRes').click(function(){
        
        if($('#input-file-now1').val()){
            $(".preloader").show();
        }
    });

    $(".colorpicker").asColorPicker();

    $("#select2").select2({
        placeholder: "Search House Number",
        minimumInputLength: 1,
		allowClear: true,
        ajax: {
            url: SITE_URL+'resident/search_house',
            dataType: 'json',
            delay: 250,
            data: function (data) {
                return {
                    searchTerm: data.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results:response
                };
            },
            cache: true
        }
    });

    // show password when toggle
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $('#open_cam').click(function(){
        Webcam.attach( '#my_camera' );
    });

    $('#open_cam1').click(function(){
        Webcam.attach( '#myprofile' );
    });

    $('#open_cam2').click(function(){
        Webcam.attach( '#userCam' );
    });
    $('#open_cam3').click(function(){
        Webcam.attach( '#myprofile3' );
    });

    $('.vstatus').change(function(){
        var val = $(this).val();
        if(val=='No'){
            $('.indetity').prop('disabled', 'disabled');
        }else{
            $('.indetity').prop('disabled', false);
        }
    });

    if( $('#bstatus').val() =='Settled'){
        $('#settled').show();
    }
    
    $('#bstatus').change(function(){
        var val = $(this).val();
        if(val=='Settled'){
            $('#settled').show();
        }else{
            $('#settled').hide();
        }
    });
});

$('#summernote').summernote({
    fontNames: ['Calibri', 'Arial Black', 'Comic Sans MS', 'Courier New'],
    tabsize: 2,
    height: 300,
    toolbar: [
        [ 'style', [ 'style' ] ],
        [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
        [ 'fontname', [ 'fontname' ] ],
        [ 'fontsize', [ 'fontsize' ] ],
        [ 'color', [ 'color' ] ],
        [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
        [ 'table', [ 'table' ] ],
        [ 'insert', [ 'link'] ],
        [ 'view', [ 'undo', 'redo', 'fullscreen', 'help' ] ]
    ]
});

function getAge() 
{
    var today = new Date();
    var birthDate = new Date($('#bdate').val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
   
    $('#age').val(age);
}
function  editService(that){
    title = $(that).attr('data-title');
    desc = $(that).attr('data-details');
    fees = $(that).attr('data-fees');
    phone = $(that).attr('data-phone');
    req = $(that).attr('data-req');
    stat = $(that).attr('data-stat');
    id = $(that).attr('data-id');

    $('#title').val(title);
    $('#stat').val(stat);
    $('#req').val(req);
    $('#desc').val(desc);
    $('#fees').val(fees);
    $('#phone').val(phone);
    $('#ser_id').val(id);
}

function editAnnouncement(that){
    what = $(that).attr('data-what');
    when = $(that).attr('data-date');
    where = $(that).attr('data-venue');
    who = $(that).attr('data-who');
    statu = $(that).attr('data-status');
    desc = $(that).attr('data-desc');
    id = $(that).attr('data-id');

    $('#what').val(what);
    $('#desc').val(desc);
    $('#when').val(convertTime(when));
    $('#where').val(where);
    $('#who').val(who);
    $('#status').val(statu);
    $('#announce_id').val(id);
    
}

// Initialize webcam
Webcam.set({
    height: 250,
    image_format: 'jpeg',
    jpeg_quality: 90
});

function save_photo() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('my_camera').innerHTML = 
        '<img src="'+data_uri+'" width="335" height="250" />';
        document.getElementById('profileImage').innerHTML = 
        '<input type="hidden" name="profileimg" value="'+data_uri+'"/>';
    } );
}


function save_photo1() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('myprofile').innerHTML = 
        '<img src="'+data_uri+'" width="335" height="250" />';
        document.getElementById('profileImage').innerHTML = 
        '<input type="hidden" name="profileimg" id="profileImage" value="'+data_uri+'"/>';
    } );
}
function save_photo2() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('userCam').innerHTML = 
        '<img src="'+data_uri+'" width="335" height="250" />';
        document.getElementById('profileImage').innerHTML = 
        '<input type="hidden" name="profileimg" id="profileImage" value="'+data_uri+'"/>';
    } );
}
function save_photo3() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('myprofile3').innerHTML = 
        '<img src="'+data_uri+'" width="335" height="250" />';
        document.getElementById('profileImage3').innerHTML = 
        '<input type="hidden" name="profileimg" id="profileImage" value="'+data_uri+'"/>';
    } );
}

function save_photo4() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('my_camera').innerHTML = 
        '<img src="'+data_uri+'" width="335" height="250" />';
        document.getElementById('profileImage4').innerHTML = 
        '<input type="hidden" name="profileimg" value="'+data_uri+'"/>';
    } );
}

$(function() {
    $("#print").on("click", function() {
        var mode = 'iframe'; //popup
        var close = mode == "popup";
        var options = {
            mode: mode,
            popClose: close
        };
        $("div.printableArea").printArea(options);
    });
});

function resetPreview(name, src, fname = '') {
    let input = $('input[name="' + name + '"]');
    let wrapper = input.closest('.dropify-wrapper');
    let preview = wrapper.find('.dropify-preview');
    let filename = wrapper.find('.dropify-filename-inner');
    let render = wrapper.find('.dropify-render').html('');

    input.val('').attr('title', fname);
    wrapper.removeClass('has-error').addClass('has-preview');
    filename.html(fname);

    render.append($('<img />').attr('src', src).css('max-height', input.data('height') || ''));
    preview.fadeIn();
}

function openBrgCert_Pment(){
    $('#b_cert_pment').modal('show');
}
function openIndiCert_Pment(){
    $('#i_cert_pment').modal('show');
}
function openResiCert_Pment(){
    $('#r_cert_pment').modal('show');
}
function openCustomCert_Pment(){
    $('#c_cert_pment').modal('show');
}
function openPermit_Pment(){
    $('#b_permit_pment').modal('show');
}

function editOfficial(that){
    id = $(that).attr('data-id');
    na = $(that).attr('data-name');
    chair = $(that).attr('data-chair');
    pos = $(that).attr('data-pos');
    start = $(that).attr('data-start');
    end = $(that).attr('data-end');
    status = $(that).attr('data-status');
    avatar = $(that).attr('data-avatar');
    
    $('#off_id').val(id);
    $('#name').val(na);
    $('#chair').val(chair);
    $('#position').val(pos);
    $('#start').val(start);
    $('#end').val(end);
    $('#status').val(status);
    
    if(avatar != ''){
        console.log(avatar);
        resetPreview('off_avatar', 'assets/uploads/avatar/'+avatar,'ProfileImage.jpg');
    }
    
}
function editPos(that){
    pos = $(that).attr('data-pos');
    order = $(that).attr('data-order');
    id = $(that).attr('data-id');

    $('#position').val(pos);
    $('#order').val(order);
    $('#pos_id').val(id);
}

function editChair(that){
    title = $(that).attr('data-title');
    id = $(that).attr('data-id');

    $('#chair').val(title);
    $('#chair_id').val(id);
}

function editPurok(that){
    purok = $(that).attr('data-name');
    details = $(that).attr('data-details');
    id = $(that).attr('data-id');

    $('#purok').val(purok);
    $('#details').val(details);
    $('#purok_id').val(id);
}

function editHouse(that){
    id = $(that).attr('data-id');
    number = $(that).attr('data-num');
    info = $(that).attr('data-info');

    $('#number').val(number);
    $('#details').val(info);
    $('#house_id').val(id);
}

function editPrecinct(that){
    precinct = $(that).attr('data-precinct');
    details = $(that).attr('data-details');
    id = $(that).attr('data-id');

    $('#precinct').val(precinct);
    $('#details').val(details);
    $('#precinct_id').val(id);
}

function editRelation(that){
    res_id = $(that).attr('data-res');
    rel = $(that).attr('data-rel');

    $('#res_id').val(res_id);
    $('#relation').val(rel);
}

function editPermit(that){
    id        = $(that).attr('data-id');
    bname     = $(that).attr('data-name');
    applied   = $(that).attr('data-applied');
    owner1    = $(that).attr('data-owner1');
    owner2    = $(that).attr('data-owner2');
    nature    = $(that).attr('data-nature');
    status    = $(that).attr('data-status');
    number    = $(that).attr('data-number');
    baddress  = $(that).attr('data-baddress');
    oaddress  = $(that).attr('data-oaddress');
	remarks   = $(that).attr('data-remarks');
    expired   = $(that).attr('data-expired');

    $('#id').val(id);
    $('#name').val(bname);
    $('#applied').val(applied);
    $('#owner1').val(owner1);
    $('#owner2').val(owner2);
    $('#nature').val(nature);
    $('#status').val(status);
    $('#number').val(number);
    $('#baddress').val(baddress);
    $('#oaddress').val(oaddress);
    $('#expired').val(expired);
    $('#remarks').val(remarks);

}

function updateCovid(that){
    id      = $(that).attr('data-id');
    dose    = $(that).attr('data-dose');
    vname   = $(that).attr('data-name');
    manu    = $(that).attr('data-manu');
    batch   = $(that).attr('data-batch');
    lot     = $(that).attr('data-lot');
    dose1   = $(that).attr('data-dose1');
    vname1  = $(that).attr('data-name1');
    manu1   = $(that).attr('data-manu1');
    batch1  = $(that).attr('data-batch1');
	lot1 	= $(that).attr('data-lot1');
    remarks = $(that).attr('data-remarks');
    status 	= $(that).attr('data-status');

    $('#res_id').val(id);
    $('#dose').val(dose);
    $('#vname').val(vname);
    $('#manu').val(manu);
    $('#batch').val(batch);
    $('#lot').val(lot);
    $('#dose1').val(dose1);
    $('#vname1').val(vname1);
    $('#manu1').val(manu1);
    $('#batch1').val(batch1);
    $('#lot1').val(lot1);
    $('#remarks').val(remarks);
    if(status=='Negative'){
        $("#nega").prop("checked", true);
    }else if(status=='Positive'){
        $("#posi").prop("checked", true);
    }else if(status=='Fully Vaccinated'){
        $("#fully").prop("checked", true);
    }else if(status=='Fully Vaccinated - Positive'){
        $("#fullyP").prop("checked", true);
    }else if(status=='1st Vaccine - Positive'){
        $("#1stP").prop("checked", true);
    }else{
        $("#1stvac").prop("checked", true);
    }

}

function editSummon(that){
    id = $(that).attr('data-id');
    update = $(that).attr('data-update');
    num = $(that).attr('data-num');
    dt = $(that).attr('data-dt');

    $('#id').val(id);
    $('#updates').val(update);
    $('#summon_no').val(num);
    $('#date_summon').val(convertTime(dt));
}

function convertTime(dateTime){
    var dateVal = new Date(dateTime);
    var day = dateVal.getDate().toString().padStart(2, "0");
    var month = (1 + dateVal.getMonth()).toString().padStart(2, "0");
    var hour = dateVal.getHours().toString().padStart(2, "0");
    var minute = dateVal.getMinutes().toString().padStart(2, "0");
    var sec = dateVal.getSeconds().toString().padStart(2, "0");
    var ms = dateVal.getMilliseconds().toString().padStart(3, "0");
    var inputDate = dateVal.getFullYear() + "-" + (month) + "-" + (day) + "T" + (hour) + ":" + (minute) + ":" + (sec) + "." + (ms);
    return inputDate;
}


