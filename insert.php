<?php
include 'config.php';

// $full_names = '';
// $country = '';
// $email = '';
// $gender = '';
// $password ='';

$query = "INSERT INTO Students (`id`, `full_names`, `country`, `email`, `gender`, `password`)
                            VALUES (2, 'Nancy Vicky', 'Nigeria', 'nancy@gmail.com', 'Female', 'andy');";
$query .= "INSERT INTO Students (`id`, `full_names`, `country`, `email`, `gender`, `password`)
                            VALUES (3, 'Seyi Olufe', 'Nigeria', 'seyi@gmail.com', 'Male', '1234');";
$query .= "INSERT INTO Students (`id`, `full_names`, `country`, `email`, `gender`, `password`)
                            VALUES (4, 'Chioma Victoria', 'Nigeria', 'vicky@gmail.com', 'Female', '129323');";                            
$query .= "INSERT INTO Students (`id`, `full_names`, `country`, `email`, `gender`, `password`)
                            VALUES (8, 'Nfon Andrew', 'Cameroon', 'drew@gmail.com', 'Nigeria', 'tatah');"; 
                             
                         if (mysqli_multi_query($conn, $query)) {
                            echo "Done";
                         }else{
                            echo "Error";
                         }    
?>