<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quiz</title>
<script src="/quiz_extended/js/jquery-1.11.3.js"></script>
<script src="/quiz_extended/js/myvalidation.js"></script>
<link href="/quiz_extended/styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="wrapper">
<div class="header">WELCOME TO QUIZ GAME</div>
<div class="menu">
<ul>
<li><a href="/quiz_extended">Home</a></li>
<li><a href="/quiz_extended/welcome/admin">Admin</a></li>
</ul>
</div>
<div class="contents">


<div id="welcome">
<p>Welcome to quiz game! This quiz game is based on general knowledge and IQ.</p>
<fieldset>
<legend>User Information</legend>
<label for="txtEmail">E-Mail:</label>
<input name="txtEmail" id="txtEmail" type="text" class="textEntry">
<br/><br/>
</fieldset>
<p class="submitButton">
<button id="btnStart">Start Quiz</button>
</p>
</div> 

<div id="question">

<h2 id="pghQuestion"></h2>
<ul>
<li id="div_opt1"></li>
<li id="div_opt2"></li>
<li id="div_opt3"></li>
<li id="div_opt4"></li>
</ul>
</div>

<div id="result">
<h2 id="pghresult"></h2>
<fieldset>
<legend>Your previous attempts</legend>
<p id="pghPreviousAttempts"></p>
</fieldset>
<p class="submitButton">
<button id="btnRestart">Take Quiz Again</button>
</p>
</div>

</div>
<div class="footer">
<div align="center">Quiz Game 2016 &copy;</div>
</div>
</div>

<script>
var qindex = -1;
var marks = 0;
var email = null;
var uid = 0;
var qnum = 0;
var qidarray = [];

function showQuestion(qid){
	qnum++;
	
	$.get("http://localhost/quiz_extended/rest/resource/questioncount", function(data, status){ 
		  obj = JSON.parse(data);
		  if( qnum > obj.noofquestions){
			  showResult();
			  return;
		  }
		});
		
	$.get("http://localhost/quiz_extended/rest/resource/questions/qid/"+ qid, function(data, status){ 
		  obj = JSON.parse(data);
		  document.getElementById("pghQuestion").innerHTML =  qnum + ". " + obj[0].question;
		  document.getElementById("div_opt1").innerHTML = '<a href="#">' + obj[0].opt1 + '</a>';
		  document.getElementById("div_opt2").innerHTML = '<a href="#">' + obj[0].opt2 + '</a>';
		  document.getElementById("div_opt3").innerHTML = '<a href="#">' + obj[0].opt3 + '</a>';
		  document.getElementById("div_opt4").innerHTML = '<a href="#">' + obj[0].opt4 + '</a>';
		});
}

function updateMarks(qid, respond){
	$.get("http://localhost/quiz_extended/rest/resource/questions/qid/"+ qid, function(data, status){ 
		  obj = JSON.parse(data);
		  if(respond == obj[0].answer){
			  marks++;
		  }
		});
}

function getQuestionIds(){
	$.get("http://localhost/quiz_extended/rest/resource/questions", function(data, status){ 
		  obj = JSON.parse(data);
		  var n = 0;
		  for(qid in obj){
			 qidarray[n] = obj[n].qid;
			 n++;
		  }
		});
}

function showResult(){
	$.post("http://localhost/quiz_extended/rest", {score:marks, total:--qnum, uid:uid, operation:"score"}, function(data, status){
		  obj = JSON.parse(data);
			var i;
			var out = "<table border='1' cellspacing='0' cellpadding='3' width='100%'>";
			out += "<tr><th>Attempt No</th><th>Total Question</th><th>Score</th></tr>";
			for(i = 0; i < obj.length; i++) {
				out += "<tr><td>" +
				(i+1) +
				"</td><td>" +
				obj[i].total +
				"</td><td>" +
				obj[i].score +
				"</td></tr>";
			}
    out += "</table>";
    document.getElementById("pghPreviousAttempts").innerHTML = out;
		});
	
	$("#question").hide();
	document.getElementById("pghresult").innerHTML = "Congratulations! Your score is: " + marks;
	$("#result").show();
}

$(document).ready(function() {

	$("#div_opt1").click(function(){
		updateMarks(qidarray[qindex], 1);	
		showQuestion(qidarray[++qindex]);
	});
	
	$("#div_opt2").click(function(){
		updateMarks(qidarray[qindex], 2);	
		showQuestion(qidarray[++qindex]);
	});
	
	$("#div_opt3").click(function(){
		updateMarks(qidarray[qindex], 3);	
		showQuestion(qidarray[++qindex]);
	});
	
	$("#div_opt4").click(function(){
		updateMarks(qidarray[qindex], 4);	
		showQuestion(qidarray[++qindex]);
	});
	
	
	$("#btnStart").click(function(){
		var inputemail = document.getElementById("txtEmail").value;
		if(validateEmail()){
		$.post("http://localhost/quiz_extended/rest", {email:inputemail, operation:"user"}, function(data, status){
		  obj = JSON.parse(data);
		  uid = obj[0].uid;
		  email = obj[0].email;
		});
		
		showQuestion(qidarray[++qindex]);
		$("#welcome").hide();
		$("#question").show();
		}
	});
	
	$("#btnRestart").click(function(){
		qindex = -1;
		marks = 0;
		qnum = 0;
		getQuestionIds();
		showQuestion(qidarray[++qindex]);
		$("#result").hide();
		$("#question").show();
	});


$("#question").hide();
$("#result").hide();
getQuestionIds();
});

</script>
</body>
</html>
