<?php
/*Author:Akshay Raul */
define('DB_HOST', 'localhost');
define('DB_NAME', 'Vehicle_Database');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$username = $_POST[user];
$password = $_POST[pass];
$_SESSION['userName']=$_POST['user'];
echo "Logged in ".$_SESSION['userName']."   <a href='Home.html'>LogOut</a><br>";
		
//If there are input validations, redirect back to the login form
function SignIn()
{
session_start();   //starting the session for user profile page
if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$query = mysql_query("SELECT *  FROM WebsiteUsers where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
	//There should exist login name and password in your backend mysql table- WebsiteUsers
	$row = mysql_fetch_array($query) or die(mysql_error());
	if(!empty($row['userName']) AND !empty($row['pass']))
	{
		$_SESSION['userName'] = $row['user'];
		

	}
	else
	{
		echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";
	}
	
}
}
if(isset($_POST['submit']))
{
	SignIn();
}

?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<Head>
<title>Administrators Home</title></Head></body>
<body background="jaguar.jpg">
<link rel="stylesheet" type="text/css" href="Style.css">
<font style="Monotype Corsiva" size=40 >ONE STOP SHOP AND MANAGE</font>
<p>
<fieldset style="width:30%"><legend>Customer Information</legend>
<form method="POST" action="Transaction.php">
<font >Name</font> <br><input type="text" name="cname"><br>
<font >Address</font> <br><input type="text" name="address"><br>
<font >Phone no</font> <br><input type="number" name="phno"><br>
<font >Pan no</font> <br><input type="number" name="panno" size="7"><br>
</fieldset>
</p>
<fieldset style="width:30%"><legend>Vehicle Information</legend>
<form method="POST" action="Transaction.php">
<font >Which is the Car for You?</font>
<select name="Cars" >
  <option value="">Select...</option>
  <option value="Acura Rsx">Acura Rsx</option>
  <option value="Acura 4x">Acura 4x</option>
  <option value="BlueMotion 4WD">BlueMotion 4WD</option>
  <option value="Polo SX">Polo SX</option>
</select><br>
<font >Registration Number</font> <br><input type="number" name="regno" size="12"><br>
<font >Year of Manufacture</font> <br><input type="number" name="yom" size="4"><br>
<font >Warranty</font> <br><input type="number" name="warr" size="2"><br>
<br>
Type
<select name="type">
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
</select>
<br><br>
<input id="button" type="submit" name="submit" value="BUY" >
</form>
</fieldset>
</p>
<p>
<div id="Search">
<fieldset style="width:30%"><legend>Search DataBase Information</legend>
<form action="getData.php" method="POST">
Search By id:
<select name="Search">
	<option value"">Search by..</option>		
	<option value="custid">Customer ID</option>
	<option value="carid">Car ID</option>
	<option value="billid">Bill Acknowledgement Id</option>
</select>
<br>Enter ID<input type="number" name="ide"><br>
<input id="button2" type="submit" name="search" value="search" >
</form>
</fieldset>
</div>
<div id="Service">
<fieldset style="width:30%"><legend>Service And Maintenance</legend>
<form action="Service.php" method="post">
Enter Customer ID<br><input type="number" name="id"><br>
Service Type<br><input type="text" name="type"><br>
Cost<br><input type="number" name="cost"><br>
<input id="button3" type="submit" name="Service" value="Service">
</form>
</fieldset>
</div>
</p>
</body>
</html>

