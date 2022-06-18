<?php
include 'config.php';

$sql = " CREATE TABLE Students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_names VARCHAR(120) NOT NULL,
    country VARCHAR(32) NOT NULL,
    email VARCHAR(60) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    password VARCHAR(25) NOT NULL
)";
if ($conn) {
    if(mysqli_query($conn, $sql)){
        echo"Table succesfully created";
    } else{
        echo "Error creating table : " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

?>