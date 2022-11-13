<html>

<?php require ("header.php");?>


<?php
session_start();
require_once 'sql.php';


$id = $_SESSION["instructorID"];

$sql = "SELECT * FROM `instructor`
        WHERE `instructorID` = $id";

 $res = mysqli_query($conn,$sql);
    if ($res == true) {
        global $tname;
        while ($row = mysqli_fetch_array($res)) {
            $tname = $row['name'];
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


<div class="container"> 
      
<div class="row">
            <div class="col-sm-12 mb-3">  
              <div class="card card-body bg-gradient-white text-white mt-3">
			  <div class="col-12 mx-auto text-center">
            <span class="badge badge-danger badge-pill mb-3">Quiz List</span>
					  <a href="create.php" type ="btn " class="mb-1 btn btn-success pull-right">Create Quiz</a> 
		  <?php 
            $sql ="select *  from quiz";
            $res=mysqli_query($conn,$sql);
            if($res)
            {
                echo "<div class=\"table-responsive\" ><table class=\" table table-striped table-hover table-bordered text-center \">
				<thead class=\" font-weight-bold \">
				<tr>
				<td>Quiz Name</td>
				<td>Quiz Desc</td>
				<td>Quiz Code</td>
				<td>Update</td>
				<td>Delete</td>
				</tr>
				</thead>";
                while ($row = mysqli_fetch_assoc($res)) {                
                    echo "<tr><td>".$row["quizName"]."</td>
					<td>".$row["quizDescription"]."</td>
					<td>".$row["quizCode"]."</td>
					<td><a id=\"t\" href='update.php?id=".$row['quizID']."'> <i class=\"fas fa-edit\"> Update </i></a></td>
					<td><a id=\"tq\" href='deletequiz.php?id=".$row['quizID']."'> <i class=\"fas fa-trash-alt\" onClick=\"return confirm('Are you sure to remove this quiz?')\" aria-hidden=\"true\"> Delete </i></a></td></tr>"; 
                }
                echo "</table></div>";
            }
            ?>
          </div>
		  

        
                  </div>
                </div>
              </div>  
	
    </div>
</section>

    <?php require("footer.php");?>

</body>
</html>


