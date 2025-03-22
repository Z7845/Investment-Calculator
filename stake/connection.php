<?php
    $servername='localhost';
    $username='root';
    $password='';
    $db_name='stake';

    $con=new mysqli($servername,$username,$password,$db_name);
    if($con->connect_error){
        die("Connection Failed:".$con->connect_error);
    }
    else{
        echo " ";
    }
?>
