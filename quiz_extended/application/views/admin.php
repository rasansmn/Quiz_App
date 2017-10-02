<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
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

<table><tr><td valign="top">
<div id="updatequestion">
<fieldset>
<legend>Update or Delete Question</legend>
<label for="selectqid">Select Question ID:</label>
<select id="selectqid"></select>
<br/><br/>
<label for="txtquestionupdate">Question:</label>
<input id="txtquestionupdate" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt1update">Option one:</label>
<input id="txtopt1update" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt2update">Option two:</label>
<input id="txtopt2update" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt3update">Option three:</label>
<input id="txtopt3update" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt4update">Option four:</label>
<input id="txtopt4update" type="text" class="textEntry"/>
<br/><br/>
<label for="txtanswerupdate">Answer:</label>
<input id="txtanswerupdate" type="text" class="textEntry"/>
<br/><br/>
</fieldset>
<p class="submitButton">
<button id="btnDelete">Delete Question</button> <button id="btnUpdate">Update Question</button>
</p>
</div>
</td><td valign="top">
<div id="postquestion">
<fieldset>
<legend>Post New Question</legend>
<label for="txtquestion">Question:</label>
<input id="txtquestion" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt1">Option one:</label>
<input id="txtopt1" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt2">Option two:</label>
<input id="txtopt2" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt3">Option three:</label>
<input id="txtopt3" type="text" class="textEntry"/>
<br/><br/>
<label for="txtopt4">Option four:</label>
<input id="txtopt4" type="text" class="textEntry"/>
<br/><br/>
<label for="txtanswer">Answer:</label>
<input id="txtanswer" type="text" class="textEntry"/>
<br/><br/>
</fieldset>
<p class="submitButton">
<button id="btnPost">Post Question</button>
</p>
</div>
</td></tr></table>

</div>

<div class="footer">
<div align="center">Quiz Game 2016 &copy;</div>
</div>
</div>

<script>

$(document).ready(function() {
	
	$("#btnPost").click(function(){
	if(validatePostQuestion()){
		var question = document.getElementById("txtquestion").value;
		var opt1 = document.getElementById("txtopt1").value;
		var opt2 = document.getElementById("txtopt2").value;
		var opt3 = document.getElementById("txtopt3").value;
		var opt4 = document.getElementById("txtopt4").value;
		var answer = document.getElementById("txtanswer").value;
		$.post("http://localhost/quiz_extended/rest", {txtquestion:question,txtopt1:opt1,txtopt2:opt2,txtopt3:opt3,txtopt4:opt4, txtanswer:answer, operation:"create"}, function(data, status){
		  obj = JSON.parse(data);
		  alert("New question posted successfully: " + "question id: " + obj.insert_id);
		});
	}
	});
	
	$("#btnUpdate").click(function(){
	if(validateUpdateQuestion()){
		var qid = document.getElementById("selectqid").value;
		var question = document.getElementById("txtquestionupdate").value;
		var opt1 = document.getElementById("txtopt1update").value;
		var opt2 = document.getElementById("txtopt2update").value;
		var opt3 = document.getElementById("txtopt3update").value;
		var opt4 = document.getElementById("txtopt4update").value;
		var answer = document.getElementById("txtanswerupdate").value;
		$.post("http://localhost/quiz_extended/rest", {txtqid:qid,txtquestion:question,txtopt1:opt1,txtopt2:opt2,txtopt3:opt3,txtopt4:opt4, txtanswer:answer, operation:"update"}, function(data, status){
		  obj = JSON.parse(data);
		  alert("Question updated successfully: Updated ID: " + obj.qid);
		});
	}
	});
	
	$("#btnDelete").click(function(){
	if(confirm('Are you sure you want to delete selected question?')){
		var qid = document.getElementById("selectqid").value;
		$.post("http://localhost/quiz_extended/rest", {txtqid:qid, operation:"delete"}, function(data, status){
		  obj = JSON.parse(data);
		  alert("Question deleted successfully: Updated ID: " + obj.qid);
		});
	}
	});
	
	$.get("http://localhost/quiz_extended/rest/resource/questions", function(data, status){ 
		  
		  obj = JSON.parse(data);
		  var out = "";	
		  var n = 0;
		  for(qid in obj){
			 out += '<option id=' + obj[n].qid + '>' +  obj[n].qid + '</option>';
			 n++;
		  }
		  $("#selectqid").append(out);
		});
		
	$("#selectqid").change(function(){
		$.get("http://localhost/quiz_extended/rest/resource/questions/qid/"+ document.getElementById("selectqid").value, function(data, status){ 
		  obj = JSON.parse(data);
		  document.getElementById("txtquestionupdate").value = obj[0].question;
		  document.getElementById("txtopt1update").value = obj[0].opt1;
		  document.getElementById("txtopt2update").value = obj[0].opt2;
		  document.getElementById("txtopt3update").value = obj[0].opt3;
		  document.getElementById("txtopt4update").value = obj[0].opt4;
		  document.getElementById("txtanswerupdate").value = obj[0].answer;
		});
	});

});

</script>
</body>
</html>
