var inputField1 = document.getElementById("inputField1");
var inputField2 = document.getElementById("inputField2");
var inputField3 = document.getElementById("inputField3");
var inputField4 = document.getElementById("inputField4");

var inputCheck1 = document.getElementById("inputCheck1");
var inputCheck2 = document.getElementById("inputCheck2");
var inputCheck3 = document.getElementById("inputCheck3");
var inputCheck4 = document.getElementById("inputCheck4");

inputField1.onblur = function() {
    console.log("blur");
    inputCheck1.innerHTML = 'Please enter a correct email.'  
};


var email = document.getElementById("email");

//function validateEmail() {
//  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//  return re.test(String(email).toLowerCase());
//  email.setCustomValidity('');
//}



//var booking_email = $('input[name=booking_email]').val();

function validateEmail() {
  if( /(.+)@(.+){2,}\.(.+){2,}/.test(email) ){
    email.setCustomValidity('');
  } else {
    email.setCustomValidity('');
  }
}




email.onchange = validateEmail;
email.onkeyup = validateEmail;