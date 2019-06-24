
function collapse(){
    $(".sidenav").css('width','60px');
    $('.container').css('margin-left','60px');
    $('.it').css('display','none');
    $('#clsBtn').css('display','none');
    $('#sideHeading').css('font-size','15px');
    $('.links i').css('padding-left','20px');
}
var dash= document.getElementById('users');
dash.addEventListener('click',function(){
    alert('hello');
});

