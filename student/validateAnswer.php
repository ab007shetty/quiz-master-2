<?php 
require_once 'sql.php';
    //start session
    session_start();
    $studentid = $_SESSION["studentID"];
    $answer = $_POST['answer'];
    $quizid = $_POST["quizid"];

    $sql = "SELECT * FROM quizquestion
            WHERE quizID = $quizid";
    $result = $conn->query($sql);

    if($result-> num_rows > 0) {
        $i = 1;
        $mark = 0;
        while ($row = $result-> fetch_assoc()) { 
            if($row['questionType'] == 'text'){
                if($answer[$i] == $row['answer1'] || $answer[$i] == $row['answer2'] || $answer[$i] == $row['asnwer3'])
                {
                    $mark++;
                }
            }

            if($row['questionType'] == "radio"){
                if($answer[$i] == $row['correctAnswer']){
                    $mark++;
                }
            }   
            $i++;
        }
        $i--;
        $percent = ($mark/$i)*100;

        $sqlInsertMark = "INSERT INTO answeredquiz VALUES(NULL, $studentid,'$percent','$quizid')";
        $result = $conn->query($sqlInsertMark);
        $last_id = mysqli_insert_id($conn);

        if($result == TRUE){
            header("Location: quiz-result.php?quizid=$quizid&id=$last_id");
        }
            
        else
            echo 'query error: ' . mysqli_error($conn);

    }
?>