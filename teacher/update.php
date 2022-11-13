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

$id = $_GET['id'];

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
            <span class="badge badge-danger badge-pill mb-3">Update Quiz </span>
					
			       <form method="POST" action="updateQuiz.php">
        <div class="quiz-details table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">

                 <?php 
                    if($result-> num_rows >0) {
                    $i = 1;
                    while ($row = $result-> fetch_assoc()) {
                 ?>
                    <tr>
                        <td>
                          <p class="title font-weight-bold">Quiz ID</p>
                             <input type="text"  class="form-control"  name="quizid" value="<?php echo $row["quizID"]?>">
                        </td>
                        <td class="right">
                           <p class="title font-weight-bold">TITLE</p>
                          <input type="text" class="form-control" name="quizName" value="<?php echo $row["quizName"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <p class="title font-weight-bold">DESCRIPTION</p>
                           <input type="text" class="form-control" name="description" value="<?php echo $row["quizDescription"]?>">
                        </td>
                        <td class="right">
                           <p class="title font-weight-bold">NUMBER OF STUDENTS</p>
                           <input type="number" class="form-control" name="numStudents" value="<?php echo $row["numStudents"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="title font-weight-bold">START DATE AND TIME</p>
                            <input type="datetime-local" class="form-control" name="openDate" value="<?php echo $row["dateOpen"]?>" >
                        </td>
						 <td class="right">
                            <p class="title font-weight-bold">END DATE AND TIME</p>
                             <input type="datetime-local" class="form-control" name="closeDate" value="<?php echo $row["dateClose"]?>" >
                        </td>
                    </tr>
                    <?php }
                   } ?>
                </table>
        </div>
    
            <span id="writeroot"></span>
            <button  type="submit" class="form-control btn btn-warning " name="submit"><span>Update</span></button>
            <div class="clear"></div>
        </form>
			
			
          </div>
		  

        
                  </div>
                </div>
              </div>  
	
    </div>
</section>

    <?php require("footer.php");?>

</body>
</html>






 
		
		
		
		
	