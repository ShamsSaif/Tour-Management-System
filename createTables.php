<?php

function createTables(){
    include 'db_connection.php';
    $conn = OpenCon();

// sql to create tables
$sql = "CREATE TABLE  IF NOT EXISTS Admins (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    fname VARCHAR(50) NOT NULL,
    pass VARCHAR(30) NOT Null,
    stat VARCHAR(30) DEFAULT 'Active'
    );";
$sql .= "CREATE TABLE  IF NOT EXISTS Assistants (
    ast_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    fname VARCHAR(50) NOT NULL,
    pass VARCHAR(30) NOT Null,
    stat VARCHAR(30) DEFAULT 'Active'
    );";
$sql .= "CREATE TABLE  IF NOT EXISTS Locations (
    locs_id INT PRIMARY KEY AUTO_INCREMENT,
    lname VARCHAR(50) NOT NULL,
    coord VARCHAR(50) NOT Null
    );";
$sql .= "CREATE TABLE  IF NOT EXISTS Tours (
    t_id INT PRIMARY KEY AUTO_INCREMENT,
    tname VARCHAR(50) NOT NULL,
    locs VARCHAR(100) NOT Null,
    category VARCHAR(50)
    )";

if ($conn->multi_query($sql) === TRUE) {

} 

CloseCon($conn);
}
?>