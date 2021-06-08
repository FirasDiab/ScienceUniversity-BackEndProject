
function adminForm(){

var adminUser = document.getElementById("adminUser").value 
var adminEmail = document.getElementById("adminEmail").value 
var adminPassword = document.getElementById("adminPassword").value 

if( adminUser.length < 4) {
    document.getElementById("errorHandle").innerHTML = 'Wrong Input';
    return false;
}
if( (adminPassword.length < 8) && (adminPassword.length > 32)) {
    document.getElementById("errorHandle").innerHTML = 'Wrong Input';
    return false;
}
}


function editAdminForm(){

    var adminUser = document.getElementById("adminUser").value 
    var adminEmail = document.getElementById("adminEmail").value 
    var adminPassword = document.getElementById("adminPassword").value 
    
    if( adminUser.length < 4) {
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false;
    }
    if( (adminPassword.length < 8) && (adminPassword.length > 32)) {
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false;
    }
}

function courseForm(){

    var title = document.getElementById("title").value;
    var titleImg = document.getElementById("titleImg").value; 
    var altImg = document.getElementById("altImg").value; 
    
    if( (title.length > 100) || (titleImg.length > 100) || (altImg.length > 100)) {
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false;
    }
}
function editCourse(){

    var title = document.getElementById("title").value;
    var titleImg = document.getElementById("titleImg").value; 
    var altImg = document.getElementById("altImg").value; 
    
    if( (title.length > 100) || (titleImg.length > 100) || (altImg.length > 100)) {
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false;
    }
}

function newsForm(){

    var title = document.getElementById("text-input").value;
    var newsDate = document.getElementById("myDate").value;
    var todayDate = new Date(); //Today Date  
    var newDate = new Date(newsDate);   
    var nd = newDate.getTime(); 
    var td = todayDate.getTime(); 
    console.log(nd);
    console.log(td);
    
    if( title.length > 255) {
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false;
    }
    if (td <= nd) {    
        return true; 
     }else {    
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false; 
     }  
}
function editNews(){

    var title = document.getElementById("text-input").value;
    var body = document.getElementById("editor1").value;
    var newsDate = document.getElementById("myDate").value;
    var todayDate = new Date(); //Today Date  
    var newDate = new Date(newsDate);   
    var nd = newDate.getTime(); 
    var td = todayDate.getTime(); 
    console.log(nd);
    console.log(td);
    
    if( title.length > 255 || body.length < 1) {
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false;
    }
    if (td <= nd) {    
        return true; 
     }else {    
        document.getElementById("errorHandle").innerHTML = 'Wrong Input';
        return false; 
     }  
}
