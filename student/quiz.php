<html>

<?php require ("header.php");?>


<?php
session_start();
require_once 'sql.php';
$SID = $_SESSION['studentID'];
 $sql = "SELECT * FROM student where studentID = '{$SID}'";
 $res = mysqli_query($conn,$sql);
    if ($res == true) {
        global $sname;
        while ($row = mysqli_fetch_array($res)) {
            $sname = $row['studentName'];
        }
    }


$code = $_GET['quizcode'];
$sql = "SELECT * FROM `quiz` q
        JOIN `quizquestion`  qq
        ON q.quizID = qq.quizID
        WHERE quizcode = '$code'";
$result = $conn->query($sql);
$result1 = $conn->query($sql);

?>

  <body class="bg-white" id="top">
    <!-- Navbar -->
    <nav
      id="navbar-main"
      class="
        navbar navbar-main navbar-expand-lg
        bg-default
        navbar-light
        position-sticky
        top-0
        shadow
        py-0
      "
    >
      <div class="container">
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <li class="nav-item dropdown">
            <a href="index.php" class="navbar-brand mr-lg-5 text-white">
                               <img src="../assets/img/navbar.png" />
            </a>
          </li>
        </ul>

        <button
          class="navbar-toggler bg-white"
          type="button"
          data-toggle="collapse"
          data-target="#navbar_global"
          aria-controls="navbar_global"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon text-white"></span>
        </button>
        <div class="navbar-collapse collapse bg-default" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-10 collapse-brand">
                <a href="index.html">
                  <img src="assets/img/navbar.png" />
                </a>
              </div>
              <div class="col-2 collapse-close bg-danger">
                <button
                  type="button"
                  class="navbar-toggler"
                  data-toggle="collapse"
                  data-target="#navbar_global"
                  aria-controls="navbar_global"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav align-items-lg-center ml-auto">
		  
				
				 <li class="nav-item">
              <a href="home.php" class="nav-link">
                <span class="text-success nav-link-inner--text font-weight-bold"
                  ><i class="text-success fad fa-home"></i> DashBoard</span
                >
              </a>
            </li>
			
			 <li class="nav-item">
              <a href="scorecard.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-poll"></i> ScoreCard</span
                >
              </a>
            </li>
			
			 <li class="nav-item">
              <a href="leaderboard.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-award"></i> LeaderBoard</span
                >
              </a>
            </li>
			
			
			 <li class="nav-item">
              <a href="profile.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fas fa-user-circle"></i> <?php echo $sname ?></span
                >
              </a>
            </li>
		  
		   <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-danger fas fa-power-off"></i> Logout</span
                >
              </a>
            </li>
		  

          
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

	
  <section class="section section-shaped section-lg">
    <div class="shape shape-style- shape-primry">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>


<div class="container-fluid card"> 
      
    <?php
        if($result-> num_rows > 0) {
            $i = 1; 
            while ($row = $result-> fetch_assoc()) {?>
            <div class="pages">
                <div class="ellipsis">
                    
                </div>
            </div><?php
            $i++;
            }
            } 
            ?>
            <!-- id="answer_form" -->
            <div class="leave-btn">
                <a href="home.php"><button class="btn pull-right btn-danger">LEAVE</button></a>
                <form  method="POST" action="validateAnswer.php">
            </div>

            <?php         
            if($result1-> num_rows > 0) {
                $index = 1;
                while ($row = $result1-> fetch_assoc()) { ?>
            <div data-repeater-list="group-a"class="question-details">
             <div data-repeater-item class="repeater-container">
                <p id="questName" class="font-weight-bold" >QUESTION <?php echo $index;?></p>
                <div class="question">
                <?php echo $row['questionName'];?>
                <input type="hidden" id="quizid" class="form-control" name="quizid" value="<?php echo $row['quizID']?>">
                </div>
                <div class="answer">
                   <?php
                   if($row["questionType"] == "text")
                    {
                        ?><p>Answer</p>
                          <textarea rows="3" cols="50" id="answer" class="form-control" name="answer[<?php echo $index?>]" id="answer" required></textarea><?php
                    }
                    if($row["questionType"] == "radio")
                    {
                        ?><br>
                        <p>a. &nbsp <input type="radio" id="answer"  name="answer[<?php echo $index?>]" value="<?php echo $row['answer1']?>"> &nbsp <?php echo $row['answer1']?></p>
                      
                        <p>b. &nbsp <input type="radio" id="answer"  name="answer[<?php echo $index?>]" value="<?php echo $row['answer2']?>"> &nbsp <?php echo $row['answer2']?></p>
                       
                        <p>c. &nbsp <input type="radio" id="answer"  name="answer[<?php echo $index?>]" value="<?php echo $row['asnwer3']?>"> &nbsp <?php echo $row['asnwer3']?></p>
						<hr><?php
                    }
                   ?> 
                </div>
                </div>
                <?php 
                $index++;}
                } ?>
                <div class="leave-btn" style="margin:50px 0px">
                <input type="submit" name="submit" class="form-control btn btn-success" value="FINISH" >
				
               </form>
               </div>
            </div>
	
    </div>
</section>

    <?php require("footer.php");?>

</body>
</html>





		
		
		
