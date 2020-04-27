<?php
$user = 'root';
$password = '';
$db = 'testdb';

$db = new mysqli('localhost', $user, $password, $db) or die("unable to connect");

echo "Great work";

?>