<?php
/*Akshay Raul*/
session_start();
$con=mysqli_connect("localhost","root","","Vehicle_Database") or die("Failed to connect to MySQL: " . mysql_error());

	if(empty($_POST['type']||$_POST[cost]||$_POST[id]))
		echo "No field can be empty";
	else{
		$query=mysqli_query($con,"Select * from Customer where CustomerId='$_POST[id]'");
		$row = mysqli_fetch_assoc($query) ;
		$reg=$row["RegistrationNo"];
		$query=mysqli_query($con,"Select CustomerId,ServiceNumber from Service where CustomerId='$_POST[id]'");
		$row = mysqli_fetch_assoc($query) ;;
		$cid=$row["CustomerId"];
		$sno=$row["ServiceNumber"];
		$sno=$sno+1;
		if(!empty($sno))
		{
			if(mysqli_query($con,"Update Service SET ServiceNumber='$sno' where CustomerId='$cid'"))
			{
				echo "Your Car will be Serviced in 2 days"."<br>"."Car service number".$sno;
				
			}
			else {
				echo mysqli_error($con);
			}
		}
		else if(mysqli_query($con,"INSERT INTO Service(CustomerId,RegistrationNo,ServiceDate,ServiceType,Cost) Values($_POST[id],$reg,sysdate(),'$_POST[type]',$_POST[cost])"))
		{
		echo "Your Car will be serviced in 2 days";
				 
		}
		else {
			echo mysqli_error($con);
		}
		
	}
?>
<html>
<body>
<head><title>ServiceUpd</title></head>
<a href="Index.php">Go to home page</a>
</body>	
</html>
