


function login(){
    var pass = document.getElementById('p-p-p');
    pass.setAttribute('type','text');
    //once you click on #aaa, #bbb will be displayed and #aaa will no longer be displayed
    document.getElementById('aaa').style.display="none";
    document.getElementById('bbb').style.display="block";
}


function lob(){
    var pass = document.getElementById('p-p-p');
    pass.setAttribute('type','password');
    //once you click on #bbb, #aaa will be displayed and #bbb will no longer be displayed
    document.getElementById('aaa').style.display="block";
    document.getElementById('bbb').style.display="none";
}

function record(){
    //once you click on this function, #p-a-t will be displayed
    document.getElementById('p-a-t').style.display="block";
}