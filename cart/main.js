sum();


function sum(){
     var price = document.querySelectorAll('.p');
    var total = 0;
     price.forEach(function(value,index){
         var x = parseInt(value.innerHTML);
         var y = parseInt(document.querySelectorAll('.quantity')[index].value);
          total += (x*y);
     });
     document.getElementById('value').innerHTML = total;
}

var quantity = document.querySelectorAll('.quantity');

quantity.forEach(function(value,index){
     value.addEventListener('change',function(){
          var quan = document.querySelectorAll('.quantity')[index].value;
          var id =document.querySelectorAll('.id')[index].value;

          var xhr = new XMLHttpRequest();

          xhr.open('GET','addto.php?action=update&id=' + id + '&quantity='+quan,true);

          xhr.onload = function(){
               console.log(this.response);
          }

          xhr.send();

     });
});

