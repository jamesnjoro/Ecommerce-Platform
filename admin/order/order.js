var stat = document.querySelectorAll('.status');
stat.forEach(function(value,index){
    value.addEventListener('change',function(){
        xhr = new XMLHttpRequest();
        var id = document.querySelectorAll('.orderID')[index].value;
        xhr.open('GET','../php/orderupdate.php?action=updateStatus&id='+id +'&status='+value.value,true);
        xhr.load = function(){
            console.log(this.response);
        }

        xhr.send();
        alert('status changed');
    });
    
});