<?php
// session_start();
require("../db.php");
include ("../header/header.php");

    $rid = $_GET['rid'];
// if(isset($_GET['rid'])) 
// {
//     echo "get";
// }
// if(isset($_POST['rid'])) 
// {
//     $rid = $_POST['rid'];
//     echo "post";
// }

$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];
$hasdata = 0;
$qry = "SELECT remedial from remedial where id='$rid' ";
$res = mysqli_query($db, $qry);
$row = mysqli_fetch_assoc($res);
$remedial = $row['remedial'];
$count = mysqli_num_rows($res);
if ($count) $hasdata = 1;

if (isset($_POST['save_remedial']))
{
    $data = $_POST['data'];

    if ($hasdata == 1)
    {
      $qry = "UPDATE remedial set remedial='$data' where sid='$sid' and id='$rid' ";
      mysqli_query($db, $qry);
    }
    else
    {
        $qry = "INSERT INTO remedial VALUES ('$sid', '$data')";
        mysqli_query($db, $qry);
    }

    ?><script type="text/javascript">window.location.href="remedial.php?rid=<?php echo $rid ?>";</script><?php

}

?>

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="../js/jquery.min.js"></script>

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
        table,
        td {
            border: 1px solid black;
            text-align: center;
            font-family: arial, sans-serif;
            /*margin-left: 10%;*/
            /* border:2px solid #009879;*/
            border-collapse: collapse;
        }
        table {
            border: 3px solid #85144b;
            margin-top: 40px;
        }
        th {
            background-color: #009879;
            color: #ffffff;
        }
        .button {
            position: absolute;
            transform: translate(-50%, -50%);
            margin-left: 51%;
        }
        .btn {
            border: 1px solid black;
            padding: 6px 10px;
            color: white;
            text-decoration: none;
            background-color: #009479;
            border-radius: 30px;
        }
        .btn:hover {
            background-color: #85144b;
        }
        input {
            background-color: #F5FFFA;
        }
        img {
            margin-left: 10%;
        }
        p {
            font-family: sans-serif;
            font-size: 19px;
            font-weight: bold;
            margin-left: 5%;
        }
        ul {
            margin-left: 5%;
            font-family: sans-serif;
            font-size: 15.5px;
            margin-top: -30%%;
            font-weight: bold;
        }
        .ins {
            width: 1150px;
            padding: 10px;
            margin-left: 10%;
            /*background: linear-gradient(to left, skyblue, blue);*/
            background: #00B4DB;
            background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
            background: linear-gradient(to right, #0083B0, #00B4DB);
            color: white;
            border: 4px solid #85144b;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;font-weight: bold;font-family: 'Ultra', sans-serif; ">Remedial form</h1>
    <br>
    <p style="color:black" align="center">!!Best teachers teach from heart not from book!!</p>
    <img src="banner.jpg" style="width: 1178px;" height="179" style="border: 1px solid  #85144b;">
    <div class="ins">
        <p><u>instructions:</u></p>
        <p style="font-size:16px;">please read the given instructions below:</p>
        <ul>
            <li>student fields can be added in given fields accordingly</li>
            <li>user can add another row by clicking "create row" button.... </li>
        </ul>
        <!-- <img src="gudteacher.jpg" width="145" height="147" style="margin-left: 81%;margin-top: -40%;border-radius: 50%;border: 3px solid  #85144b;"> -->
    </div>
    <div class="button" style="margin-top: 20px;">
        <button onclick="myCreateFunction()" class='btn'>Create row</button>
        <button onclick="myDeleteFunction()" class='btn'>Delete row</button>
        <input type="button" onclick="copy()" value="    Save    " class='btn'>

        <!--<button onclick="myDeleteFunction()" class='btn'>Delete row</button>-->
    </div>
    <?php 
      if ($row['remedial']!="") echo "<div id='store' align='center'>".$remedial."</div>";
      else {
    ?>
    <div id="store">
    <table id="myTable" align='center'>
        <tr>
            <th>Rollno</th>
            <th>Student name</th>
            <th>topic</th>
            <th>Attendance</th>
            <th>Date</th>
            <th>Description</th>
        </tr>
        <tr>
            <td><input type="text" onchange='update(this)'></td>
            <td><input type="text" onchange='update(this)'></td>
            <td><input type="text" onchange='update(this)'></td>
            <td><input type="text" onchange='update(this)'></td>
            <td><input type="text" onchange='update(this)'></td>
            <td><input type="text" onchange='update(this)'></td>
        </tr>
    </table>
    </div>
    <?php } ?>
    <br>
    <br>

    <script>
        function myCreateFunction() 
        {
            var table = document.getElementById("myTable");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            cell1.innerHTML = "<input type='text' onchange='update(this)'>";
            cell2.innerHTML = "<input type='text' onchange='update(this)'>";
            cell3.innerHTML = "<input type='text' onchange='update(this)'>";
            cell4.innerHTML = "<input type='text' onchange='update(this)'>";
            cell5.innerHTML = "<input type='text' onchange='update(this)'>";
            cell6.innerHTML = "<input type='text' onchange='update(this)'>";
        }

        /*function myDeleteFunction() {
          document.getElementById("myTable").deleteRow(-1);
        }*/
        function update(obj) 
        {
          $(obj).attr("value",$(obj).val());
          // if ($(obj).is("textarea")) $(obj).text(obj.value);
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
            var table = document.getElementById("myTable");
            if (table.rows.length > 1) table.deleteRow(-1);
        }
        function copy()
        {
            var remedial_id = <?php echo $rid ?>;
            var copy = $('#store').html();
            // $('#p2').html(copy);
            redirectPost("remedial.php?rid=<?php echo $rid ?>",{save_remedial : "yes", data : copy });
        }
    </script>

</body>

</html>