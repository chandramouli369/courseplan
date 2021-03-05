<?php
session_start();
require("../db.php");
// include ("../header/header.php");

$id = $_SESSION['userid'];
if (isset($_POST['savepaper']))
{
    // echo $_POST['data'];
    $data = $_POST['data'];
    $paper_name = $_POST['paper_name'];
    // $paper_id = 26;

    $exists = mysqli_num_rows(mysqli_query($db, "SELECT id from papers where user_id='$id' and type='$paper_name' "));

    //echo $exists;
    if ($exists) $qry = "UPDATE papers set paper='$data' where user_id='$id' and type='$paper_name' ";
    else $qry = "INSERT INTO `papers`(`user_id`, `modified`, `type`, `paper`) VALUES ('$id', NOW(), '$paper_name', '$data')";

    mysqli_query($db, $qry);
    ?><script type="text/javascript">alert("Paper: <?php echo $paper_name; ?> Uploaded successfully");</script><?php

    $paper_id = mysqli_fetch_assoc(mysqli_query($db, "SELECT id from papers where user_id='$id' and type='$paper_name' "))['id'];
    header("Location:paper.php?paper_id=".$paper_id);
}

if (isset ($_GET['paper_id']))
{
    $paper_id = $_GET['paper_id'];
    $qry = "SELECT * from papers where id='$paper_id' ";
    $res = mysqli_query($db, $qry);
    $row = mysqli_fetch_assoc($res);
    $paper = $row['paper'];
}

?>


