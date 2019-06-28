    startup();
const modal = document.getElementById('modal');
const cls = document.getElementById('cls');
cls.addEventListener('click',modalD);

function collapse(){
    $(".sidenav").css('width','60px');
    $('.container').css('margin-left','60px');
    $('.it').css('display','none');
    $('#clsBtn').css('display','none');
    $('#sideHeading').css('font-size','15px');
    $('.links i').css('padding-left','20px');
}

function dashboard(){
    $(".dashboard").show();
    $("#dashboard").addClass('active');
    $(".users").hide();
    $("#users").removeClass('active');
    $(".orders").hide();
    $("#orders").removeClass('active');
    $(".products").hide();
    $("#products").removeClass('active');

}

function users(){
    $(".dashboard").hide();
    $(".users").show();
    $(".orders").hide();
    $(".products").hide();
    $("#dashboard").removeClass('active');
    $("#users").addClass('active');
    $("#orders").removeClass('active');
    $("#products").removeClass('active');
}

function orders(){
    $(".dashboard").hide();
    $(".users").hide();
    $(".orders").show();
    $(".products").hide();
    $("#dashboard").removeClass('active')
    $("#users").removeClass('active');
    $("#orders").addClass('active');
    $("#products").removeClass('active');
}

function products(){
    $(".dashboard").hide();
    $(".users").hide();
    $(".orders").hide();
    $(".products").show();
    $("#dashboard").removeClass('active')
    $("#users").removeClass('active');
    $("#orders").removeClass('active');
    $("#products").addClass('active');
}

function startup(){
    $(".dashboard").show();
    $(".users").hide();
    $(".orders").hide();
    $(".products").hide();
}

function modalD(){
    modal.style.display = "none";
}

function modalA(){
    modal.style.display="block";
}

