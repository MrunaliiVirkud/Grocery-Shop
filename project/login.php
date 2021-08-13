<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<style type="text/css">
	body{
		background-image: url(img5.jpg);
		background-repeat: no-repeat;
		background-size: cover;
		background-attachment: fixed;
		height: max-content;
		background-position: center;
	}
	.form{
		border: 2px solid black;
		width: max-content;
		background: rgba(255,255,255,0.6);
		padding: 60px 80px 60px 80px;
		margin-top: 8%;
	}
	input{
		outline: none;
		padding: 8px 8px 8px 8px;
	}
	input[type=text]{
		width: 100%;
	}
	input[type=password]{
		width: 100%;
	}
	input[type=submit]{
		background: black;
		color: white;
		outline: none;
		padding: 10px 30px 10px 30px;
		font-size: 20px;
	}
	input[type=submit]:hover{
		background: #4d4d4d;
	}
	p a{
		text-decoration: none;
		font-weight: bold;
		color: green;
		font-size: 19px;
	}
	p a:hover{
		color: red;
		text-decoration: underline red;
	}
</style>
</head>
<body>
	<?php
require('db.php');
session_start();
if (isset($_POST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
    $query = "SELECT * FROM `users` WHERE username='$username'
    and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: Grocery Shop.html");
         }else{
	echo "<center><div class='form'>
   <h3>Username/password is incorrect.</h3></div></center>";
	}
    }else{
?>
<center>
<div class="form">
<h1>Log In</h1>
<form action="" autocomplete="off" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br><br>
<input type="password" name="password" placeholder="Password" id="myInput" required><br><br>
<input type="checkbox" onclick="myFunction()">Show Password<br><br>
<input name="submit" type="submit" value="Login" /><br><br> </form>
<p>Don’t have an account?<a href="registration.php">Create Account</a></p>
</div> 
</center>
<script>
function myFunction() {
var x = document.getElementById("myInput");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";}}
</script>
<?php } ?>
</body> 
</html>