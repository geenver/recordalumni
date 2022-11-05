

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facultydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){

	$id = $_POST['id'];
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$year = $_POST['year'];
	$course = $_POST['course'];
	$college = $_POST['college'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$tel = $_POST['tel'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$current = $_POST['current'];
	$company = $_POST['company'];
	$companyaddress = $_POST['companyaddress'];
	$salary = $_POST['salary'];
	$status = $_POST['status'];
	$source = $_POST['source'];
	$companyname = $_POST['companyname'];
	$employeddate = $_POST['employeddate'];
	$position = $_POST['position'];
	$salaryrange = $_POST['salaryrange'];
 	// Count total uploaded files
 	$totalfiles = count($_FILES['file']['name']);

 	// Looping over all files
 	for($i=0;$i<$totalfiles;$i++){
 
	 	$filename = $_FILES['file']['name'][$i];
	 
		// Upload files and store in database
		if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],'upload_pics/'.$filename)){
				// Image db insert sql
				$insert = "UPDATE tracer SET lastname = '$lastname', firstname = '$firstname', middlename = '$middlename', year = '$year', course = '$course', college = '$college', age = '$age', gender = '$gender', address = '$address', tel = '$tel', mobile = '$mobile', email = '$email', current = '$current', company = '$company', companyaddress = '$companyaddress', salary = '$salary', status = '$status', source = '$source', companyname = '$companyname', employeddate = '$employeddate', position = '$position', salaryrange = '$salaryrange', image = '$filename' WHERE id = '$id' ";
				if(mysqli_query($conn, $insert)){
					echo "
						<script>
							window.alert('Successfully Update Information!');
							window.location.href = './tracer.php';
						</script>
					";
				}
				else{
				  echo 'Error: '.mysqli_error($conn);
				}
		}else{
			echo 'Error in uploading file - '.$_FILES['file']['name'][$i].'<br/>';
		}
	 
	}
} 
?>

<!doctype html>
<html lang="en">

<head>
	<title>Alumni Information System</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">


	<script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="datatables/jquery.dataTables.min.js"></script>
    <script src="datatables/dataTables.bootstrap.min.js"></script>



</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>


				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
							
							</ul>
						</li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle icon-menu">
                  Today is: <?php echo date("l");?>
              </a>
             
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle icon-menu">
                  Date: <?php echo date("Y-m-d");?>
              </a>
             
            </li>

          

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/logo.png" class="img-circle" alt="Avatar"> <span>Administrator</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
							
								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
				<ul class="nav">
						<li><a href="students.php" class=""><i class="lnr lnr-home"></i> <span>Alumni Members</span></a></li>
						<li><a href="tracer.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Alumni Tracer</span></a></li>

						<li><a href="cam.php" class=""><i class="lnr lnr-chart-bars"></i> <span>College of Allied Medicine</span></a></li>
						<li><a href="cba.php" class=""><i class="lnr lnr-chart-bars"></i> <span>College of Business Administration</span></a></li>
						<li><a href="cen.php" class=""><i class="lnr lnr-chart-bars"></i> <span>College of Engineering</span></a></li>
						<li><a href="cit.php" class=""><i class="lnr lnr-chart-bars"></i> <span>College of Industrial Technology</span></a></li>
						<li><a href="cte.php" class=""><i class="lnr lnr-chart-bars"></i> <span>College of Teachers Education</span></a></li>
						<li><a href="cas.php" class=""><i class="lnr lnr-chart-bars"></i> <span>College of Arts and Sciences</span></a></li>
						<li><a href="tracer.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Job Tracer</span></a></li>


						<li><a href="../index.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Logout</span></a></li>
						
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							
						</div>
						
					
					      <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Register Alumni</h3>
                            
                            <?php 
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "facultydb";

								// Create connection
								$conn = new mysqli($servername, $username, $password, $dbname);
								// Check connection
								if ($conn->connect_error) {
								  die("Connection failed: " . $conn->connect_error);
								}


		                      if (isset($_GET['id'])) {
		                      	
		                      	$id = $_GET['id'];

		                      	$query = mysqli_query($conn, "SELECT * FROM tracer WHERE id = '$id' ");

		                      	$i = 1;

		                      	while ($row = mysqli_fetch_array($query)) {
		                      	?>
                             	<form class="form-horizontal" action="edittracer.php" method="post" enctype="multipart/form-data">
                            <!-- .row -->
                                <div class="row">
                                    <div class="col-md-4 col-xs-12">
                                        <div class="white-box">
                                            <div class="user-bg"> 
                                                <div class="overlay-box">
                                                    <div class="user-content">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-btm-box">
                                                 <h3>Upload Alumni  Picture</h3>
	 												<input type="file" name="file[]" id="file" class="form-control btn btn-warning" multiple required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xs-12">
                                        <div class="white-box">
                                     
                                              
                                                <div class="form-group">
                                                    <label for="example-email" class="col-md-12">Last Name</label>
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="id"  class="form-control form-control-line" value="<?php echo $row['id']; ?>" required> 
                                                        <input type="text" name="lastname"  class="form-control form-control-line" value="<?php echo $row['lastname']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email" class="col-md-12">First Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="firstname" class="form-control form-control-line" value="<?php echo $row['firstname']; ?>" required> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Middle Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="middlename" class="form-control form-control-line" value="<?php echo $row['middlename']; ?>" required> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Year/Graduated</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="year" class="form-control form-control-line" value="<?php echo $row['year']; ?>" required> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Course/Program</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="course" class="form-control form-control-line" value="<?php echo $row['course']; ?>" required> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">College</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="college" class="form-control form-control-line" value="<?php echo $row['college']; ?>" required> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Age</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="age" value="<?php echo $row['age']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Gender</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Home Address</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>


												<div class="form-group">
                                                    <label class="col-md-12">Telephone Number</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="tel" value="<?php echo $row['tel']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Mobile Number</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Email Address</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="email" value="<?php echo $row['email']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Current Job Position</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="current" value="<?php echo $row['current']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Company Affiliation</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="company" value="<?php echo $row['company']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Company Address</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="companyaddress" value="<?php echo $row['companyaddress']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Approximate Monthly Salary</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="salary" value="<?php echo $row['salary']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Have you been emploed immediately 6 months or less after graduation</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="status" value="<?php echo $row['status']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">In your first employment, which of the following has been your source</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="source" value="<?php echo $row['source']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<h1 class="alert alert-success">Employment Record</h1>

												<div class="form-group">
                                                    <label class="col-md-12">Name of the Company</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="companyname" value="<?php echo $row['companyname']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>


												<div class="form-group">
                                                    <label class="col-md-12">Date Employed</label>
                                                    <div class="col-md-12">
                                                        <input type="date" name="employeddate" value="<?php echo $row['employeddate']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Employment Position and Employment Status</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="position" value="<?php echo $row['position']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Approximate Monthly Salary Range</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="salaryrange" value="<?php echo $row['salaryrange']; ?>" class="form-control form-control-line"> 
                                                    </div>
                                                </div>
                                              
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->


		                    <?php }} ?>


						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://www.themeineed.com" target="_blank">CPT Thesis</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
