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
    $(".categories").hide();
    $("#categories").removeClass('active');

}

function users(){
    $(".categories").hide();
    $(".dashboard").hide();
    $(".users").show();
    $(".orders").hide();
    $(".products").hide();
    $("#dashboard").removeClass('active');
    $("#users").addClass('active');
    $("#orders").removeClass('active');
    $("#products").removeClass('active');
    $("#categories").removeClass('active');
}

function orders(){
    $(".categories").hide();
    $(".dashboard").hide();
    $(".users").hide();
    $(".orders").show();
    $(".products").hide();
    $("#dashboard").removeClass('active')
    $("#users").removeClass('active');
    $("#orders").addClass('active');
    $("#products").removeClass('active');
    $("#categories").removeClass('active');
}

function products(){
    $(".categories").hide();
    $(".dashboard").hide();
    $(".users").hide();
    $(".orders").hide();
    $(".products").show();
    $("#dashboard").removeClass('active')
    $("#users").removeClass('active');
    $("#orders").removeClass('active');
    $("#products").addClass('active');
    $("#categories").removeClass('active');
}
function categories(){
    $(".categories").show();
    $(".dashboard").hide();
    $(".users").hide();
    $(".orders").hide();
    $(".products").hide();
    $("#dashboard").removeClass('active')
    $("#users").removeClass('active');
    $("#orders").removeClass('active');
    $("#products").removeClass('active');
    $("#categories").addClass('active');
}

function startup(){
    $(".dashboard").show();
    $(".users").hide();
    $(".orders").hide();
    $(".products").hide();
    $(".categories").hide();
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
      var Pid = $(this).attr('id');
      window.location.assign('products/index.php?id='+Pid);
  })

  var ex = document.querySelectorAll('.ex');

  ex.forEach(function(value){
      value.addEventListener('click',function(event){
          event.preventDefault();
      })
  })

var removeLink = ' <a class="remove" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>';
$('a.copy').relCopy({append: removeLink});

function saveCat(){
    var xhr = new XMLHttpRequest();
    var formdate = new FormData();
    formdate.append('catego', document.getElementById('catego').value);
    var subcategor = document.querySelectorAll('.subcatego');
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            if (this.readyState == 4 && this.status == 200){
                var xhr2 = new XMLHttpRequest();
                xhr2.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    $('.categoryList').html(this.responseText);
                 }
                }
                xhr2.open('GET','php/category.php?list=true',true);
                xhr2.send();
                    }
        }
    }
    subcategor.forEach(function(value,index){
        formdate.append('subcat['+index+']',value.value);
    })
    xhr.open('POST','php/category.php',true);
    xhr.send(formdate);
    
}

$(document).ready(function(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            $('.categoryList').html(this.responseText);
        }
    }
    xhr.open('GET','php/category.php?list=true',true);
    xhr.send();
})

$(document).on('click','.removeCat',function(){
    var id=$(this).attr('id');
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
        var xhr2 = new XMLHttpRequest();
        xhr2.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            $('.categoryList').html(this.responseText);
         }
        }
        xhr2.open('GET','php/category.php?list=true',true);
        xhr2.send();
            }
    }
    xhr.open('GET','php/category.php?action=delete&id='+id,true);
    xhr.send();
})

    $("select#ProductC").change(function(){
        var id = $(this).children("option:selected").attr('id');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                $('#ProductS').html(this.responseText);
                console.log(this.responseText);
            }
        }
        xhr.open('GET','php/category.php?listSub=true&id='+id,true);
        xhr.send();
    });

$(document).ready(function(){
        var id = $("#ProductC option:selected").attr('id');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                $('#ProductS').html(this.responseText);
                console.log(this.responseText);
            }
        }
        xhr.open('GET','php/category.php?listSub=true&id='+id,true);
        xhr.send();
});







