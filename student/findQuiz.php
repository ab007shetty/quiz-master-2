<?php
session_start();
require_once 'sql.php';
	
    $sid=$_SESSION['studentID'];
   
        $code = $_GET['code'];

        $sql = "SELECT * FROM `quiz` WHERE quizCode = '$code'";

        $result = $conn->query($sql);
        if($result-> num_rows > 0) {
            while ($row = $result-> fetch_assoc()) {
                if($row['quizCode'] == $code)
                {
                    date_default_timezone_set("Asia/Kuala_Lumpur");
                    $current =  date('Y-m-d H:i:s'); 
                    $curr = $current;
                    $open = $row['dateOpen'];
                    $close = $row['dateClose'];

                    if($curr < $open){
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                                    window.alert('Quiz has not started yet')
                                    window.location.href='quiz-code.php'
                                     </SCRIPT>");
                    }
                    else if($curr > $close){
                        echo ("<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Quiz has expired')
                        window.location.href='quiz-code.php'
                         </SCRIPT>");
                    }
                    else{
                        //dah jawab belum - 1 student 1 attempt
                        
                        $sqlcheck = "SELECT * FROM answeredquiz aq JOIN quiz q ON aq.quizID=q.quizID WHERE q.quizCode ='$code' AND aq.StudentID ='$sid'";
                        $result2 = $conn->query($sqlcheck);

                        if($result2->num_rows>0){
                            while($row= $result2-> fetch_assoc())
                            {
                                $answeredQuizID=$row['answeredQuizID'];
                            
                                if($answeredQuizID>2){
                                echo ("<SCRIPT LANGUAGE='JavaScript'>
                                            window.alert('You have already taken this quiz')
                                            window.location.href='quiz-code.php'
                                        </SCRIPT>");
                                }
                            }
                        }
                        else{
                            header("Location: quiz-description.php?quizCode=$code");
                        }
            
                    }
                    
                }
            }
        }
        else{
            if($row['quizCode'] != $code){
                header("Location: quiz-code.php?validate=false");
            }          
        }
            
    $conn->close();
   
?>