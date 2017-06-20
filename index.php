<?php //index.php

//contact database

require_once 'config.php';
$connection=new mysqli($host,$username,$password,$database);
if ($connection->connect_error) exit("Unable to connect to database: ".$connection->connect_error);

//delete a contact if the user has already chosen a contact to delete

if(isset($_POST['delete']) and isset($_POST['id']))
{
	
	$id=cleaninput($_POST['id']);
	$delete=$connection->query("DELETE FROM contacts  WHERE id='$id'");
	if (!$delete) echo "Failed to delete the selected contact: ".$connection->error."<br>";
	else echo "The contact was deleted successfully.<br><br>";
	
	
}
	




//send query to database to view contacts


$contacts=$connection->query("SELECT * FROM contacts");
If (!$contacts) exit("Could not recieve contacts records from the database: ".$connection->error);

$contact_number=$contacts->num_rows;

echo "<table><tr> <th>ID</th> <th> First name</th> <th>Last name </th><th>Phone Number</th></tr>";

for ($i=0; $i<$contact_number; $i++)
{
	
	$contacts->data_seek($i);
	$record=$contacts->fetch_array(MYSQLI_NUM);
	
	echo "<tr>";
	
	
	for ($c=0; $c<4; $c++) echo "<td>$record[$c]</td>";
	

	
	
	echo "</tr>";	
	
}

echo "</table><br><br>";

		echo <<<_END
    
	If you want to delete a contact, enter his/her ID number in the box and then click "Delete contact": 
	
	<form action="index.php" method="post">
	<input type="hidden" name="delete" value="yes">
	<input type="text" name="id">
	<input type="submit" value="Delete contact">
	</form>
	<br>
_END;

echo "If you want to add a new contact, then click <a href='addcontact.php'>here</a> please.<br><br>";

echo "[This script was created by Abdalla Ahmed, on the 20th of june 2017. More information about me are available in my personal website <a href='http://www.abdalla.xyz'>here</a> and you can find more of my projects and scripts in my GitHub account <a href='https://github.com/Abdalla-xyz'>here</a>].<br>";

function cleaninput($userinput){
	
	$userinput=stripslashes($userinput);
	$userinput=strip_tags($userinput);
	$userinput=htmlentities($userinput);
	return $userinput;
	
}



?>