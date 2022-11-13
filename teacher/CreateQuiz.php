<?php
session_start();
require_once 'sql.php';
    $quizName = $openDate = $closeDate = $quizCode = $quizDescription = $numStudents = '';
    $errors = array('quizName'=>'','openDate'=>'',
    'closeDate'=>'','quizCode'=>'','quizDescription'=>'', 'numStudents'=>'');

    //the idea is, once quiz dah create, guna the id to insert quizquestions in this same file

        //instructorID
        $instructorID = $_SESSION["instructorID"];
        //quizCode dummy
        $quizCode = generateKey();
        $quizDescription = $_POST['description'];
        $numStudents = $_POST['numStudents'];
        $quizName = $_POST['quizName'];
        $openDate = date('Y-m-d H:i:s', strtotime($_POST['openDate']));  
        $closeDate = date('Y-m-d H:i:s', strtotime($_POST['closeDate']));
        $group = $_POST['group-a'];


        if(array_filter($errors)){

        } else {
            $instructorID = mysqli_real_escape_string($conn, $instructorID);
            $quizName = mysqli_real_escape_string($conn, $_POST['quizName']);
            $openDate = mysqli_real_escape_string($conn, date('Y-m-d H:i:s', strtotime(str_replace('-','/',$_POST['openDate']))));
            $closeDate = mysqli_real_escape_string($conn, date('Y-m-d H:i:s', strtotime(str_replace('-','/',$_POST['closeDate']))));

            $sql = "INSERT INTO quiz(instructorID,quizName,dateOpen,dateClose,quizDescription,quizCode,numStudents)
            VALUES ('$instructorID', '$quizName','$openDate','$closeDate','$quizDescription', '$quizCode','$numStudents')";


            if(mysqli_query($conn, $sql)){
                $last_id = mysqli_insert_id($conn);
                $y = "New record created successfully. Last inserted ID is: ";
                for($i = 0 ; $i < count($group) ; $i++){
                    if(!empty($group[$i]['radio1'])){

                        $ansrad = $group[$i]['ansrad'];
                        if($ansrad == "1"){
                            $ansrad = $group[$i]['radio1'];
                        } else if($ansrad == "2"){
                            $ansrad = $group[$i]['radio2'];
                        } else if($ansrad == "3"){
                            $ansrad = $group[$i]['radio3'];
                        } else {
                            $ansrad = "0";
                        }

                        $questName = $group[$i]['questName'];
                        $ans1 = $group[$i]['radio1'];
                        $ans2 = $group[$i]['radio2'];
                        $ans3 = $group[$i]['radio3'];
                        $sqlQuestion = "INSERT INTO quizquestion(quizQuestionID, questionName, answer1, answer2, asnwer3, quizID, correctAnswer, questionType) 
                        VALUES (NULL, '$questName', '$ans1', '$ans2', '$ans3', '$last_id', '$ansrad', 'radio')";
                        mysqli_query($conn, $sqlQuestion);    
                    }
                    else if(!empty($group[$i]['text1'])){
                        $questName = $group[$i]['questName'];
                        $ans1 = $group[$i]['text1'];
                        $ans2 = $group[$i]['text2'];
                        $ans3 = $group[$i]['text3'];
                        $sqlQuestion = "INSERT INTO quizquestion(quizQuestionID, questionName, answer1, answer2, asnwer3, quizID, correctAnswer, questionType) 
                        VALUES (NULL, '$questName', '$ans1', '$ans2', '$ans3', '$last_id', '', 'text')";
                        mysqli_query($conn, $sqlQuestion);   
                    }
                }
                echo $y . $group[0]['text1'];
            } else {
                echo 'query error: ' . mysqli_error($conn);
            }
        }
    // End of POST check

    //generate code
    function generateKey(){
        $keyLength = 3;

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $randStr1 = substr(str_shuffle($str), 0, $keyLength);
        $randStr2 = substr(str_shuffle($str), 0, $keyLength);
        $randStr3 = substr(str_shuffle($str), 0, $keyLength);
        $combineStr = $randStr1 . "-" . $randStr2 . "-" . $randStr3;
        return $combineStr;
    }
?>