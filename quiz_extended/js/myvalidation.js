function validatePostQuestion(){
var elemQuestion = document.getElementById("txtquestion");
var elemOpt1 = document.getElementById("txtopt1");
var elemOpt2 = document.getElementById("txtopt2");
var elemOpt3 = document.getElementById("txtopt3");
var elemOpt4 = document.getElementById("txtopt4");
var elemAnswer = document.getElementById("txtanswer");
if(elemQuestion.value.length == 0){
alert("Enter a Question");
elemQuestion.focus();
return false;
}else if(elemOpt1.value.length == 0){
alert("Enter option one");
elemOpt1.focus();
return false;
}else if(elemOpt2.value.length == 0){
alert("Enter option two");
elemOpt2.focus();
return false;
}else if(elemOpt3.value.length == 0){
alert("Enter option threee");
elemOpt3.focus();
return false;
}else if(elemOpt4.value.length == 0){
alert("Enter option four");
elemOpt4.focus();
return false;
}else if(elemAnswer.value.length == 0){
alert("Enter an answer");
elemAnswer.focus();
return false;
}
return true;
}

function validateUpdateQuestion(){
var elemQuestion = document.getElementById("txtquestionupdate");
var elemOpt1 = document.getElementById("txtopt1update");
var elemOpt2 = document.getElementById("txtopt2update");
var elemOpt3 = document.getElementById("txtopt3update");
var elemOpt4 = document.getElementById("txtopt4update");
var elemAnswer = document.getElementById("txtanswerupdate");
if(elemQuestion.value.length == 0){
alert("Enter a Question");
elemQuestion.focus();
return false;
}else if(elemOpt1.value.length == 0){
alert("Enter option one");
elemOpt1.focus();
return false;
}else if(elemOpt2.value.length == 0){
alert("Enter option two");
elemOpt2.focus();
return false;
}else if(elemOpt3.value.length == 0){
alert("Enter option threee");
elemOpt3.focus();
return false;
}else if(elemOpt4.value.length == 0){
alert("Enter option four");
elemOpt4.focus();
return false;
}else if(elemAnswer.value.length == 0){
alert("Enter an answer");
elemAnswer.focus();
return false;
}
return true;
}

function loginValidator(){
var elemUsername = document.getElementById("txtUsername");
var elemPassword = document.getElementById("txtPassword");
if(elemUsername.value.length == 0){
alert("Enter an username");
elemUsername.focus();
return false;
}else if(elemPassword.value.length == 0){
alert("Enter a password");
elemPassword.focus();
return false;
}
return true;
}

function validateEmail() {
var elemEmail = document.getElementById("txtEmail");
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(regex.test(elemEmail.value)){
  return true;
  }else{
  alert("Enter a valid E-mail address");
  elemEmail.focus();
  return false;
  }
}