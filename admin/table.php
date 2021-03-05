<?php
session_start();
require("../db.php");

$sid = $_GET['sid'];

if (isset($_GET['sid']))
{
  $qry = "SELECT * from subjects s inner join users u on s.fid=u.userid and s.sid='$sid' ";
  $param = mysqli_fetch_assoc(mysqli_query($db, $qry));

  $_SESSION['name'] = $param['name'];
  $_SESSION['userid'] = $param['userid'];
  $_SESSION['sid'] = $sid;
}

if (isset($_POST['update']))
{
	$individual_time_table = $_POST['individual_time_table'];
	$class_time_table = $_POST['class_time_table'];
	$course_plan = $_POST['course_plan'];
	$lesson_plan = $_POST['lesson_plan'];
	$assignment = $_POST['assignment'];
	$mid = $_POST['mid'];
	$remedial = $_POST['remedial'];
	$tutorial = $_POST['tutorial'];
	$quiz = $_POST['quiz'];
	$notes = $_POST['notes'];
	$co_po = $_POST['co_po'];

	$qry = "UPDATE `status` SET `individual_time_table`='$individual_time_table', `class_time_table`='$class_time_table', `course_plan`='$course_plan', `lesson_plan`='$lesson_plan', `assignment`='$assignment', `mid`='$mid', `remedial`='$remedial', `tutorial`='$tutorial', `quiz`='$quiz', `co_po`='$co_po', `notes`='$notes' WHERE sid='$sid' ";
	mysqli_query($db, $qry);

	?><script type="text/javascript">window.location.href="table.php?sid=<?php echo $sid ?>";</script><?php
}

$qry = "SELECT * FROM status where sid='$sid' ";
$data = mysqli_fetch_assoc(mysqli_query($db, $qry));

?>


<!DOCTYPE html>
<html>
<head>
<style>
	table th,td{
		border:2px solid black;
		/*border-collapse: collapse;*/
	}
	table{
		width:60%;
		box-shadow: 0 15px 25px rgba(0,0,0,0.5);
	}
	th{
		padding:2px;
		text-align: center;
	}
	td{
		padding:15px;
		text-align: center;
	}
	textarea
	{
		width: 100%;
	}
