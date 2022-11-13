<html>

<?php require ("header.php");?>


<?php
session_start();
require_once 'sql.php';


$id1 = $_SESSION["instructorID"];

$sql = "SELECT * FROM `instructor`
        WHERE `instructorID` = $id1";

 $res = mysqli_query($conn,$sql);
    if ($res == true) {
        global $tname;
        while ($row = mysqli_fetch_array($res)) {
            $tname = $row['name'];
        }
    }

?>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!--icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/create.css">   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.repeater@1.2.1/jquery.repeater.min.js"></script>
</head>

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
            <a href="../index.php" class="navbar-brand mr-lg-5 text-white">
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
                <a href="../index.html">
                  <img src="../assets/img/navbar.png" />
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
              <a href="studentslist.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-poll"></i> Students</span
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
                  ><i class="text-white fas fa-user-circle"></i> <?php echo $tname ?></span
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
    <div class="shape shape-style-1 shape-primary">
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


<div class="container-fluid"> 
      
<div class="row">
            <div class="col-sm-12">  
              <div class="card card-body bg-gradient-white text-white ">
			  <div class="col-12  text-center table-responsive ">
            <span class="badge badge-danger badge-pill ">Create Quiz </span>
					
			<form class="repeater" id="quiz_form">
            <div class="quiz-details">
                <p class="header">Create a new quiz</p>
                <table class="table table-striped table-hover table-bordered text-center">
                    <tr>
                        <td>
                          <p class="title font-weight-bold">TITLE</p>
                          <input type="text" name="quizName" placeholder="Enter a title, eg: “Mathematics Exercise 1: Algebra”" required>
                        </td>
                        <td class="right">
                            <p class="title font-weight-bold">START DATE AND TIME</p>
                            <input type="datetime-local" name="openDate" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <p class="title font-weight-bold">DESCRIPTION</p>
                           <input type="text" name="description" placeholder="Add a description..." required>
                        </td>
                        <td class="right">
                            <p class="title font-weight-bold">END DATE AND TIME</p>
                             <input type="datetime-local" name="closeDate" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <p class="title font-weight-bold">NUMBER OF STUDENTS</p>
                           <input type="number" name="numStudents" placeholder="Number of students to answer this quiz." required>
                        </td>
                    </tr>
                </table>
            </div>

            <div data-repeater-list="group-a" class="mt-7 row col-12 cntdelegate" id="quiz-question">
                <div data-repeater-item class="repeater-container">
                    <div class="question-box">
                        <input type="text" id="questName" class="questName" name="questName" placeholder="Add a question" required>
                        <div class="action">
                            <select onchange="questionType(this)">
                                <option value="" disabled selected>Select question type</option>
                                <option value="mcq">Multiple choice</option>
                                <option value="text">Simple text</option>
                            </select>
							<a data-repeater-delete class="btn btn-danger text-center">Remove </a>
                <div class="clear"></div>
                        </div>
                   
                    <div class="mcq answer-container ">
                       <p> Enter answer choices and select the correct answer: </p>
                        a. &nbsp; <input type="radio" name="ansrad" value="1">
                                    <input type="text" name="radio1" id="radio1" placeholder="Enter answer"><br>
                        b. &nbsp; <input type="radio" name="ansrad" value="2">
                                    <input type="text" name="radio2" id="radio2" placeholder="Enter answer"><br>
                        c. &nbsp; <input type="radio" name="ansrad" value="3">
                                    <input type="text" name="radio3" id="radio3" placeholder="Enter answer">
                    </div>
                    <div class="text answer-container">
                       <p> Enter 3 possible correct(only) answers:</p>
                        1. &nbsp;<input type="text" name="text1" id="text1" placeholder="Enter correct answer 1"><br>
                        2. &nbsp;<input type="text" name="text2" id="text2" placeholder="Enter correct answer 2"><br>
                        3. &nbsp;<input type="text" name="text3" id="text3" placeholder="Enter correct answer 3">
                    </div>
					
					
                </div>
               
                
            </div>
        
            <span id="writeroot"></span>
            <button  type="submit" class="btn btn-success btn1" id="submit" name="submit"><span>Create</span></button>
            <div class="clear"></div>
        </form>

        <div class="icon-bar" data-repeater-create>
        <p>+</p>
        </div>
			
			
          </div>
		  

        
                  </div>
                </div>
              </div>  
	
    </div>
	
    </div>
</section>

<script src="../js/modal.js"></script>
    <script src="../js/create.js"></script>  
</body>
</html>



