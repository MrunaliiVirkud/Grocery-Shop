<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nature Cart</title>
	<style type="text/css">
		body{
			background: url(img3.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
		    height: max-content;
		    background-position: center;
		}
		p{
                        color:white;
			text-align: center;
			font-size: 30px;
			word-spacing: 5px;
		}
		.address{
			border: 2px solid black;
			width: max-content;
			background: rgba(0,0,0,0.6);
			padding: 60px 80px 60px 80px;
		}
		.form{
			border: 2px solid black;
			width: max-content;
			background: rgba(255,255,255,0.6);
			font-size: 30px;
			padding: 60px 80px 60px 80px;
			margin-top: 15%;
		}
		input{
			border: none;
			outline: none;
			font-size: 17px;
			padding: 10px 10px 10px 10px;
		}
		input:hover{
			background: #f2f2f2;
		}
		input[type=name]{
			width: 100%;
		}
		input[type=text]{
			width: 100%;
		}
		button{
			border: none;
			outline: none;
			background-color: rgb(255,102,0);
			font-size: 17px;
			font-variant: sans-serif;
			padding: 20px 20px 20px 20px;
			font-weight: bold;
		}
		button:hover{
			background: #e65c00;
		}
	</style>
</head>
<body>
<?php
require('db.php');
if (isset($_REQUEST['name'])){
	$name = stripslashes($_POST['name']);
	$name = mysqli_real_escape_string($con,$name); 
	$housename = stripslashes($_POST['housename']);
	$housename = mysqli_real_escape_string($con,$housename);
	$areaname = stripslashes($_POST['areaname']);
	$areaname = mysqli_real_escape_string($con,$areaname);
	$city = stripslashes($_POST['city']);
	$city = mysqli_real_escape_string($con,$city);
	$state = stripslashes($_POST['state']);
	$state = mysqli_real_escape_string($con,$state);
	$landmark = stripslashes($_POST['landmark']);
	$landmark = mysqli_real_escape_string($con,$landmark);
	$pincode = stripslashes($_POST['pincode']);
	$pincode = mysqli_real_escape_string($con,$pincode);
	$mobileno = stripslashes($_POST['mobileno']);
	$mobileno = mysqli_real_escape_string($con,$mobileno);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT INTO `delivery_details`(`name`, `housename`, `areaname`, `city`, `state`, `landmark`, `pincode`, `mobileno`, `trn_date`) VALUES ('$name','$housename','$areaname','$city','$state','$landmark','$pincode','$mobileno','$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<center><div class='form'>
            <h3>Your order placed successfully.</h3></div></center>";
        }
    }else{
?>
<center>
<div class="address">
	<p><b>Delivery details</b></p>
	<p>Cash on delivery</p>
	<br>
<form name="buynow" action="" autocomplete="off" method="post">
<input type="name" name="name" placeholder="Name*" required/><br><br><br>	
<input type="text" name="housename" placeholder="FLat, House Name/No.*" required/><br><br><br>
<input type="text" name="areaname" placeholder="Area Name, Colony*" required/><br><br><br>
<input type="text" name="city" placeholder="City/Town*" required/><br><br><br>
<input type="text" name="state" placeholder="State*" required/><br><br><br>
<input type="text" name="landmark" placeholder="Landmark" required/><br><br><br>
<input type="text" name="pincode" placeholder="Pin Code*" required/><br><br><br>
<input type="text" name="mobileno" placeholder="Mobile No.*" required/><br><br><br>
<br><br><br>
<button type="submit">Place Order</button>
</form>
</div>
</center>
<?php } ?>
</body>
</html>
