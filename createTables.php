<?php

function createTables(){
    include 'db_connection.php';
    $conn = OpenCon();

// sql to create tables
$sql = "CREATE TABLE  IF NOT EXISTS Admins (
    email VARCHAR(50) PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    pass VARCHAR(30) NOT Null,
    stat VARCHAR(30) NOT Null
    );";
$sql .= "CREATE TABLE  IF NOT EXISTS Assistants (
    email VARCHAR(50) PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    pass VARCHAR(30) NOT Null,
    stat VARCHAR(30) NOT Null
    );";
$sql .= "CREATE TABLE  IF NOT EXISTS Locations (
    lname VARCHAR(50) PRIMARY KEY,
    coord VARCHAR(50) NOT Null
    );";
$sql .= "CREATE TABLE  IF NOT EXISTS Tours (
    tname VARCHAR(50) PRIMARY KEY,
    locs VARCHAR(100) NOT Null,
    category VARCHAR(50)
    )";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

CloseCon($conn);
}
?>