<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Login</title>
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
<p>Please enter username and password to log in.</p>
<?php
echo $message;
?>
<form action="admin_log" method="post" onsubmit='return loginValidator()'>
<fieldset>
<legend>Login Information</legend>
<label for="txtUsername">Username:</label>
<input type="text" name="txtUsername" id="txtUsername" class="textEntry">
<br/><br/>
<label for="txtPassword">Password:</label>
<input type="password" name="txtPassword" id="txtPassword" class="textEntry">
<br/><br/>
</fieldset>
<p class="submitButton">
<input type="submit" name="button" id="button" value="Log In">
</p>
</form>

</div>
<div class="footer">
<div align="center">Quiz Game 2016 &copy;</div>
</div>
</div>



</body>
</html>
