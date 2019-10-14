
var myUser = document.getElementById("txtuser");
var myPass = document.getElementById("txtPass");
var myScore = document.getElementById("txtscore");
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

myScore.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myUser.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myPass.onblur = function() {
  document.getElementById("message").style.display = "none";
}

myScore.onblur = function() {
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

myScore.onkeyup = function() {
  //   Validate lowercase letters password
var lowerCaseLetters = /[a-z]/g;
if(myScore.value.match(lowerCaseLetters)) {  
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
var numbers1 = /[0-9]/g;
if(myUser.value.match(numbers1)) {  
  number.classList.remove("invalid");
  number.classList.add("valid");
} else {
  number1.classList.remove("valid");
  number1.classList.add("invalid");
}

//Validate numbers Password
var numbers2 = /[0-9]/g;
if(myPass.value.match(numbers)) {  
  number.classList.remove("invalid");
  number.classList.add("valid");
} else {
  number.classList.remove("valid");
  number.classList.add("invalid");
}

var numbers3 = /[0-9]/g;
if(myScore.value.match(numbers3)) {  
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


// Validate length Score
if(myScore.value.length >= 0 && myScore.value.length <= 3) {
  length.classList.remove("invalid");
  length.classList.add("valid");
} else {
  length.classList.remove("valid");
  length.classList.add("invalid");
}


// var str = document.getElementById("txtA");
// var str = document.getElementById("txtBplus");
// var str = document.getElementById("txtB");
// var str = document.getElementById("txtCplus");
// var str = document.getElementById("txtC");
// var str = document.getElementById("txtDplus");
// var str = document.getElementById("txtD");

// function checkStr (val) {
//   var str = '<>&@#^*()_-+=/\?$!%.[]{},฿'; //ตัวอักษรที่ไม่ต้องการให้มี
//   if (val.indexOf("'")!= -1) return true //เครื่องหมาย '
//   if (val.indexOf('"')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('@')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('<')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('>')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('&')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('#')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('^')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('*')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('()')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('_')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('-')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('+')!= -1) return true //เครื่องหมาย "
//   if (val.indexOf('=')!= -1) return true //เครื่องหมาย "

//   for (i = 0; i < str.length; i++) {
//     if (val.indexOf(str.charAt(i))!= -1) return true
//   }
//   return false
// }

