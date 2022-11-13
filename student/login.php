<?php session_start(); ?>
<html>

<?php require ("header.php");?>
<?php require ("sql.php");?>

<?php
error_reporting(0);

    
    session_start();
    $matrix = $password = $studentName = '';
    $errors = array();


    //login
    if(isset($_POST['Login'])){
        //matrix
        if(empty($_POST['matrix'])){
            $errors['matrix'] = 'USN is required <br />';
        } else {
            $matrix = $_POST['matrix']; 
            if(!preg_match('/^[a-zA-Z0-9]*$/', $matrix)){
                $errors['matrix'] = 'Enter proper USN';
            }
        }

        //password
        if(empty($_POST['password'])){
            $errors['password'] = 'A Password is required <br />';
        } else {
            $password = $_POST['password'];
        }

        if(count($errors)==0){

            $query = "SELECT * FROM student
            WHERE matrixNum = '$matrix' AND spassword = '$password'";
            $result = mysqli_query($conn,$query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['matrix'] = $matrix;
                $_SESSION['password'] = $password;
                $_SESSION['studentName']= $studentName;
                while ($row = $result-> fetch_assoc()) 
                { 
                    $_SESSION['studentID'] = $row['studentID'];
                    //$_SESSION['studentname'] = $row['studentName'];
                }
                header('location: home.php');
            }
            else {
                array_push($errors, "The USN/password is incorrect");
            }
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
              <a href="../contact.php" class="nav-link">
                <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-address-card"></i> Contact</span
                >
              </a>
            </li>
		  
							  <li class="nav-item">
			   <div class="dropdown show ">
		  <a class="nav-link dropdown-toggle text-white " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-sign-in-alt"></i> Login</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="login.php">Student</a>
			<a class="dropdown-item" href="../teacher/login.php">Staff</a>
		  </div>
		</div>
			</li>
		  



 <li class="nav-item">
			   <div class="dropdown show ">
		  <a class="nav-link dropdown-toggle text-white " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                  <span class="text-white nav-link-inner--text"
                  ><i class="text-white fas fa-sign-in-alt"></i> Sign Up</span
                >
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="signup.php">Student</a>
			<a class="dropdown-item" href="../teacher/signup.php">Staff</a>
		  </div>
		</div>
			</li>

          
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  
  <section class="section section-shaped section-lg">
    <div class="shape shape-style-6 shape-primary">
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

<div class="row">
          <div class="col-md-8 mx-auto text-center">
            <span class="badge badge-success badge-pill mb-3">Student login </span>
          </div>
        </div>
		
<div class="row row-content align-text-center text-white ">
	<div class="col-12 offset-sm-2 col-sm-8 offset-sm-2 ">

                <div class="card card-body  bg-gradient-primary">

<div class="col-12  ">


 <form
              class="col s12 l5 white-text"
              
              method="POST"
              autocomplete="new-password"
            >
             
             



              <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="email"
                  >USN</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="USN"
                    id="email"
                    name="matrix"
                    type="text"
                    class="validate"
                  />
                </div>
              </div>
			  
			   <div class="form-group row">
                <label class="col-md-2 col-form-label text-white" for="password"
                  >Password</label
                >
                <div class="col-md-10">
                  <input
                    autocomplete="new-password"
                    class="white-text validate form-control"
                    placeholder="*********"
                    id="password"
                    name="password"
                    type="password"
                    class="validate"
                  />
                </div>
              </div>



              <div class="form-group row">
                <div class="offset-md-2 col-md-10">
                  <button class="btn btn-success form-control" name="Login" value="login" type="submit">
                    Login
                  </button>
                </div>
              </div>
			  
			                  

            </form>


                   
				   
				   
                </div>
            </div>
			</div>
</div>
</section>

	    <?php require("footer.php");?>

</body>

</html>






