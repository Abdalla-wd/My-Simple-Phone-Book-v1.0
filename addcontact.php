<?php //addcontact.php

//connect to db 

require_once 'config.php';
$connection=new mysqli($host,$username,$password,$database);
if ($connection->connect_error) exit("Unable to connect to database.<br>");

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']))
{
	
	$fname=cleaninput($_POST['fname']);
	$lname=cleaninput($_POST['lname']);
	$phone=cleaninput($_POST['phone']);	
	

	$addcontact=$connection->query("INSERT INTO contacts(id,fname,lname,phone) VALUES('','$fname','$lname','$phone')");
	if (!$addcontact) exit("Failed to add contact: ".$connection->error);
	else echo "Contact \"$fname $lname\" was added successfully.<br>";
	
}

echo <<<_END


<pre>
<form action="addcontact.php" method="post">
First name   <input type="text" name="fname">
Last name    <input type="text" name="lname">
Phone number <input type="text" name="phone">

	<input type="submit" value="Add Contact">
</form>
</pre>

_END;

echo "If you want to view your contacts or to delete a contact, then click <a href='index.php'>here</a> please.<br><br>";

echo "[This script was created by Abdalla Ahmed, on the 20th of june 2017. More information about me are available in my personal website <a href='http://www.abdalla.xyz'>here</a> and you can find more of my projects and scripts in my GitHub account <a href='https://github.com/Abdalla-xyz'>here</a>].<br>";

function cleaninput($userinput){
	
	$userinput=stripslashes($userinput);
	$userinput=strip_tags($userinput);
	$userinput=htmlentities($userinput);
	return $userinput;
	
}

?>