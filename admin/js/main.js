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
    $('#exp').css('display','block');
}

function exp(){
    $(".sidenav").css('width','250px');
    $('.container').css('margin-left','250px');
    $('.it').css('display','');
    $('#clsBtn').css('display','block');
    $('#sideHeading').css('font-size','20px');
    $('.links i').css('padding-left','20px');
    $('#exp').css('display','none');
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

var stat = document.querySelectorAll('.status');

stat.forEach(function(value,index){
    value.addEventListener('change',function(){
        xhr = new XMLHttpRequest();
        var id = document.querySelectorAll('.orderID')[index].innerHTML;
        xhr.open('GET','php/orderupdate.php?action=updateStatus&id='+id +'&status='+value.value,true);
        xhr.load = function(){
            console.log(this.response);
        }

        xhr.send();
        alert('status changed');
    });
    
});

var ord = document.querySelectorAll('.ord');

ord.forEach(function(value,index){
    value.addEventListener('click',function(){
        var id = document.querySelectorAll('.orderID')[index].innerHTML;
        window.location.replace('order/order.php?action=viewOrder&id='+id);
    });
});

var dele = document.querySelectorAll('.dele');

dele.forEach(function(value,index){
    value.addEventListener('click', function(){
        var id = document.querySelectorAll('.Pid')[index].value;
        xhr = new XMLHttpRequest();
        xhr.open("GET","php/delete.php?action=deleteProduct&id="+id,true);
        xhr.send();
        window.location.reload();
    });
});
    
$(function(){
    var removeLink = ' <a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>';
     
    $('a.clon').relCopy({ append: removeLink});
    });

    $(document).ready(function(){
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                $('.products').html(this.responseText);
            }
        }
        xhr.open('GET','products/viewp.php?page=1',true);
        xhr.send();
    })

  $(document).on('click','.pagenum', function(){
      var page = $(this).attr('id');
      var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                $('.products').html(this.responseText);
            }
        }
        xhr.open('GET','products/viewp.php?page=' +page,true);
        xhr.send();
  })

  $(document).on('click','.productRow',function(){
      alert($(this).attr('id'));
  })
    