<!DOCTYPE html>
<html>
<head>
<style>
	table th,td{
		border:2px solid black;
		border-collapse: collapse;
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
</style>	
</head>
<body>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<h2 align="center">admin review report</h2>
<div class="container">
	<table class="table table-striped" id="myTable">
		<col width="100px">	
		<col width="30px">
		<col width="80px">
		<tr>
					<th><font size="4px" align="center">Course file</font></th>
					<th><font size="4px"align="center">Status</font></th>
					<th><font size="4px"align="center">Remarks</font></th>
					<!-- <th><font size="4px">Very Good</font></th>
					<th><font size="4px">Good</font></th>
					<th><font size="4px">Average</font></th> -->
					
				</tr>
		<tr>
			<tr>
					
					<td><font size="4px">Individual time table</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
			<tr>
					
					<td><font size="4px">Class time table</font></td>
					<td>
						<i class="fa fa-check fa-2x" aria-hidden="true"></i>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Syllabus</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Assignment</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Mid Question paper</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Remedial classes</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Content beyond syllabus</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Roleplay</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Tutorial</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Quiz</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Bright student</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">Course feedback</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">CO-PO Attainment</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled=""width="100px">Not Selected</option>
							<option value="yes">YES</option>
							<option value="no">NO</option>
						</select>
					</td>
					<td>
						<textarea width="100px" height="100px"></textarea>
					</td>
					

				</tr>	
			</tr>
		</table>
	</div>
											