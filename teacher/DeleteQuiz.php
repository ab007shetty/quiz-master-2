<?php
require_once 'sql.php';
    session_start();
    $quizID = $_GET["id"];


            $sql = "DELETE FROM quiz
            WHERE quiz.quizID = $quizID  ";
			

            if(mysqli_query($conn, $sql)){
                $quizID = mysqli_insert_id($conn);
                echo "New record created successfully. Last inserted ID is: " . $quizID; //TODO: Check balik
                header('Location: home.php');
            } 
			 
			else {
                echo 'query error: ' . mysqli_error($conn);
            }
 
    // End of POST check

?>