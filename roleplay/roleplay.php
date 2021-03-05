<?php 

require "../db.php";
include ("../header/header.php");

// $qry = "";
$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];
$rid = $_GET['rid'];

if (isset($_POST['save_roleplay']))
{
    $data = $_POST['data'];

	$qry = "UPDATE roleplay set data='$data' where id='$rid' ";
	mysqli_query($db, $qry);

    ?><script type="text/javascript">window.location.href="roleplay.php?rid=<?php echo $rid; ?>";</script><?php

}


$qry = "SELECT * FROM subjects where sid='$sid' ";
$res = mysqli_query($db, $qry);
$top_data = mysqli_fetch_assoc($res);

$qry = "SELECT * FROM roleplay where id='$rid' ";
$res = mysqli_query($db, $qry);
$data = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html>
<head>
	<title fontsize="20px">ROLEPLAY</title>
</head>
<style>

	html::-webkit-scrollbar
	{
		width: 10px;
		background-color: #F5F5F5;
	}

	html::-webkit-scrollbar-thumb
	{
		border-radius: 20px;
		background-image: -webkit-gradient(linear,
										   left bottom,
										   left top,
										   color-stop(1.44, rgb(122,130,217)));
		-webkit-background-color: rgba(0,0,0,1);
	}



	#sidebar
    {
        padding-left: 20px;
    }
    #sidebar.active {
      /*margin-left: -505px;*/
    }
    ul
    {
        list-style: none;
    }
	table th,td{
		border:2px solid black;
		border-collapse: collapse;
	}
	table{
		width:100%;
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
	p{
		font-size:15px;
	}
	input,textarea{
		border: 1px solid black;
	}
	.student div
	{
		float: left;
		margin-right: 120px;
	}
	select
	{
		height: 100%;
		width: 100%;
	}
</style>
<body>
<h1 align="center">DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING</h2>
<h2 align="center">Student Assessment Roleplay</h2>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div style="text-align: center; margin-bottom: 30px;">
	<button onclick="copy()" class='btn'>Add Student</button>
	<button onclick="save()" class='btn'>Save</button>
</div>

<div class="container" style="margin-bottom: 40px;">

	<div class="row">
		<div class="col-sm-6">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">Year&Sem : </div>
					<div class="col-sm-5"><?php echo $top_data['year']."/4 sem - ".$top_data['semester'] ?></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="container" style="width: 100%;">
				<div class="row">
					<div class="col-sm-2">Date : </div>
					<div class="col-sm-5"><?php echo $data['modified']; ?></div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 10px;">
		<div class="col-sm-6">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">Subject : </div>
					<div class="col-sm-5"><?php echo $top_data['subject_name']; ?></div>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="container" style="width: 100%;">
				<div class="row">
					<div class="col-sm-2">Topic : </div>
					<div class="col-sm-5"><?php echo $data['name']; ?></div>
				</div>
			</div>
		</div>
	</div>

</div>

<div class="container">
	<div id="save">
		<?php
		if ($data['data']!="") {echo $data['data'];}
		else
		{
		?>
		<div id="copy">
			<div class="student">
				<div>Roll no : <input onchange="update(this)"></div>
				<div>Name : <input onchange="update(this)"></div>
				<div>Role Played : <input onchange="update(this)"></div>
			</div>
			<table class="table table-striped" id="myTable">
				<col width="700">
				<col width="70">
				<col width="70">
				<col width="70">
				<col width="70">
				
				<tr>
					<th><font size="4px" align="center">Criteria</font></th>
					<th><font size="4px"align="center">Rating</font></th>
					<!-- <th><font size="4px">Very Good</font></th>
					<th><font size="4px">Good</font></th>
					<th><font size="4px">Average</font></th> -->
					
				</tr>
				<tr>
					
					<td><font size="4px">Preparation and  presentation of topic</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled="" selected>Not Selected</option>
							<option value="Excellent">Excellent</option>
							<option value="Very_Good">Very Good</option>
							<option value="Good">Good</option>
							<option value="Average">Average</option>
						</select>
					</td>
					

				</tr>
				<tr>
					<td><font size="4px">presentation of the role palyed</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled="" selected>Not Selected</option>
							<option value="Excellent">Excellent</option>
							<option value="Very_Good">Very Good</option>
							<option value="Good">Good</option>
							<option value="Average">Average</option>
						</select>
					</td>
				</tr>
				<tr>
					
					<td><font size="4px">usage of props</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled="" selected>Not Selected</option>
							<option value="Excellent">Excellent</option>
							<option value="Very_Good">Very Good</option>
							<option value="Good">Good</option>
							<option value="Average">Average</option>
						</select>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">body language,eyecontact and hand gestures</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled="" selected>Not Selected</option>
							<option value="Excellent">Excellent</option>
							<option value="Very_Good">Very Good</option>
							<option value="Good">Good</option>
							<option value="Average">Average</option>
						</select>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">audibility</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled="" selected>Not Selected</option>
							<option value="Excellent">Excellent</option>
							<option value="Very_Good">Very Good</option>
							<option value="Good">Good</option>
							<option value="Average">Average</option>
						</select>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">imagination and security</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled="" selected>Not Selected</option>
							<option value="Excellent">Excellent</option>
							<option value="Very_Good">Very Good</option>
							<option value="Good">Good</option>
							<option value="Average">Average</option>
						</select>
					</td>
					

				</tr>
				<tr>
					
					<td><font size="4px">capturing the interest of the class and efficiency in conveying the message</font></td>
					<td>
						<select onchange="update(this)">
							<option disabled="" selected>Not Selected</option>
							<option value="Excellent">Excellent</option>
							<option value="Very_Good">Very Good</option>
							<option value="Good">Good</option>
							<option value="Average">Average</option>
						</select>
					</td>
					

				</tr>
				

			</table>
			<br>
			<br>
			<br>
			<br>
	</div>
		<div id="student"></div>
	
		<br></br>
		<p>any other comments</p>
		<textarea id="description_id" onchange="update(this)" cols="100" rows="10" name="comment"></textarea>
		</div>
	<?php } ?>

</div>
</div>
<br></br>
<div class="container">
	<div class="row">
		<div class="col-sm-10">
<input type="text" name="rsign" required=""></input>
<p>hod-cse</p>
</div>
<div class="col-sm-2">
	<input type="text" name="hsign" required=""></input>
<p>assembled by</p>
</div>
</div>		

</body>
<script>
	var autoExpand = function (field) {
		

		// Reset field height
		field.style.height = 'inherit';

		// Get the computed styles for the element
		var computed = window.getComputedStyle(field);

		// Calculate the height
		var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
		             + parseInt(computed.getPropertyValue('padding-top'), 10)
		             + field.scrollHeight
		             + parseInt(computed.getPropertyValue('padding-bottom'), 10)
		             + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

		field.style.height = height + 'px';

	};

	function copy()
    {
    	// var copy = $('#copy').html();
    	// var student =
    	$('#student').html($('#student').html()+"<br><br><br>"+$('#copy').html());
    }
    function redirectPost(url, data) {
        var form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = url;
        for (var name in data) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = data[name];
            form.appendChild(input);
        }
        form.submit();
    }
    function myDeleteFunction() {
      document.getElementById("myTable").deleteRow(-1);
    }
    function update(obj) 
    {
      if ($(obj).is("input")) $(obj).attr("value",$(obj).val());
      if ($(obj).is("textarea")) $(obj).text(obj.value);
      // if ($(obj).is("select")) $(obj).val($(obj).val());
      // $("select").('option[value="Good"]').attr('selected', 'selected');
      if($(obj).is("select"))
      {
      	$(obj).find("option").removeAttr("selected");
      	$(obj).find("option[value="+$(obj).val()+"]").attr('selected','selected');
      }
      
      // if ($(obj).is("select")) $(obj).val($(obj).val());




      // if ($(obj).is('input[name="papot"]:checked')) console.log($('input[name="papot"]:checked').val());
      // if ($(obj).is('input[name="potrp"]:checked')) console.log($('input[name="potrp"]:checked').val());
      // if ($(obj).is('input[name="uop"]:checked')) console.log($('input[name="uop"]:checked').val());
      // if ($(obj).is('input[name="uop"]:checked')) console.log($('input[name="uop"]:checked').val());
    }    
    function save()
    {
        var copy = $('#save').html();
        redirectPost("roleplay.php?rid=<?php echo $rid; ?>",{save_roleplay : "yes", data : copy });
    }
    function copy()
    {
    	var copy = $('#copy').html();
    	// var copy = ' <div class="student"> <div>Roll no : <input type="" name=""></div> <div>Name : <input type="" name=""></div> <div>Role Played : <input type="" name=""></div> </div> <table class="table table-striped" id="myTable"> <col width="700"> <col width="70"> <col width="70"> <col width="70"> <col width="70"><tr> <th><font size="4px">Criteria</font></th> <th><fontsize="4px">Excellent</font></th> <th><font size="4px">Very Good</font></th> <th><font size="4px">Good</font></th> <th><fontsize="4px">Average</font></th></tr> <tr><td><font size="4px">Preparation and  presentation of topic</font></td><td></td> <td></td> <td></td> <td></td></tr> <tr><td><font size="4px">presentation of the role palyed</font></td><td></td> <td></td> <td></td> <td></td></tr> <tr><td><font size="4px">usage of props</font></td> <td></td> <td></td><td></td> <td></td></tr> <tr><td><font size="4px">bodylanguage,eyecontact and hand gestures</font></td> <td></td> <td></td> <td></td> <td></td></tr> <tr><td><font size="4px">audibility</font></td> <td></td> <td></td> <td></td><td></td></tr> <tr><td><font size="4px">imagination and security</font></td> <td></td><td></td> <td></td> <td></td></tr> <tr><td><font size="4px">capturing the interest of the class and efficiency in conveying the message</font></td> <td></td> <td></td> <td></td><td></td></tr></table> <br> <br> <br> <br>';

    	$('#student').html($('#student').html()+"<br><br><br>"+copy);
    }

</script>
</html>