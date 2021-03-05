<?php
// session_start();
include ("../login/header.php");

require "../db.php";	


if(!isset($_SESSION['userid'])) header("Location:../login/index_login.php");

if (isset($_GET['sid']))
{
	$_SESSION['sid']=$_GET['sid'];
	$_SESSION['subject_name']=$_GET['subject_name'];
	header("Location:coursefile.php");
}

$fid = $_SESSION['userid'];
$qry = "SELECT distinct academic_year from subjects where fid = '$fid' order by substr(academic_year,2,2) desc ";
$res = mysqli_query ($db, $qry);

if (isset($_GET['acyear']))
{
	$acyear = $_GET['acyear'];
	$_SESSION['academic_year'] = $acyear;

	$qry = "SELECT * from subjects where academic_year='$acyear' and fid='$fid' and semester=2 ";
	$sem2 = mysqli_query ($db, $qry);

	$qry = "SELECT * from subjects where academic_year='$acyear' and fid='$fid' and semester=1 ";
	$sem1 = mysqli_query ($db, $qry);
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="progress-circle.css">
	<style type="text/css">
		body
		{
			background: linear-gradient(to right, #1CB5E0, #000046);
		}
		.sidebar
		{
			position: relative;
			display: block;

			/*margin: 30px 0;*/
			margin-top: 70px;
			height: 500px;
			background: rgba(0,0,0,0);
			/*padding: 10px;*/
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgba(0,0,0,0.6);
			border-radius: 5px;
			padding: 6px 0px 6px 0px;
			padding-top: 25px;
		}
		.sidebar a
		{
			text-decoration: none;
			color: white;
			width: 100%;
		}
		.sidebar a:hover
		{
			text-align: center;
		}
		.sidebar-option
		{
			height: 30px;
			text-align: center;
			transition: 0.3s ease-in-out;
		}
		.sidebar-option:hover
		{
			background-color: rgba(0,0,0,0.4);
		}
		.card
		{
			position: relative;
			margin: 30px 0;
			/*height: 300px;*/
			height: 42.5%;
			background: rgba(0,0,0,0);
			padding: 20px;
			box-sizing: border-box;
			box-shadow: 0 15px 25px rgba(0,0,0,0.6);
			border-radius: 5px;
		}
		.card:hover
		{
			background-color: rgba(0,0,0,0.2);
			cursor: pointer;
		}
		.card .subject
		{
			color: white;
			text-align: center;
			font-size: 20px;
			/*font-size: 140%;*/
		}
		.card .section
		{
			color: white;
			text-align: center;
			font-size: 15px;
		}		
	</style>
</head>
<body>
	<div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-11 sidebar" style="">
								<div style="font-size: 18px; text-align: center; color: white; margin-bottom: 10px;">Academic Year</div>
								<?php while ($row=mysqli_fetch_assoc($res)) { ?>
									<div class="sidebar-option"><a href="index.php?acyear=<?php echo $row['academic_year']; ?>"><?php echo $row['academic_year']; ?></a></div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-10">
					<div class="container-fluid">
						<?php 
						if (isset($sem2))
						if (mysqli_num_rows($sem2)>0) { ?>
						<h3 style="width: 100%; color: #fff; text-align: center;"><?php echo $acyear ?> Semester - 2</h3>
						<?php } ?>
						<div class="row">
							<?php 
							if (isset($sem2))
							while ($row = mysqli_fetch_assoc($sem2)) { 
								$sid = $row['sid'];
								$qry = "SELECT * FROM status where sid='$sid' ";
								$array = mysqli_fetch_array(mysqli_query($db, $qry));
								// echo count($status);
								$progress = 0;
								for ($i=1;$i<12;$i++) if ($array[$i]=="Completed") $progress++;

								$progress = floor(($progress/11)*100);
							?>
							<div class="col-sm-4">
								<div class="card" onclick="window.location.href='index.php?sid=<?php echo $row['sid']."&subject_name=".$row['subject_name'] ?>'">
									<div class="subject"><?php echo $row['subject_name'] ?></div>
									<div class="section">(<?php echo $row['year'] ?>/4 <?php echo $row['section'] ?>)</div>
									<div class="progress-circle progress-<?php echo $progress ?>" style="left: 50%;top: 0%;transform: translate(-60%,-90%);margin-top: 150px;"><span><?php echo $progress ?></span></div>
								</div>
							</div>
							<?php } ?>
						</div>

						<?php 
						if (isset($sem2))
						if (mysqli_num_rows($sem1)>0) { ?>
						<h3 style="color: #fff; text-align: center;"><?php echo $acyear ?> Semester - 1</h3>
						<?php } ?>
						<div class="row">
							<?php
							if (isset($sem1))
							while ($row = mysqli_fetch_assoc($sem1)) { 
								$sid = $row['sid'];
								$qry = "SELECT * FROM status where sid='$sid' ";
								$array = mysqli_fetch_array(mysqli_query($db, $qry));
								// echo count($status);
								$progress = 0;
								for ($i=1;$i<12;$i++) if ($array[$i]=="Completed") $progress++;

								$progress = floor(($progress/11)*100);
							?>
							<div class="col-sm-4">
								<div class="card" onclick="window.location.href='index.php?sid=<?php echo $row['sid']."&subject_name=".$row['subject_name'] ?>'">
									<div class="subject"><?php echo $row['subject_name'] ?></div>
									<div class="section">(<?php echo $row['year'] ?>/4 <?php echo $row['section'] ?>)</div>
									<div class="progress-circle progress-<?php echo $progress ?>" style="left: 50%;top: 0%;transform: translate(-60%,-90%);margin-top: 150px;"><span><?php echo $progress ?></span></div>
								</div>
							</div>
							<?php } ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>