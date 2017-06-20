<?php //install.php

echo "Welcome to the installation of My Simple Phone book script .. <br><br>";


echo "[This script was created by Abdalla Ahmed, on the 20th of june 2017. More information about me are available in my personal website <a href='http://www.abdalla.xyz'>here</a> and you can find more of my projects and scripts in my GitHub account <a href='https://github.com/Abdalla-xyz'>here</a>].<br><br><br>";

require_once 'config.php';

echo "installation has started .. <br>";

// connect to database

$connection=new mysqli($host,$username,$password,$database);
if ($connection->connect_error) exit("Unable to connect to the database using the data provided in config.php file: ".$connection->connect_error); 
else echo "Connected to database successfully ..<br>";

//create contacts table in the database

$create=$connection->query("CREATE TABLE contacts(
id INT(5) AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(35) NOT NULL,
lname VARCHAR(35) NOT NULL,
phone VARCHAR(15) NOT NULL
)");

if (!$create) exit("Table \"contacts\" could not be created: ".$connection->error);
else echo "The table \"contacts\" was created successfully.<br><br>";

echo <<<_END
The script is ready to be used. you can click <a href="addcontact.php">here</a> to add a new contact or <a href="index.php">here</a> to view existing contacts<br><br>.

_END;



?>