
var myUser = document.getElementById("txtuser");
var myPass = document.getElementById("txtPass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
myUser.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

myPass.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myUser.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myPass.onblur = function() {
  document.getElementById("message").style.display = "none";
}


myUser.onkeyup = function() {
    //   Validate lowercase letters user
  var lowerCaseLetters = /[a-z]/g;
  if(myUser.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
}

  myPass.onkeyup = function() {
    //   Validate lowercase letters password
  var lowerCaseLetters = /[a-z]/g;
  if(myPass.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
}
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myUser.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }


  var upperCaseLetters = /[A-Z]/g;
  if(myPass.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }


 // Validate numbers Username
var numbers = /[0-9]/g;
if(myUser.value.match(numbers)) {  
  number.classList.remove("invalid");
  number.classList.add("valid");
} else {
  number.classList.remove("valid");
  number.classList.add("invalid");
}

//Validate numbers Password
var numbers = /[0-9]/g;
if(myPass.value.match(numbers)) {  
  number.classList.remove("invalid");
  number.classList.add("valid");
} else {
  number.classList.remove("valid");
  number.classList.add("invalid");
}

// Validate length Username
if(myUser.value.length >= 5) {
  length.classList.remove("invalid");
  length.classList.add("valid");
} else {
  length.classList.remove("valid");
  length.classList.add("invalid");
}


// Validate length Pass
if(myPass.value.length >= 5) {
  length.classList.remove("invalid");
  length.classList.add("valid");
} else {
  length.classList.remove("valid");
  length.classList.add("invalid");
}





