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
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-home"></i> DashBoard</span
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
                <span class="text-success nav-link-inner--text font-weight-bold"
                  ><i class="text-success fad fa-award"></i> LeaderBoard</span
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


<div class="container ">
  
		<div class="row">
            <div class="col-sm-12 mb-3">  
              <div class="card card-body bg-gradient-white text-dark mt-3">
			   <div class="col-12 mx-auto text-center">
            <span class="badge badge-default badge-pill mb-3">Score Card</span>
          </div>
			  <?php 
			  
			  $id = $_SESSION["studentID"];
                    $query = "SELECT * FROM quiz 
ORDER BY quizID ";
$res = $conn->query($query);
		

            if($res)
            {
                echo "<div class=\"table-responsive\" >
				<table id=\"sc\" class=\" table table-striped table-hover table-bordered text-center \">
				<thead class=\" font-weight-bold \">
				<tr>
				<td>No</td>
				<td>Quiz Name</td>
				<td>Start date</td>
				<td>End date</td>
				<td>Action</td>
				</tr>
				</thead>";
                while ($row = mysqli_fetch_assoc($res)) {                
                    echo "<tr  class=\" text-center text-dark\">
					<td>".$row["quizID"]."</td>
					<td>".$row["quizName"]."</td>
					<td>".$row["dateOpen"]."</td>
					<td>".$row["dateClose"]."</td>
					<td><a id=\"tq\" href='quiz-report.php?quizID=".$row['quizID']."'>View</a></td></tr>";
                }
                echo "</table></div>";
            }
            else{
                echo " ".mysqli_error($conn);
            }
            ?>
         
              </div>
       </div>
    </div>	

	

        </div>
</section>


    <?php require("footer.php");?>

</body>

</html>



















