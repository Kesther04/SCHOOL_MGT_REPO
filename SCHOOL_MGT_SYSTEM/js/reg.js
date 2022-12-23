
function login(){
    var pass = document.getElementById('p-pass');
    pass.setAttribute('type','text');
    document.getElementById('tock').style.display="none";
    document.getElementById('pock').style.display="block";
}


function lob(){
    var pass = document.getElementById('p-pass');
    pass.setAttribute('type','password');
    document.getElementById('tock').style.display="block";
    document.getElementById('pock').style.display="none";
}
