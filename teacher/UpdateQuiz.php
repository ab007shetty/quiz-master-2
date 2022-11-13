<?php
session_start();
require_once 'sql.php';
    $quizName = $openDate = $closeDate = $description = $numStudents = '';
    
    //var_dump($_SESSION);

    if(isset($_POST['submit'])){
        //instructorID
        $instructorID = $_SESSION["instructorID"];
        $quizid = $_POST['quizid'];

        
            $instructorID = mysqli_real_escape_string($conn, $_SESSION['instructorID']);
            $quizName = mysqli_real_escape_string($conn, $_POST['quizName']);
            $openDate = mysqli_real_escape_string($conn, date('Y-m-d H:i:s', strtotime(str_replace('-','/',$_POST['openDate']))));
            $closeDate = mysqli_real_escape_string($conn, date('Y-m-d H:i:s', strtotime(str_replace('-','/',$_POST['closeDate']))));
            $description = mysqli_real_escape_string($conn,  $_POST['description']);
            $numStudents = mysqli_real_escape_string($conn,  $_POST['numStudents']);

            $sql = "UPDATE quiz
            SET instructorID='$instructorID', quizName='$quizName', 
            dateOpen ='$openDate', dateClose ='$closeDate', quizDescription ='$description', numStudents ='$numStudents'
            WHERE quizID = $quizid";

            if(mysqli_query($conn, $sql)){
                $quizID = mysqli_insert_id($conn);
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Quiz successfully updated!')
                        window.location.href='home.php'
                       </SCRIPT>");
                //header('Location: ../../../instructor/index.php');
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }
        }
?>