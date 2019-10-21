  $(function(){

    $("#exzoom").exzoom({
  
      // thumbnail nav options
      
      
  
      // autoplay
      "autoPlay": true,
  
      // autoplay interval in milliseconds
      "autoPlayTimeout": 2000
      
    });
  
  });

  var id = $(".name").attr('id');

  $(document).on('change','.ch',function(){
    var subid = this.value;
    window.location.replace("index.php?id="+id+"&subId="+ subid);
  })