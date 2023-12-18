<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

 
try
{
 $conn = new mysqli($servername, $username, $password,$dbname);
 $conn->set_charset("utf8");
 
 
if ($conn->connect_error) {
    die('<div>Connection failed: ' . $conn->connect_error. '</div>');
}

}
catch(Exception $e)
{
    echo '<div>'.$e->getMessage().'</div>';
}
?>