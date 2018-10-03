/* 
Author: Zain Siddiqui
Establishes connection and retrieves data from database. Data consists of quote and author and is stored in an array.
*/




<?php

//Fields for establishing database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "MQG";

class Quote{
    public $qStatement;
}

//Quotes array
$quotes = array();


// Establishing connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, Quote, Name FROM quote";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        $qStatement = $qStatement. "id: ". $row["id"]." Quote: " . $row["Quote"]. " Name: ". $row["Name"]."<br>";
        

    }


} else {
    echo "0 results";
}

//Selecting data from db
    $sql = "SELECT id, Quote, Name FROM quote ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        $Statement = '"'.$row["Quote"]. '"'. " - ". $row["Name"]."<br>";
        

    }


} else {
    echo "0 results";
}

//Closing database connection
$conn->close();



