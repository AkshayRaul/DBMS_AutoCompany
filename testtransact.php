<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>Transaction Complete</title></head>
<body background="final.jpg">
<br>
<font style="font-style: Calibri" size =20 color="BLUE" ><br><br><br><br><br>Congratulations Now You Own an Aereos Car!!!!</font>
<br>
</body>

</html>
<?php
session_start();
$con=mysqli_connect("localhost","root","","Vehicle_Database") or die("Failed to connect to MySQL: " . mysql_error());
	$panno=$_SESSION["panno"];
	$query=mysqli_query($con,"Select * from Customer where PANno='$panno'");
	$row = mysqli_fetch_assoc($query) or die(mysql_error());
	$cid=$row["CustomerId"];
	$reg=$row["RegistrationNo"];
	$username=$_SESSION['username'];
	$total=$_POST[regamt]+$_POST[camt]*(1+0.1236+0.03);
	if(mysqli_query($con,"INSERT INTO TransactionBill(RegistrationNo,CustomerId,Registration_amount,Total) VALUES ($reg,$cid,$_POST[regamt],$total)"))		
	{
		echo "<center><br><br>Transaction Complete!!!</center>";
		echo "<br><center><a href='Index.php'>Go to home page</a></center>";
		
	}
	else 
	{
		echo "sorry retry".mysqli_error($con);
	}
	
?>