<!DOCTYPE html>
<html>
    <head>
        <style>
            #sidebar
        {
            padding-left: 15px;
        }
        #sidebar.active {
          margin-left: -285px;
        }
        ul
        {
            list-style: none;
        }
            table,td
            {
	            border: 1px solid black;
	            text-align:center;
	            /*font-family: arial, sans-serif;*/
	            margin-left:10%;
	            border-collapse: collapse;
            }
            input
            {
	            width: 90%;
	            border: none;
	            outline: none;
            }
            th
            {
	            border: 1px solid black;
            }
            tr
            {
            	height: auto;
            }
            .button
            {
	            text-align: center;
	            margin-bottom: 20px;
            }
            .btn
            {
	            border:1px solid black;
	            padding:6px 10px;
	            color: white;
	            text-decoration: none;
	            background-color: #009479;
	            border-radius: 30px;
	            outline: none;
            }
            .btn:hover
            {
            	background-color: #85144b;
            }

            @media print
            {
                @page { margin-top: 0; margin-bottom: 0; }

            	table
            	{
            		margin: 0;
            	}
                .paper_edit, #piechart, #p2
                {
                    display: none;
                }
                .note,.wishes
                {
                    margin-left: 0!important;
                }

            }

            textarea
            {  
			  width: 97%;
			  font-size: 14px;
			  border: none;
			  outline: none;
			  resize: none;
			}

            .paper_desc_table tr td
            {
                border: none;
                outline: none;
            }

        </style>
        <script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript" src="piechart.js"></script>


    </head>
    <body>

        <div class="paper_edit">
            <h1 style="text-align:center; margin: 0;">Question Paper</h1>
            <br>
            <div class="button" style="margin-bottom: 50px;">
                <button onclick="heading()" class='btn'>Head</button>
                <button onclick="addquestion()" class='btn'>Add Question</button>
                <button onclick="or()" class='btn'>(or)</button>
                <button onclick="deleteRow()" class='btn'>Delete Row</button>
                <button onclick="save()" id="save" class='btn'>Save</button>
            </div>
        </div>
        <?php if (isset($_GET['paper_id'])) {echo "<div id='paper' style='margin-left: 100px;'>".$paper."</div>";} 
        else {
        ?>
        <div id="paper" style="margin-left: 100px;">
            
            <div style="display: none;" id="co_array">[]</div>
            

            <div style="margin-left: 10%;width: 1000px;">
                <p style="text-align: center; font-weight: bold; margin-bottom: -13px;">Anil Neerukonda Institute of Technology and Sciences (ANITS)</p>
                <p style="text-align: center; margin-bottom: -13px;">(An Autonomous Institute Affiliated to Andhra University, Visakhapatnam)</p>
                <p style="text-align: center; font-weight: bold; margin-bottom: -13px;">Department of Computer Science &amp; Engineering</p>
                <p><input id="paper_name" style="text-align: center; font-weight: bold; width: 100%; margin-bottom: -13px;" onchange="update(this)" value="Descriptive Examination-II"></p>
                <p style="text-align: center;"></p> 
            </div>

            <table class="paper_desc_table" style="width: 1000px; border: none;">
                <tr>
                    <td style="padding-left: 50px; text-align: left;">Academic Year: <input style="font-weight: bold; width: 30%;" value="2019-2020" onchange="update(this)"></td>
                    <td style="padding-right: 50px; text-align: right;">Program: B.TECH</td>
                </tr>
                <tr>
                    <td style="padding-left: 50px; text-align: left;">Year : <input style="width: 30%;" value="3/4 CSE – A,B & C" onchange="update(this)"></td>
                    <td style="padding-right: 50px; text-align: right;">Semester : <input style="text-align: right; width: 3%;" value="I" onchange="update(this)"></td>
                </tr>
                <tr>
                    <td style="padding-left: 50px; text-align: left;">Course: <input style="font-weight: bold; width: 80%;" value="Database Management Systems  " onchange="update(this)"></td>
                    <td style="padding-right: 50px; text-align: right;">Code: <input style="text-align: right; width: 13%;" value="CSE312" onchange="update(this)"></td>
                </tr>
                <tr>
                    <td style="padding-left: 50px; text-align: left;">Date: <input type="date" style="font-weight: bold; width: 30%;" onchange="update(this)"></td>
                    <td style="padding-right: 50px; text-align: right;">Time: <input style="font-weight: bold; text-align: right; width: 31.5%;" value="09:30AM - 11:30AM" onchange="update(this)"></td>
                </tr>
                <tr>
                    <td style="padding-left: 50px; text-align: left;"></td>
                    <td style="padding-right: 50px; text-align: right;">Max Marks : <input style="font-weight: bold; text-align: right; width: 7%;" value="40M" onchange="update(this)"></td>
                </tr>
            </table>

            <p class="note" style="padding: 0 20px; margin-left: 10%; width: 965px;">NOTE: Answer any three of the following six questions, one question from each unit. Students should write the answers in serial number i.e. 1a, b, 2a, b, 3a, b, etc. and in one space in the answer book.</p>

            <p style="text-align: center;"></p>
        	<table id="myTable" style="width: 1000px;">
	            <tr>
	                <th rowspan="2" colspan="2" style="width: 800px;">Question</th>
	                <th rowspan="2" style="width: 35px;">M<br>a<br>r<br>k<br>s</th>
	                <!-- <th colspan="2" style="-webkit-print-color-adjust: exact; width: 0px; background-color: lightgray; height: 35px;">For Faculty Use</th> -->
	            </tr>
	            <tr>
	                <td style="width: 80px;">Contributing CO</td>
	                <td style="width: 80px;">Blooms Taxonomy Level</td>
	            </tr>
	        </table>
	        <p class="wishes" style="margin-left: 10%;width: 1000px;text-align: center;">*** All the Best ***</p>
	        <br><br>
        <div style="display: none;" id="qno">0</div><br>
        <div style="display: none;" id="review_data">[[0,0,0]]</div><br>
        <div id="p2"></div>
        </div>
        <?php } ?>

        <div style="margin-left: 450px;"><div id="piechart"></div></div>
        
        <script>

            // Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
