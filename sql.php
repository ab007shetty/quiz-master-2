<?php
    // connect to database
    $conn = mysqli_connect('localhost','root','','quiz');
    // $conn = mysqli_connect('us-cdbr-east-03.cleardb.com','b310794f5353e9','d9f40fcf','heroku_f1cacb29cd6455f');
    if(!$conn){
        echo 'Connection error' . mysqli_connect_error();
    } 
?>