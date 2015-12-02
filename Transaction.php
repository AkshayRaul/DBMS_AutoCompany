<?php

session_start();
$con=mysqli_connect("localhost","root","","Vehicle_Database") or die("Failed to connect to MySQL: " . mysql_error());
//$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
$cname = $_POST[cname];
$add = $_POST[address];
$phno=$_POST[phno];
$_SESSION["panno"]=$panno=$_POST[panno];
$carn=$_POST[Cars];
$regno=$_POST[regno];
$yom=$_POST[yom];
$warr=$_POST[warr];
//If there are input validations, redirect back to the login form
$username=$_SESSION['userName'];
$_SESSION['userName']=$username;
echo "Looged in ".$_SERVER['userName']."<a href='Index.php'>LogOut</a>";
if(mysqli_query($con,"INSERT INTO Vehicles(CName,RegistrationNo,ShowroomId,YearofMan,Warranty,Type) VALUES('$carn',$regno,10219,$yom,$warr,'$_POST[type]')")){

	echo "Records added successfully to vehicle.";

} else{

	echo "ERROR: Could not able to execute vehicle " . mysqli_error($con);
}
if(mysqli_query($con,"INSERT INTO Customer(Name,RegistrationNo,Address,Phoneno,PANno) VALUES('$cname',$regno,'$add',$phno,$panno)")){

	echo "Records added successfully to customer.";

} else{

	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);

}
?>

<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<link  rel="stylesheet" type="text/css" href="Style.css">
<head><title>Transaction Page</title></head>
<script type="text/javascript"><!--
function updatesum() {
document.form.sum.value = (document.form.camt.value )*(1.1536) + (document.form.regamt.value -0);
}
//--></script>
<body background="trans.jpg">
<div id="Retrieve">
<fieldset style="width:40%"><legend>Transaction </legend>
<form name ="form" method="POST" action="testtransact.php">
Car Amount <br><input type="text" onchange="updatesum()" name="camt" size="40"><br>
Registration Amount<br><input type="number" onchange="updatesum()" name="regamt" size="40"><br>
VAT: 12.36%<br>
Tax: 3.00%<br>
The total is:
<input name="sum" readonly style="border:0px;">
<input id="button" type="submit" name="buy" value="Confirm" >
</form>
</fieldset>
</div>

</script>
</body></html>
