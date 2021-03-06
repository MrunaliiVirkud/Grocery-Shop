<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
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
	input[type=email]{
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
if (isset($_REQUEST['username'])){
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<center><div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></center></div>";
        }
    }else{
?>
<center>
<div class="form">
<h1>Create Account</h1>
<form name="registration" autocomplete="off" action="" method="post" onsubmit="return myfun()">
<input type="text" name="username" placeholder="Username" required /><br><br>
<input type="email" name="email" placeholder="Email" required /><br><br>
<input type="password" name="password" placeholder="Password" id="myInput" required>
<br>
<span id="messages"></span>
<br><br>
<input type="checkbox" onclick="myFunction()">Show Password
<br><br>
<input type="submit" name="submit" value="Register" /><br><br>
</form>
<p>Already have an account?<a href="login.php">Login</a></p>
</div>
<script>
function myFunction() {
var x = document.getElementById("myInput");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}

}
function myfun() {
var a =document.getElementById("myInput").value;
if(a.length < 8) {
document.getElementById("messages").innerHTML=" ** Password must be atleast 8 characters ** ";
return false;

17

}
if(a.length > 20) {
document.getElementById("messages").innerHTML=" ** Password must not be longer than 20 characters ** ";
return false;
}
}
</script>
</div>
</center>
<?php } ?>
</body>
</html>	