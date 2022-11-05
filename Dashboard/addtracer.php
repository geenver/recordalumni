

<?php

                      error_reporting( ~E_NOTICE ); // avoid notice
                      
                      $DB_HOST = 'localhost';
                      $DB_USER = 'root';
                      $DB_PASS = '';
                      $DB_NAME = 'facultydb';
                      
                      try{
                        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
                        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      }
                      catch(PDOException $e){
                        echo $e->getMessage();
                      }
                      
                      if(isset($_REQUEST['submit']))
                      {
                     
        
                        $lastname=$_REQUEST['lastname'];
                        $firstname=$_REQUEST['firstname'];
						$middlename=$_REQUEST['middlename'];
						$year=$_REQUEST['year'];
						$course=$_REQUEST['course'];
						$college=$_REQUEST['college'];
						$age=$_REQUEST['age'];
						$gender=$_REQUEST['gender'];
						$address=$_REQUEST['address'];
						$tel=$_REQUEST['tel'];
						$mobile=$_REQUEST['mobile'];
						$email=$_REQUEST['email'];
						$current=$_REQUEST['current'];
						$company=$_REQUEST['company'];
						$companyaddress=$_REQUEST['companyaddress'];
						$salary=$_REQUEST['salary'];
						$status=$_REQUEST['status'];
						$source=$_REQUEST['source'];
						$companyname=$_REQUEST['companyname'];
						$employeddate=$_REQUEST['employeddate'];
						$position=$_REQUEST['position'];
						$salaryrange=$_REQUEST['salaryrange'];
						
						
						
						
						
						





                        $image= $_REQUEST['image'];


                        
                        
                        $imgFile = $_FILES['image']['name'];
                        $tmp_dir = $_FILES['image']['tmp_name'];
                        $imgSize = $_FILES['image']['size'];


                       
                        
                        
                        if(empty($imgFile)){
                          $errMSG = "Please Select Image File.";
                        }
                        else
                        {
                          $upload_dir = 'upload_pics/'; // upload directory
                      
                          $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
                        
                          // valid image extensions
                          $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                        
                          // rename uploading image
                          $image = $imgFile;
                            
                          // allow valid image file formats
                          if(in_array($imgExt, $valid_extensions)){     
                            // Check file size '5MB'
                            if($imgSize < 50000000)        {
                              move_uploaded_file($tmp_dir,$upload_dir.$image);
                            }
                            else{
                              $errMSG = "Sorry, your file is too large.";
                            }
                          }
                          else{
                            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
                          }
                        }


                       
                        
                        // if no error occured, continue ....
                        if(!isset($errMSG))
                        {
                          $stmt = $DB_con->prepare('INSERT INTO tracer(lastname,firstname,middlename,year,course,college,age,gender,address,tel,mobile,email,current,company,companyaddress,salary,status,source,companyname,employeddate,position,salaryrange,image) 
                                                    VALUES(:ulastname,:ufirstname,:umiddlename,:uyear,:ucourse,:ucollege,:uage,:ugender,:uaddress,:utel,:umobile,:uemail,:ucurrent,:ucompany,:ucompanyaddress,
													:usalary,:ustatus,:usource,:ucompanyname,:uemployeddate,:uposition,:usalaryrange,:uimage)');
                          

                     
                          $stmt->bindParam(':ulastname',$lastname);
                          $stmt->bindParam(':ufirstname',$firstname);
                          $stmt->bindParam(':umiddlename',$middlename);
						  $stmt->bindParam(':uyear',$year);
						  $stmt->bindParam(':ucourse',$course);
						  $stmt->bindParam(':ucollege',$college);
						  $stmt->bindParam(':uage',$age);
						  $stmt->bindParam(':ugender',$gender);
						  $stmt->bindParam(':uaddress',$address);
						  $stmt->bindParam(':utel',$tel);
						  $stmt->bindParam(':umobile',$mobile);
						  $stmt->bindParam(':uemail',$email);
						  $stmt->bindParam(':ucurrent',$current);
						  $stmt->bindParam(':ucompany',$company);
						  $stmt->bindParam(':ucompanyaddress',$companyaddress);
						  $stmt->bindParam(':usalary',$salary);
						  $stmt->bindParam(':ustatus',$status);
						  $stmt->bindParam(':usource',$source);
						  $stmt->bindParam(':ucompanyname',$companyname);
						  $stmt->bindParam(':uemployeddate',$employeddate);
						  $stmt->bindParam(':uposition',$position);
						  $stmt->bindParam(':usalaryrange',$salaryrange);
						  $stmt->bindParam(':uimage',$image);

                          
                          if($stmt->execute())
                          {
                            $successMSG = "SUCCESSFULY REGISTERED ALUMNI IN THE TRACER";
                            
                          }
                          else
                          {
                            $errMSG = "THERE IS AN ERROR IN REGISTRATION";
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

                              <?php if (isset($successMSG)) {echo "<div class=\"alert alert-success\"><strong>Note: </strong>" .$successMSG. "</div>"; 

                                                    
                                                }

                                             ?>
                         <?php if (isset($errMSG)) {echo "<div class=\"alert alert-danger\"><strong>Note: </strong>" .$errMSG. "</div>"; }?>
                            
                             <form class="form-horizontal" action="addtracer.php" method="post" enctype="multipart/form-data">
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
                                                    <input class="btn btn-warning" type="file" name="image" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-xs-12">
                                        <div class="white-box">
                                     
                                              
                                                <div class="form-group">
                                                    <label for="example-email" class="col-md-12">Last Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="lastname"  class="form-control form-control-line" id="example-email"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email" class="col-md-12">First Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="firstname" class="form-control form-control-line"> 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Middle Name</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="middlename" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Year/Graduated</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="year" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Course/Program</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="course" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">College</label>
                                                    <div class="col-md-12">
                                                        <select name="college" class="form-control form-control-line">
															<option>College of Agriculture</option>
															<option>College of Allied Medicine</option>
															<option>College of Business Administration</option>
															<option>College of Engineering</option>
															<option>College of Industrial Technology</option>
															<option>College of Teachers Education</option>
															<option>College of Arts and Sciences</option>
														</select> 
                                                    </div>
                                                </div>


												<div class="form-group">
                                                    <label class="col-md-12">Age</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="age" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Gender</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="gender" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Home Address</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="address" class="form-control form-control-line"> 
                                                    </div>
                                                </div>


												<div class="form-group">
                                                    <label class="col-md-12">Telephone Number</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="tel" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Mobile Number</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="mobile" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Email Address</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="email" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Current Job Position</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="current" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Company Affiliation</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="company" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Company Address</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="companyaddress" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Approximate Monthly Salary</label>
                                                    <div class="col-md-12">
                                                        <input type="number" name="salary" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Have you been emploed immediately 6 months or less after graduation</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="status" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">In your first employment, which of the following has been your source</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="source" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<h1 class="alert alert-success">Employment Record</h1>

												<div class="form-group">
                                                    <label class="col-md-12">Name of the Company</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="companyname" class="form-control form-control-line"> 
                                                    </div>
                                                </div>


												<div class="form-group">
                                                    <label class="col-md-12">Date Employed</label>
                                                    <div class="col-md-12">
                                                        <input type="date" name="employeddate" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Employment Position and Employment Status</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="position" class="form-control form-control-line"> 
                                                    </div>
                                                </div>

												<div class="form-group">
                                                    <label class="col-md-12">Approximate Monthly Salary Range</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="salaryrange" class="form-control form-control-line"> 
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
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
