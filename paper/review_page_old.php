<?php

require("../db.php");
include ("../header/header.php");

// $data = $_POST['data'];

$qry = "SELECT * from papers where id=33 ";
$res = mysqli_query($db, $qry);

$data = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
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
	
<h2 align="center" style="margin: 0;padding-top: 20px;">DEPARTMENT OF COMPUTER SCIENCE AND TECHNOLOGY</h2>


<h3 align="center" style="margin: 0;padding-top: 10px;">mid question paper reviews comments</h3>
<br><br>
<button onclick="copy()">Save</button>
<div class="container">
	<div class="row">
		<div class="col-sm-0"></div>
		<div class="col-sm-12">
			<table class="table table-striped" id="myTable">
				<col width="40">
				<col width="70">
				<col width="700">
				<col width="200">
				<col width="500">
				<tr>
					<th><font size="4px">SNo</font></th>
					<th><font size="4px">QNo</font></th>
					<th><font size="4px">level of blooms taxonomy</font></th>
					<th><font size="4px">CO Number</font></th>
					<th><font size="4px">In the question reflecting the CO(YES/NO)</font></th>
				</tr>
				

			</table>
		</div>
		<div class="col-sm-0"></div>
	</div>	
</div>
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
<textarea id="description_id" onkeyup="do_resize(this);" cols="100" rows="10" name="comment"></textarea>
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
</body>


<div id="paper" style="display: none;"><?php echo $data['paper']; ?></div>

<script>
	var q=["1a","1b","1c","2a"];
	var l=["l1","l2","l3","14"];
	// var co = JSON.parse($('#co_array').text());
	var review = JSON.parse($('#review_data').text());

	console.log(review);	
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
            	cell3.innerHTML = "<input style='text-align: center;' value="+review[i][0]+" type='text' onchange='update(this)'>";
            	cell2.innerHTML = "<input style='text-align: center;' value="+review[i][2]+" type='text' onchange='update(this)'>";
            	cell4.innerHTML = "<input style='text-align: center;' value="+review[i][1]+" id='co"+i+"' type='text' onchange='update(this)'>";
            	cell5.innerHTML = "<select><option value='yes'>yes</option><option value='no'>no</option></select>";
            };
	var qno=1;
            var qindex = [], rowcount=0;

            function addquestion()
            {
             var len=review.length;
             // console.log(len);
             var i;
             for(i=1;i<len;i++)
             {
              addquestionrow(i);
            } 
           
        }
    
             function deleterow() 
            {
            	var table = document.getElementById("myTable");
            	if (table.rows.length>2) {
                    if (qindex[qindex.length-1] == rowcount) 
                    {
                        qno--;
                        qindex.pop();
                    }
                    table.deleteRow(-1);
                }
                rowcount--;
            }
            function copy()
            {
            	var copy = $('#paper').html();
            	// $('#p2').html(copy);
                redirectPost("index.php",{savepaper : "yes", data : copy});
            }

            addquestion();

			co_temp = JSON.parse($('#co_array').text());
			console.log(co_temp);
            
</script>
