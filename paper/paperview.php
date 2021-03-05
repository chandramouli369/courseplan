<?php

    require("../db.php");
    // include ("../header/header.php");

    $paper_id = $_GET['paper_id'];

    $qry = "SELECT paper from papers where id='$paper_id' ";
    $res = mysqli_query($db, $qry);
    $row = mysqli_fetch_assoc($res);
    $paper = $row['paper'];

    // echo $paper;

?>


<!DOCTYPE html>
<html>
    <head>
        <style>
            #sidebar
        {
            padding-left: 10px;
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

            @media print
            {
                @page { margin-top: 0; margin-bottom: 0; }

            	table
            	{
            		margin: 0;
            	}
                #piechart
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


<script type="text/javascript">


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
        </script>

    </head>
    <body>
        <div id="paper" style="margin-left: 100px;">
            <?php echo $paper; ?>
        </div>

        <div style="margin-left: 450px;"><div id="piechart"></div></div>
        
        <script>
            $('input').attr('readonly', 'readonly');
            $('textarea').attr('readonly', 'readonly');



            // Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values

var co = JSON.parse($('#co_array').text());

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['CO', 'percentage attained'],
  ['CO1', co[1]],
  ['CO2', co[2]],
  ['CO3', co[3]],
  ['CO4', co[4]],
  ['CO5', co[5]]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'CO PieChart', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

        </script>
    </body>
</html>