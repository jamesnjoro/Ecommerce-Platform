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