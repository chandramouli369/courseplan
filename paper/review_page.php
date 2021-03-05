<?php
session_start();
require("../db.php");
// include ("../header/header.php");

// $data = $_POST['data'];
$rid = $_GET['rid'];

if (isset($_POST['review']))
{
	$data = $_POST['data'];
    // $paper_name = $_POST['paper_name'];
    // $paper_id = 26;

    // $exists = mysqli_num_rows(mysqli_query($db, "SELECT id from review where id='$rid' "));

    $qry = "UPDATE review set review='$data' where id='$rid' ";
    mysqli_query($db, $qry);
    ?><script type="text/javascript">alert("Paper: <?php echo $paper_name; ?> Uploaded successfully");
    window.location.href="review.php?rid=<?php echo $rid ?>";
    </script><?php

}

$qry = "SELECT * from review where id='$rid' ";
$res = mysqli_query($db, $qry);

$data = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
	#sidebar
        {
            padding-left: 10px;
        }
        #sidebar.active {
          margin-left: -270px;
        }
        ul
        {
            list-style: none;
        }
	table,th,td{
		border:2px solid black;
		border-collapse: collapse;
	}
	table{
		width:100%;
		box-shadow:  0 15px 25px rgba(0,0,0,0.5);
	}
	th{
		padding: 2px;
		text-align: center;
	}
	td{
		font-size: 15px;
		text-align: center;
	}
	p{
		font-size: 15px;
	}
	input,textarea{
		border:1px solid black;
		box-shadow:  0 15px 25px rgba(0,0,0,0.5);
	}
	

</style>
<body>
	<script type="text/javascript">var i=1;</script>
	<h2 align="center" style="margin: 0;padding-top: 20px;">DEPARTMENT OF COMPUTER SCIENCE AND TECHNOLOGY</h2>


	<h3 align="center" style="margin: 0;padding-top: 10px;">mid question paper reviews comments</h3>
	<br><br>
	<div style="text-align: center; margin-bottom: 30px;">
		<button onclick="addquestionrow(i++)">Add Question</button>
		<button onclick="deleteRow()">Delete Row</button>
		<button onclick="copy()">Save</button>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
<div id="review">
					<?php if($data['review'] != "") {echo $data['review']; } 
					else {
					?>
					<table class="table table-striped" id="myTable">
						<tr>
							<th><font size="4px">SNo</font></th>
							<th><font size="4px">QNo</font></th>
							<th><font size="4px">level of blooms taxonomy</font></th>
							<th><font size="4px">CO Number</font></th>
							<th><font size="4px">In the question reflecting the CO(YES/NO)</font></th>
						</tr>
					</table>

	<br><br>
	<div class="container">
		<div class="row">
			<p>1.Coverage of syllabus(2.5 Units): YES/NO</p>
			<p>2.Uniform distribution of question in the unit: YES/NO</p>
			<p>3.Can the paper be answered in stipulted time: YES/NO</p>
			<p>4.Rate the significance of paper: YES/NO</p>
			<p>5.Remarks on the question: YES/NO</p>
		</div>
		<br><br>
		<p>please enter the review here</p>
		<textarea id="description_id" onchange='update(this)' cols="100" rows="10" name="comment"></textarea>
	</div>	
	<br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-10">
				<input type="text" name="rsign" required=""></input>
				<p>reviewer name</p>
			</div>
			<div class="col-sm-2">
				<input type="text" name="hsign" required=""></input>
				<p>hod name</p>
			</div>
		</div>
	</div>
</div>
					<?php } ?>
			</div>
			<!-- <div class="col-sm-0"></div> -->
		</div>	
	</div>
</body>
</html>

<!-- <div id="paper" style="display: none;"><?php echo $data['paper']; ?></div> -->

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
	function addquestionrow(i) 
            {
                // rowcount++;
                // qindex.push(rowcount);

            	var table = document.getElementById("myTable");
            	var row = table.insertRow(-1);

            	var cell1 = row.insertCell(0);
            	var cell2 = row.insertCell(1);
            	var cell3 = row.insertCell(2);
            	var cell4 = row.insertCell(3);
            	var cell5 = row.insertCell(4);

            	cell1.padding="0";
            	cell1.innerHTML = "<div ><input style='width: 30px; text-align: center;' type='text' value="+i+"."+" onchange='update(this)'></div>";
            	cell3.innerHTML = "<input style='text-align: center; width: 120px;' type='text' onchange='update(this)'>";
            	cell2.innerHTML = "<input style='text-align: center; width: 80px;' type='text' onchange='update(this)'>";
            	cell4.innerHTML = "<input style='text-align: center; width: 80px;' id='co"+i+"' type='text' onchange='update(this)'>";
            	cell5.innerHTML = "<select onchange='update(this)'><option value='yes' selected='selected'>yes</option><option value='no'>no</option></select>";
            };

            function update(obj) 
	        {
	          if ($(obj).is("input")) $(obj).attr("value",$(obj).val());
	          if ($(obj).is("textarea")) $(obj).text(obj.value);
	          if($(obj).is("select"))
		      {
		      	$(obj).find("option").removeAttr("selected");
		      	$(obj).find("option[value="+$(obj).val()+"]").attr('selected','selected');
		      }
      
	        }

            function deleteRow() 
            {
            	var table = document.getElementById("myTable");
            	if (table.rows.length>1) {
                    table.deleteRow(-1);
                	if ((i-1) !=0 )i--;
                }
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

            function copy()
            {
            	var copy = $('#review').html();
            	// console.log(copy);
                redirectPost("review_page.php?rid=<?php echo $rid; ?>",{review : "yes", data : copy});
            }


			// co_temp = JSON.parse($('#co_array').text());
			// console.log(co_temp);
            // addquestionrow(i++);
</script>
