<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	    <title>LUISIANA</title>
	    <!-- Favicon-->
	    <link rel="icon" href="images/favlui.png" type="image/x-icon">
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
	</head>
	<style type="text/css">
	body {
		font-family: 'Arial';
	}
	p {
		font-size: 12px;
	}
	table, th, td {
		border-spacing: 0px;
  		border: 1px solid black;
	}
	</style>

	<body>
		<br/>
		<div>
			<center><a href="./job_tracer.php" style="text-decoration: none; font-size: 20px;">BACK</a><a href="" style="text-decoration: none; font-size: 20px; margin-left: 355px;" onclick="printDiv();"><i class="material-icons">print</i></a></center>
		</div>
		<div id="invoice-POS">
			<table style="width: 100%; border: solid black 1px;">
				<tr>
					<td colspan="3" style="border: solid black 1px;"><center><img src="img/slsu.png" style="width: 30%;"></center></td>
				</tr>
				<tr>
					<td colspan="2" style="border: solid black 1px;"><center><b>Southern Luzon State University - Alumni Tracer</b></center></td>
					<td style="border: solid black 1px;"><center><b>Date: <?php echo date('F d, Y'); ?></b></center></td>
				</tr>
				<tr>
					<th style="border: solid black 1px;">Fullname</th>
					<th style="border: solid black 1px;">Position</th>
					<th style="border: solid black 1px;">Company</th>
				</tr>
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

					$query = mysqli_query($conn, "SELECT * FROM tracer ORDER BY id DESC");

					$i = 1;

					while ($row = mysqli_fetch_array($query)) {

					?>
					<tr>
						<td style="border: solid black 1px;"><?php echo $row['lastname'] .', '. $row['firstname'] .' '. $row['middlename']; ?></td>
						<td style="border: solid black 1px;"><?php echo $row['current']; ?></td>
						<td style="border: solid black 1px;"><?php echo $row['companyname']; ?></td>
					</tr>
				<?php } ?>
				<tr>
					<th colspan="3" style="border: solid black 1px;">
						<br/>
         				Total Currently Employed - 
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

             				$result = $conn->query("SELECT count(*) FROM tracer");
							$row = $result->fetch_row();
							?>
							(<?php echo $row[0]; ?>)
             			<?php ?>
             			<br/><br/>
					</th>
				</tr>
			</table>
		</div><!--End Invoice-->
	</body>
</html>
<script type="text/javascript">
	function printDiv() {
	  var divToPrint = document.getElementById('invoice-POS');
	  var newWin = window.open('', 'Print-Window');
	  newWin.document.open();
	  newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
	  newWin.document.close();
	  setTimeout(function() {
	    newWin.close();
	  }, 10);
	}
</script>