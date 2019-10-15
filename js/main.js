window.onload = function(){
    var pic = document.getElementById('pic');
    pic.style.marginLeft = '0px';
    document.querySelector('.cart').style.display ='none';
};


function expandT(){
    var click = document.getElementsByClassName("categories")[0];
    
    if(click.className === "categories"){
        click.className+=" test";
        click.style.height ="210px"
    }else{
        click.className ="categories";
        click.style.height ="20px"
    }
}

var sub =document.querySelectorAll('.addto');

sub.forEach(eventadd);
 function eventadd(item,index){
     item.addEventListener('click', function(e){
         e.preventDefault();
         var name = document.getElementsByClassName('hidden_name')[index].value;
         var price = document.getElementsByClassName('hidden_price')[index].value;
         var id = document.getElementsByClassName('hidden_id')[index].value;
         var pic = document.getElementsByClassName('hidden_pic')[index].value;
         var param ='hidden_id='+id+'&hidden_price='+price+'&hidden_pic='+pic+'&hidden_name=' +name;
         var xhr = new XMLHttpRequest();

         xhr.open('POST', 'cart/addto.php', true);

         xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');

         xhr.onload = function(){
             var x =  JSON.parse(this.response);
             var num = document.querySelectorAll('.num');
             num.forEach(function(value){
                    value.innerHTML = x.two;
             });
             alert(x.one);
         }

         xhr.send(param); 
     });
 }
 
var cartT = document.querySelectorAll('.cartT');
cartT.forEach(function(value){
    value.addEventListener('click',function(){
        location.replace('cart/');
    });
});

$(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
  
        // Store hash
        var hash = this.hash;
  
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
     
          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });

  $(document).ready(function(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            $('#product').html(this.responseText);
        }
    }
    xhr.open('GET','product/viewProducts.php',true);
    xhr.send();
})