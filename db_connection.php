<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 //$dbpass = "123456";
 $dbpass = "";
 $db = "tourSystem";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>