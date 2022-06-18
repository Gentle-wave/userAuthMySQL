<?php

require_once "../config.php";

function registerUser($fullnames, $email, $password, $gender, $country){
    $conn = db();
    $full_names = $_POST['fullnames'];
    $country = $_POST['email'];
    $email = $_POST['country'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    $query = "INSERT INTO Students (`id`, `full_names`, `country`, `email`, `gender`, `password`)
                            VALUES ('$full_names', '$country', '$email', '$gender', '$password',);";
                    if (mysqli_query($conn, $query)){
                        echo "User Successfully registered";
                    } else {
                      echo "Error try again";  
                    }
    $sql = "SELECT * FROM Students where email = $email";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)>0){
        echo "user already exist";
    }
}


function loginUser($email, $password){
    $conn = db();

    echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Students where email = '$email' and password = '$password' ";
    $result = mysqli_query($conn, $sql);
    
        if ($result){
        session_start();
        echo "Login Sucessful";
        $_SESSION['username'] = $email;
        header("location: http://localhost/PHP/userAuthMySQL/dashboard.php");
    } else {
        echo "invalid password or user dosen't exist";
    }

    }



function resetPassword($email, $password){
    $conn = db();
    echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Students where email = $email";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result)>0){
      "UPDATE Students set password = $password where email = $email"; 
      echo "Password changed";
    } else {
       echo "User does not exist";
    }
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
   $display = "SELECT * FROM Students"; 
}

function logout(){
    if( $_SESSION['username']){
        unset( $_SESSION['username']);
        session_destroy();
        header("location: http://localhost/PHP/userAuthMySQL/forms/login.html");        
    }
}


 function deleteaccount($id){
     $conn = db();
     //delete user with the given id from the database
     $sql = "DELETE from Students where id = $id";
     if ($conn){
        echo "Successfully deleted";
     } else{
        echo "error deleting user";
     }
 }
?>