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
			$tusername = $row['username'];
        }
    }

$id = $_GET['quizID'];

$query = "SELECT * FROM quiz 
          WHERE quizid = $id";
$result = $conn->query($query);
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
              <a href="studentslist.php" class="nav-link">
                <span class="text-white nav-link-inner--text font-weight-bold"
                  ><i class="text-white fad fa-poll"></i> Students</span
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



<div class="container"> 
      
<div class="row">
            <div class="col-sm-12 mb-3">  
              <div class="card card-body bg-gradient-white text-white mt-3">
			  <div class="col-12 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Report</span>

		 
            <div class="text-dark">
                <div class="heading">
				
				<?php
                $insTargetStud = '';
                if($result-> num_rows >0) {
                        while ($row = $result-> fetch_assoc()) {?>
                    Quiz Analysis Report: <?php echo $row["quizName"];
                    $insTargetStud = $row["numStudents"];
                    ?>
                </div>
                <div class="mt-1 row">
                    <div class="card col-md-3">
                        <?php echo $row["dateOpen"];?>
                        <p class="font-weight-bold" >Date start</p>
                    </div>
                    <div class="card col-md-3">
                    <?php echo $row["dateClose"];?>
                        <p class="font-weight-bold">Date end</p>
                    </div>
                    <div class="card col-md-3">
                    <?php echo $row["quizCode"];?>
                        <p class="font-weight-bold">Quiz code</p>
                    </div>
                    <?php }
                    }?>
                    <div class="card col-md-3">
                        <?php 
                            $cur = "SELECT COUNT(DISTINCT StudentID) FROM answeredquiz WHERE quizID= $id";

                            $curCount = mysqli_query($conn, $cur);
                            if($curCount-> num_rows >0) {
                                while ($rox = $curCount-> fetch_assoc()) {

                                    echo $rox["COUNT(DISTINCT StudentID)"];
                                    echo " of ";
                                    echo $insTargetStud;
                                }
                            }
                        ?>
                        <p class="font-weight-bold">Students Answered</p>
                    </div>
                </div>

                <?php 
                
                $query = "SELECT answeredquiz.*, student.* 
                        FROM answeredquiz INNER JOIN student 
                        ON answeredquiz.StudentID = student.studentID 
                        WHERE answeredquiz.quizID = $id";

                $mql = "SELECT answeredquiz.*, student.* 
                FROM answeredquiz INNER JOIN student ON answeredquiz.StudentID = student.studentID 
                WHERE answeredquiz.quizID = $id";
                $result2 = $conn->query($mql);
                $ron = mysqli_fetch_all($result2, MYSQLI_ASSOC);

                $result1 = mysqli_query($conn, $query);

                ?>
                <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <tr class="font-weight-bold">
                        <th>No.</th><th>Student name</th><th>Mark(%)</th><th>Pass/Fail</th>
                    </tr>
                    <?php
                    if($result1-> num_rows >0) {
                        $i = 1;
                         while ($row = $result1-> fetch_assoc()) {?>
                    <tr>
                        <td><?php  echo $i; ?></td>
                        <td><?php  echo $row["studentName"]?></td>
                        <td><?php  echo $row["mark"]?></td>
                        <td>
                        <?php
                        if($row["mark"] >= 50)
                        {
                            ?><span class="badge bg-success text-white">PASS</span><?php
                        }
                        else
                        {
                            ?><span class="badge bg-danger text-white">FAIL</span><?php
                        }
                        ?></td>
                    </tr>
                    <?php $i++; }
                    } ?>
                </table>
				
                </div>
            </div>
			
			
			
          </div>
		  

        
                  </div>
                </div>
              </div>  
	
    </div>
</section>

    <?php require("footer.php");?>

</body>
</html>




