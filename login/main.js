    var text = document.getElementById('text');
    var link = document.getElementById('link');
    var linkT = document.getElementById('linkT');
    var username = document.getElementById('username');

link.addEventListener('click', statechange);

function statechange(){
    
    if(link.className == ""){
        $('#username').show()
        text.innerHTML = "Already have an account?";
        linkT.innerHTML = "SignIn";
        link.className ="s";
    }else{
        $('#username').hide();
        text.innerHTML = "Don't You have an account?";
        link.className = "";
        linkT.innerHTML = "SignUp";
    }
}

function startup(){
    $('#username').hide();
    text.innerHTML = "Don't You have an account?";
    link.className = "";
    linkT.innerHTML = "SignUp";
}

startup();