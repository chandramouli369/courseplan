<?php
// session_start();

require("../db.php");
include ("../header/header.php");

if (isset($_GET['assignment'])) $assignment = $_GET['assignment'];
else $assignment = $_POST['assignment'];

// echo $assignment;

$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];
$hasdata = 0;
$qry = "SELECT rubrics from rubrics where sid='$sid' and assignment='$assignment' ";
$res = mysqli_query($db, $qry);
$row = mysqli_fetch_assoc($res);
$num_rows = mysqli_num_rows($res);
if($num_rows!=0) 
{
  $rubrics = $row['rubrics'];
  $hasdata = 1;
}

if (isset($_POST['saverubrics']))
{
    $data = $_POST['data'];

    if ($hasdata == 1)
    {
      $qry = "UPDATE rubrics set rubrics='$data' where sid='$sid' and assignment='$assignment' ";
      mysqli_query($db, $qry);
    }
    else
    {
      $qry = "INSERT INTO rubrics(sid, assignment, rubrics) VALUES ('$sid', '$assignment', '$data')";
      mysqli_query($db, $qry);
      // print_r($qry);
      ?><script type="text/javascript">//console.log(<?php #echo $qry ?>);</script><?php
    }

    ?><script type="text/javascript">window.location.href="index.php?assignment=<?php echo $assignment?>";</script><?php

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset=utf-8 />
    <title>RUBRICS</title>
    <script type="text/javascript" src="../js/jquery.min.js"></script>

</head>

<style type="text/css">
    body {
        margin: 0;
        padding: 0;
        /*padding-top: 75px;*/
        border: 1px solid;
        /*background-color: rgb(0, 250, 154);*/
        box-shadow: 10px 15px 18px black;
    }
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
</style>

<body>
    <div style="padding: 20px;">
        <!-- <marquee width="40%" direction="right" height="50px"><font size="12">COURSE PLAN</font></marquee> -->
        <h1 style="text-align:all; font-size-adjust: 40%; font-family:all;color:rgb(220,20,60); font size: 50%;" align="center">RUBRICS</h1>
        <p style=" color:rgb(0,0,0);font-size: 20">The title which I most covet is that of teacher. The writing of a research paper and the teaching of freshman calculus, and everything in between, falls under this rubric. Happy is the person who comes to understand something and then gets to explain it.</p>
        <div align="center">
          <br><br>
          <input type="button" onclick="createTable()" value="Create the table">
          <input type="button" onclick="addRow()" value="     Add Row      ">
          <input type="button" onclick="addColumn()" value="   add Column   ">
          <input type="button" onclick="deleteColumn()" value=" Delete Column">
          <input type="button" onclick="deleteRow()" value="   Delete Row   ">
          <input type="button" onclick="copy()" value="    Save    " class='btn'>
          <input type="button" onclick="window.location.href='../samples/ruberics.docx' " value="    Sample Rubrics    " class='btn'>


          <div id="store">
            <?php 
              if ($num_rows>0) echo $rubrics;
              else echo "<table id='myTable'></table>";
            ?>
          </div>
          <div id="copy"></div>

          <div class="w3-container">
              <br><br><br>
              <h1>rubrics final score and their level of attainment is as follows  </h1>
              <br><br>

              <h2>*65-75 above standard </h2>
              <h3>*50-64 meets standard</h3>
              <h4>*35-49 developing</h4>
              <h5>*0-34 needs work </h5>

          </div>
        </div>
    </div>
</body>
</html>
<script>
    //creating a table
    function createTable() {
        rn = window.prompt("Input number of rows", 1);
        cn = window.prompt("Input number of columns", 1);

        for (var r = 0; r < parseInt(rn, 10); r++) {
            var x = document.getElementById('myTable').insertRow(r);
            for (var c = 0; c < parseInt(cn, 10); c++) {
                var y = x.insertCell(c);
                y.innerHTML = "<textarea rows='4' cols='30' onchange='update(this)'></textarea>";

            }
        }
    } 

    //adding rows
    function addRow() {
        var root = document.getElementById('myTable').getElementsByTagName('tbody')[0];
        var rows = root.getElementsByTagName('tr');
        var clone = cloneEl(rows[rows.length - 1]);
        root.appendChild(clone);
    }

    //adding columns
    function addColumn() {
        var rows = document.getElementById('myTable').getElementsByTagName('tr'),
            i = 0,
            r, c, clone;
        while (r = rows[i++]) {
            c = r.getElementsByTagName('td');
            clone = cloneEl(c[c.length - 1]);
            c[0].parentNode.appendChild(clone);
        }
    }

    function cloneEl(el) {
        var clo = el.cloneNode(true);
        return clo;
    }
    
    //deleting columns
    function deleteColumn() {
        var allRows = document.getElementById('myTable').rows;
        for (var i = 0; i < allRows.length; i++) {
            if (allRows[i].cells.length > 0) {
                allRows[i].deleteCell(-1); //delete the cell
            } else {
                alert("You can't delete more columns.");
                return;
            }
        }
    }
    
    //deleting rows
    function deleteRow() {
        var table = document.getElementById('myTable');
        var rowCount = table.rows.length;

        if (rowCount>0) table.deleteRow(rowCount -1);
        else alert("You can't delete more rows."); 
    }

    function update(obj) 
    {
      if ($(obj).is("textarea")) $(obj).text(obj.value);
      if ($(obj).is("input")) $(obj).attr("value",obj.value);
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
      var copy = $('#store').html();
      var a_no = "<?php echo $assignment ?>";
      // console.log(copy);
      // $('#copy').html(copy);
      redirectPost("index.php",{saverubrics : "yes", assignment: a_no, data : copy});
    }

</script>