</style>	
</head>
<body>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<h2 align="center">admin review report</h2>
<div class="container">
	<form method="post">
	<table class="table table-striped" id="myTable">
		<col width="100px">	
		<col width="30px">
		<col width="80px">
		<col width="20px">
		<tr>
			<th><font size="4px" align="center">Course file</font></th>
			<th><font size="4px"align="center">Status</font></th>
			<th><font size="4px"align="center">Remarks</font></th>
			<th><font size="4px"align="center">Action</font></th>
			<!-- <th><font size="4px">Very Good</font></th>
			<th><font size="4px">Good</font></th>
			<th><font size="4px">Average</font></th> -->
		</tr>
		<!-- <tr> -->
		<tr>
				
				<td><font size="4px">Individual time table</font></td>
				<td>
					<?php if ($data['individual_time_table']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
						  else if(substr($data['individual_time_table'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
				</td>
				<td>
					<textarea name="individual_time_table" width="100px" height="100px"><?php 
					if(strpos($data['individual_time_table'], '_req_') !== false) echo substr($data['individual_time_table'], 5);
                    else echo $data['individual_time_table'];
					?>
					</textarea>
				</td>
				<td>
					<button onclick="window.location.href='../fileupload/index.php?page=individual_timetable'; return false;">View</button>
					<button onclick="$('textarea[name=\'individual_time_table\']').val('Completed'); return false;">Mark Completed</button></td>
				

			</tr>

			<tr>
					
					<td><font size="4px">Class time table</font></td>
					<td>
						<?php if ($data['class_time_table']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['class_time_table'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="class_time_table" width="100px" height="100px"><?php 
						if(strpos($data['class_time_table'], '_req_') !== false) echo substr($data['class_time_table'], 5);
                        else echo $data['class_time_table'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../fileupload/index.php?page=class_timetable'; return false;">View</button>
						<button onclick="$('textarea[name=\'class_time_table\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Course Plan</font></td>
					<td>
						<?php if ($data['course_plan']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['course_plan'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="course_plan" width="100px" height="100px"><?php 
						if(strpos($data['course_plan'], '_req_') !== false) echo substr($data['course_plan'], 5);
                        else echo $data['course_plan'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../fileupload/index.php?page=course_plan'; return false;">View</button>
						<button onclick="$('textarea[name=\'course_plan\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Lesson Plan</font></td>
					<td>
						<?php if ($data['lesson_plan']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['lesson_plan'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="lesson_plan" width="100px" height="100px"><?php 
						if(strpos($data['lesson_plan'], '_req_') !== false) echo substr($data['lesson_plan'], 5);
                        else echo $data['lesson_plan'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../fileupload/index.php?page=lesson_plan'; return false;">View</button>
						<button onclick="$('textarea[name=\'lesson_plan\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Assignment</font></td>
					<td>
						<?php if ($data['assignment']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['assignment'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="assignment" width="100px" height="100px"><?php 
						if(strpos($data['assignment'], '_req_') !== false) echo substr($data['assignment'], 5);
                        else echo $data['assignment'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../paper/assignment.php'; return false;">View</button>
						<button onclick="$('textarea[name=\'assignment\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Mid Question paper</font></td>
					<td>
						<?php if ($data['mid']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['mid'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="mid" width="100px" height="100px"><?php 
						if(strpos($data['mid'], '_req_') !== false) echo substr($data['mid'], 5);
                        else echo $data['mid'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../paper/midpapers.php'; return false;">View</button>
						<button onclick="$('textarea[name=\'mid\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Remedial classes</font></td>
					<td>
						<?php if ($data['remedial']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['remedial'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="remedial" width="100px" height="100px"><?php 
						if(strpos($data['remedial'], '_req_') !== false) echo substr($data['remedial'], 5);
                        else echo $data['remedial'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../remedial/index.php'; return false;">View</button>
						<button onclick="$('textarea[name=\'remedial\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Tutorial</font></td>
					<td>
						<?php if ($data['tutorial']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['tutorial'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="tutorial" width="100px" height="100px"><?php 
						if(strpos($data['tutorial'], '_req_') !== false) echo substr($data['tutorial'], 5);
                        else echo $data['tutorial'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../tutorial/index.php'; return false;">View</button>
						<button onclick="$('textarea[name=\'tutorial\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Quiz</font></td>
					<td>
						<?php if ($data['quiz']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['quiz'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="quiz" width="100px" height="100px"><?php 
						if(strpos($data['quiz'], '_req_') !== false) echo substr($data['quiz'], 5);
                        else echo $data['quiz'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../quiz/index.php'; return false;">View</button>
						<button onclick="$('textarea[name=\'quiz\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>

				<tr>
					
					<td><font size="4px">Notes</font></td>
					<td>
						<?php if ($data['notes']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['notes'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="notes" width="100px" height="100px"><?php 
						if(strpos($data['notes'], '_req_') !== false) echo substr($data['notes'], 5);
                        else echo $data['notes'];
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../fileupload/index.php?page=notes'; return false;">View</button>
						<button onclick="$('textarea[name=\'notes\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>	
				<tr>
					
					<td><font size="4px">CO-PO Attainment</font></td>
					<td>
						<?php if ($data['co_po']=="Completed") echo "<i class='fa fa-check fa-2x' aria-hidden='true'></i>";
							  else if(substr($data['co_po'], 0, 5) == "_req_") echo "<i class='fa fa-exclamation fa-2x' aria-hidden='true'></i>"; ?>
					</td>
					<td>
						<textarea name="co_po" width="100px" height="100px"><?php 
						if(strpos($data['co_po'], '_req_') !== false) echo trim(substr($data['co_po'], 5));
                        else echo trim($data['co_po']);
						?>
						</textarea>
					</td>
					<td>
						<button onclick="window.location.href='../fileupload/index.php?page=co_po_attainment'; return false;">View</button>
						<button onclick="$('textarea[name=\'co_po\']').val('Completed'); return false;">Mark Completed</button></td>
					

				</tr>	
			<!-- </tr> -->
		</table>
	</div>
	<div style="text-align: center;"><input style="height: 40px; width: 80px; margin-bottom: 50px;" type="submit" name="update" value="Update"></div>
</form>
</div>


<script>
	$("textarea").each(function(){
        this.value = $.trim(this.value);
    });
</script>
</body>
</html>
											