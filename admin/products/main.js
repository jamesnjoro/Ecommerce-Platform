const modal = document.getElementById('modal');
const cls = document.getElementById('cls');
cls.addEventListener('click',modalD);
function modalD(){
    modal.style.display = "none";
}

function modalA(){
    modal.style.display="block";
}

var photo = document.querySelectorAll('.photo');

photo.forEach(function(value,index){
   value.addEventListener('click',function(event){
       event.preventDefault();
       var xhr = new XMLHttpRequest();
       xhr.onreadystatechange = function(){
           if(this.readyState== 4 && this.status==200){
               $('.content').html(this.responseText);
           }
       }

       xhr.open('GET','photoview.php?id='+value.id,true);
       xhr.send();
       modalA();
   })
})

$(document).on('click','.del', function(){
    var id =$(this).attr('id');
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState== 4 && this.status==200){
            var xhr2 = new XMLHttpRequest();
            xhr2.onreadystatechange = function(){
                     if(this.readyState== 4 && this.status==200){
                        $('.content').html(this.responseText);
                         }
       }
       var subid = document.getElementById('subid').value;
       xhr2.open('GET','photoview.php?id='+subid,true);
       xhr2.send();
        }
    }
    xhr.open('GET','update.php?action=delete&id='+id,true);
    xhr.send();
    

})


function upload(file) {
    let xhr = new XMLHttpRequest();
    var formdata = new FormData();
    formdata.append('files',file);
    var subid = document.getElementById('subid').value;
    formdata.append('subid',subid);
    // track upload progress
    xhr.upload.onprogress = function(event) {
      console.log(`Uploaded ${event.loaded} of ${event.total}`);
    };
  
    // track completion: both successful or not
    xhr.onloadend = function() {
      if (xhr.status == 200) {
        console.log("success");
        if(this.readyState== 4 && this.status==200){
            var xhr2 = new XMLHttpRequest();
            xhr2.onreadystatechange = function(){
                     if(this.readyState== 4 && this.status==200){
                        $('.content').html(this.responseText);
                         }
       }
       var subid = document.getElementById('subid').value;
       xhr2.open('GET','photoview.php?id='+subid,true);
       xhr2.send();
        }
      } else {
        console.log("error " + this.status);
      }
    };
  
    xhr.open("POST", "update.php");
    xhr.send(formdata);
  }
  