var co = JSON.parse($('#co_array').text());
  co1 = co[1];
  co2 = co[2];
  co3 = co[3];
  co4 = co[4];
  co5 = co[5];
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['CO', 'percentage attained'],
  ['CO1', co1],
  ['CO2', co2],
  ['CO3', co3],
  ['CO4', co4],
  ['CO5', co5]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'CO PieChart', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
            delete co;
            var co = [0,0,0,0,0,0];

            function update(obj) 
            {
                
                if ($(obj).is("input")) $(obj).attr("value",$(obj).val());
                if ($(obj).is("textarea")) $(obj).text(obj.value);

                if ($(obj).attr("id").substring(0,2)=="co") 
                {
                    delete co;
                    var co = [0,0,0,0,0,0];

                    for (var i=1;i<=qno;i++)
                    {
                        try
                        {
                            co[parseInt($('#co'+(i)).attr("value").substring(2))]++;
                            // console.log(parseInt(($('#co'+(i+1)).attr("value")).substring(2)));
                        }
                        catch(err){}
                    }
                    console.log(co);
                    // co[parseInt($(obj).attr("value").substring(2))]++;
                    $('#co_array').text("["+co+"]");

                    // retrival
                    co_temp = JSON.parse($('#co_array').text());
                    // console.log($('#test').text());
                }
            }

            // Auto Resize TextArea
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

            document.addEventListener('input', function (event) {
                if (event.target.tagName.toLowerCase() !== 'textarea') return;
                autoExpand(event.target);
            }, false);


        	var qno=$('#qno').text();
            var qindex = [], rowcount=0;

            function addquestion() 
            {
                rowcount++;
                qindex.push(rowcount);


            	var table = document.getElementById("myTable");
            	var row = table.insertRow(-1);

            	var cell1 = row.insertCell(0);
            	var cell2 = row.insertCell(1);
            	var cell3 = row.insertCell(2);
            	var cell4 = row.insertCell(3);
            	var cell5 = row.insertCell(4);

            	cell1.padding="0";
            	cell1.innerHTML = "<div style='width: 10px;margin:0 -7px 0 5px;'><input style='width: 30px; text-align: center;' type='text' value="+(++qno)+"."+" onchange='update(this)'></div>";
            	cell2.innerHTML = "<textarea onchange='update(this)'></textarea>";
            	cell3.innerHTML = "<input style='text-align: center;' value='M' type='text' onchange='update(this)'>";
            	cell4.innerHTML = "<input style='text-align: center;' value='CO' id='co"+(qno)+"' type='text' onchange='update(this)'>";
            	cell5.innerHTML = "<input style='text-align: center;' value='L' id='l"+(qno)+"' type='text' onchange='update(this)'>";


                $('#qno').text(qno);
            }
            var review = [[0,0,0]];
            function updateall()
            {
                review = [[0,0,0]];
                for (var i=1;i<=qno;i++)
                {
                    question_no  = i;
                    question_co  = parseInt($('#co'+(i)).attr("value").substring(2));
                    question_lvl = parseInt($('#l'+(i)).attr("value").substring(1));
                    review.push([question_no, question_co, question_lvl]);
                    // console.log($('#l'+(i)).attr("value").substring(1));
                }
                $('#review_data').text(JSON.stringify(review));
                // co[parseInt($('#co'+(i)).attr("value").substring(2))]++;
            }
            // updateall();
            console.log(review);
            function heading() 
            {
                rowcount++;

            	var table = document.getElementById("myTable");
            	var row = table.insertRow(-1);
            	var cell1 = row.insertCell(0);
            	cell1.colSpan="5";
            
            	cell1.innerHTML = "<input style='text-align: center;font-weight: bold;font-size: 15px;' type='text' value='Unit - ' onchange='update(this)'>";
            }

            function or() 
            {
                rowcount++;

            	var table = document.getElementById("myTable");
            	var row = table.insertRow(-1);
            	var cell1 = row.insertCell(0);
            	cell1.colSpan="5";
            
            	cell1.innerHTML = "<p style='text-align: center; font-weight: bold;font-size: 15px; margin: 5px 0; onchange='update(this)''>(or)</p>";
            }
            
            function deleteRow() 
            {
            	var table = document.getElementById("myTable");
            	if (table.rows.length>2) {
                    // if (qindex[qindex.length-1] == rowcount) 
                    // {
                    //     qno--;
                    //     qindex.pop();
                    // }
                    table.deleteRow(-1);
                        qno--;
                }
                rowcount--;
                $('#qno').text(qno);

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
            function save()
            {
                $('#save').focus();
            	var copy = $('#paper').html();
            	// $('#p2').html(copy);
                redirectPost("paper.php",{savepaper : "yes", data : copy, paper_name: $('#paper_name').val() });
            }

            // CTRL + S for save
            $(window).bind('keydown', function(event) {
                if (event.ctrlKey || event.metaKey) {
                    switch (String.fromCharCode(event.which).toLowerCase()) {
                    case 's':
                        event.preventDefault();
                        updateall();
                        $('#save').click();
                        break;
                    }
                }
            });

        </script>
    </body>
</html>