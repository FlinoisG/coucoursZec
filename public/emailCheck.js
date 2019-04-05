var email = document.getElementById("email");

function validateEmail() {
  if( /(.+)@(.+){2,}\.(.+){2,}/.test(email) ){
    email.setCustomValidity('Mauvais email');
  } else {
    email.setCustomValidity('');
  }
}

email.onchange = validateEmail;
email.onkeyup = validateEmail;