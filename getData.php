<html>
<head><title>Data Base</title></head>
<body>
<font type="Calibri" size=30>Customer details</font>
<br>
</body></html>
<?php
session_start();
$con=mysqli_connect("localhost","root","","Vehicle_Database") or die("Failed to connect to MySQL: " . mysql_error());
$id=$_POST[Search];
$cid="custid";
if(strcmp($id,$cid)==0)
{
	$query=mysqli_query($con,"SELECT * from Customer where CustomerId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	if(!empty($res["CustomerId"]))
	{
	echo "Customer Id :".$res["CustomerId"]."<br>Customer Name  : ".$res["Name"]."<br>"."Customer Address : ".$res["Address"];
	echo "<br>"."Phone no :".$res["Phoneno"]."<br>Pan No :".$res["PANno"];
	echo "<br><br><br>";
	$query=mysqli_query($con,"SELECT * from Vehicles Join Customer on Customer.RegistrationNo=Vehicles.RegistrationNo where CustomerId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	echo "<font size=12>Car Details</Font><br>";
	echo "Car Name :".$res["CName"]."<br>Year Of Manufacture :".$res["YearofMan"]."<br>Warranty :".$res["Warranty"]." years<br>Model type :".$res["Type"];
	$query=mysqli_query($con,"SELECT * from TransactionBill where CustomerId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	echo "<br><br><font size=12>Bill Details</Font><br>";
	echo "Bill Id:".$res["BillId"]."<br>Registration Amount :".$res["Registration_amount"]."<br>Total Amount Paid :".$res["Total"];
	$query=mysqli_query($con,"SELECT * from Service where CustomerId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	echo "<br><br><font size=12>Servicing Details</Font><br>";
	if(empty($res["Service Id"]))
	{
		echo "Car not yet Serviced"	;
	}
	else{
		echo "Service Id:".$res["Service Id"]."<br>Service Date :".$res["ServiceDate"]."<br>Cost of last Service :".$res["Cost"];
	}
	}
	else {
		echo "No Record Found!!!";
	}
}
if(strcmp("$_POST[Search]","carid")==0)
{

	$query=mysqli_query($con,"SELECT * from Customer where RegistrationNo='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	if(!empty($res["CustomerId"]))
	{	echo "Customer Id :".$res["CustomerId"]."<br>Customer Name  : ".$res["Name"]."<br>"."Customer Address : ".$res["Address"];
		echo "<br>"."Phone no :".$res["Phoneno"]."<br>Pan No :".$res["PANno"];
		echo "<br><br><br>";
		$query=mysqli_query($con,"SELECT * from Vehicles  where RegistrationNo='$_POST[ide]'");
		$res=mysqli_fetch_assoc($query);
		echo "<font size=12>Car Details</Font><br>";
		echo "Car Name :".$res["CName"]."<br>Year Of Manufacture :".$res["YearofMan"]."<br>Warranty :".$res["Warranty"]." years<br>Model type :".$res["Type"];
		$query=mysqli_query($con,"SELECT * from TransactionBill where RegistrationNo='$_POST[ide]'");
		$res=mysqli_fetch_assoc($query);
		echo "<br><br><font size=12>Bill Details</Font><br>";
		echo "Bill Id:".$res["BillId"]."<br>Registration Amount :".$res["Registration_amount"]."<br>Total Amount Paid :".$res["Total"];
		$query=mysqli_query($con,"SELECT * from Service where RegistrationNo='$_POST[ide]'");
		$res=mysqli_fetch_assoc($query);
		echo "<br><br><font size=12>Servicing Details</Font><br>";
		if(empty($res["Service Id"]))
		{
			echo "Car not yet Serviced"	;
		}
		else{
		echo "Service Id:".$res["Service Id"]."<br>Service Date :".$res["ServiceDate"]."<br>Cost of last Service :".$res["Cost"];
		}
}	
else{
echo "No record FOUND!!!";	
}
}
if(strcmp("$_POST[Search]","billid")==0)
{
	$query=mysqli_query($con,"SELECT * from TransactionBill join Customer on TransactionBill.CustomerId=Customer.CustomerId where BillId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	
	if(!empty($res["CustomerId"]))
	{echo "Customer Id :".$res["CustomerId"]."<br>Customer Name  : ".$res["Name"]."<br>"."Customer Address : ".$res["Address"];
	echo "<br>"."Phone no :".$res["Phoneno"]."<br>Pan No :".$res["PANno"];
	echo "<br><br><br>";
	$query=mysqli_query($con,"SELECT * from TransactionBill join Vehicles on TransactionBill.RegistrationNo=Vehicles.RegistrationNo where BillId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	echo "<font size=12>Car Details</Font><br>";
	echo "Car Name :".$res["CName"]."<br>Year Of Manufacture :".$res["YearofMan"]."<br>Warranty :".$res["Warranty"]." years<br>Model type :".$res["Type"];
	$query=mysqli_query($con,"SELECT * from TransactionBill where BillId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
	echo "<br><br><font size=12>Bill Details</Font><br>";
	echo "Bill Id:".$res["BillId"]."<br>Registration Amount :".$res["Registration_amount"]."<br>Total Amount Paid :".$res["Total"];
	echo "<br><br><font size=12>Servicing Details</Font><br>";
	$query=mysqli_query($con,"SELECT * from Service Join TransactionBill where BillId='$_POST[ide]'");
	$res=mysqli_fetch_assoc($query);
		if(empty($res["Service Id"]))
	{
		echo "Car not yet Serviced"	;
	}
	else{
		echo "Service Id:".$res["Service Id"]."<br>Service Date :".$res["ServiceDate"]."<br>Cost of last Service :".$res["Cost"];
	}
	}else {
		echo "No Record Found!!";
	}
}
?>
<html>
<body>
<br><br>

<center><a href="Index.php">Go to home page</a></center>
</body></html>
