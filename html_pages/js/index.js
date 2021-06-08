document.getElementById('newsimg0').addEventListener("mouseenter", function(){
    document.getElementById('newsimg0').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsimg0').addEventListener("mouseleave", function(){
    document.getElementById('newsimg0').style.cssText = "height: 51px; transition: 1s";
}); 
document.getElementById('newsimg1').addEventListener("mouseenter", function(){
    document.getElementById('newsimg1').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsimg1').addEventListener("mouseleave", function(){
    document.getElementById('newsimg1').style.cssText = "height: 51px; transition: 1s";
}); 

document.getElementById('newsimg2').addEventListener("mouseenter", function(){
    document.getElementById('newsimg2').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsimg2').addEventListener("mouseleave", function(){
    document.getElementById('newsimg2').style.cssText = "height: 51px; transition: 1s";
}); 

document.getElementById('newsimg3').addEventListener("mouseenter", function(){
    document.getElementById('newsimg3').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsimg3').addEventListener("mouseleave", function(){
    document.getElementById('newsimg3').style.cssText = "height: 51px; transition: 1s";
}); 



document.getElementById('newsImage0').addEventListener("mouseenter", function(){
    document.getElementById('newsimg0').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsImage0').addEventListener("mouseleave", function(){
    document.getElementById('newsimg0').style.cssText = "height: 51px; transition: 1s";
}); 
document.getElementById('newsImage1').addEventListener("mouseenter", function(){
    document.getElementById('newsimg1').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsImage1').addEventListener("mouseleave", function(){
    document.getElementById('newsimg1').style.cssText = "height: 51px; transition: 1s";
}); 

document.getElementById('newsImage2').addEventListener("mouseenter", function(){
    document.getElementById('newsimg2').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsImage2').addEventListener("mouseleave", function(){
    document.getElementById('newsimg2').style.cssText = "height: 51px; transition: 1s";
}); 

document.getElementById('newsImage3').addEventListener("mouseenter", function(){
    document.getElementById('newsimg3').style.cssText = "height: 100%; line-height: 263px; transition: 1s";
}); 
document.getElementById('newsImage3').addEventListener("mouseleave", function(){
    document.getElementById('newsimg3').style.cssText = "height: 51px; transition: 1s";
}); 




var Uname = document.getElementById('name');
var Email = document.getElementById('email');
var Mobile = document.getElementById('mobile');
var Message = document.getElementById('message');
document.getElementById('nameValidation').style.display = 'none';
document.getElementById('emailValidation').style.display = 'none';
document.getElementById('numberValidation').style.display = 'none';
document.getElementById('msgValidation').style.display = 'none';

function contactForm(){
    //username validation
    if( Uname.value.length < 3){
    document.getElementById('nameValidation').style.display = 'block';
    Uname.classList.add('is-invalid');
    }
    else {
        document.getElementById('nameValidation').style.display = 'none';
        Uname.classList.remove('is-invalid');
    }
     // Email Validation 
    var mailformat = /^[a-zA-Z0-9.!]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z]+)*$/;
    var inputemail = document.getElementById('email').value;
    if(inputemail.match(mailformat)){
        document.getElementById('emailValidation').style.display = 'none';
        Email.classList.remove('is-invalid');
    }
    else {
        document.getElementById('emailValidation').style.display = 'block';
        Email.classList.add('is-invalid');
    }
    // Phone number Validation 
    var phoneNumber = ("^(?:00|\\+)(?=.*[0-9])(?=.{12,})");
    var usernumber = document.getElementById('mobile').value;
    if(usernumber.match(phoneNumber)){
        document.getElementById('numberValidation').style.display = 'none';
        Mobile.classList.remove('is-invalid');
    } else {
        document.getElementById('numberValidation').style.display = 'block';
        Mobile.classList.add('is-invalid');
    }
    //message validation
    if( (Message.value.length < 20) && (Message.value.length > 255)){
        document.getElementById('msgValidation').style.display = 'block';
        Message.classList.add('is-invalid');
        }
        else {
            document.getElementById('msgValidation').style.display = 'none';
            Message.classList.remove('is-invalid');
        }
}