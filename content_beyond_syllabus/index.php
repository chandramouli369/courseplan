<?php
// session_start();
require("../db.php");
include ("../header/header.php");

if(!isset($_SESSION['userid'])) 
{
    ?><script type="text/javascript">window.location.href="../login/index_login.php"</script><?php
}


$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];
$hasdata = 0;
$qry = "SELECT data from content_beyond_syllabus where sid='$sid' ";
$res = mysqli_query($db, $qry);
$row = mysqli_fetch_assoc($res);
$count = mysqli_num_rows($res);
if($count) 
{
    $remedial = $row['data'];
    $hasdata = 1;
}
// if (mysqli_num_rows($res)) 

if (isset($_POST['save_cbs']))
{
    $data = $_POST['data'];

    if ($hasdata == 1)
    {
      $qry = "UPDATE content_beyond_syllabus set data='$data' where sid='$sid' ";
      mysqli_query($db, $qry);
    }
    else
    {
        $qry = "INSERT INTO content_beyond_syllabus VALUES ('$sid', '$data')";
        mysqli_query($db, $qry);
    }

    ?><script type="text/javascript">window.location.href="index.php";</script><?php

}

?>

<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="../js/jquery.min.js"></script>

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
            /*-webkit-background-color: rgba(0,0,0,1);*/
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
        table,
        td {
            /*border: 1px solid black;*/
            text-align: center;
            font-family: arial, sans-serif;
            /* border:2px solid #009879;*/
            border-collapse: collapse;
        }
        table {
            border: 3px solid lightblue;
        }
        th {
            background-color: #009879;
            color: #ffffff;
        }
        .button {
            position: absolute;
            transform: translate(-50%, -50%);
            text-align: center;
            margin-left: 51%;
        }
        .btn {
            /*border: 1px solid black;*/
            border: none;
            outline: none;
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
        u {
            border-bottom: 2px solid #000;
        }
        ul {
            margin-left: 5%;
            font-family: sans-serif;
            font-size: 15.5px;
            margin-top: -30%%;
            font-weight: bold;
        }
        .ins {
            width: 76.6%;
            padding: 10px;
            margin-left: 10%;
            background: linear-gradient(to left, pink, skyblue);
            border: 4px solid #85144b;
        }

        #store
        {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;font-weight: bold;font-family: sans-serif; ">Content Beyond Syllabus</h1>
    <div class="button">
        <button onclick="myCreateFunction()" class='btn'>Create row</button>
        <button onclick="myDeleteFunction()" class='btn'>Delete row</button>
        <input type="button" onclick="save()" value=" Save " class='btn'>
    </div>
    <br>
    <?php 
      if ($count) echo "<div id='store' align='center'>".$remedial."</div>";
      else {
    ?>
    <div id="store" align="center">
        <table id="myTable">
            <tr>
                <th>Date</th>
                <th>Topic</th>
                <th>Description</th>
            </tr>
            <tr>
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
            cell1.innerHTML = "<input type='text' onchange='update(this)'>";
            cell2.innerHTML = "<input type='text' onchange='update(this)'>";
            cell3.innerHTML = "<input type='text' onchange='update(this)'>";
        }

        /*function myDeleteFunction() {
          document.getElementById("myTable").deleteRow(-1);
        }*/
        function update(obj) 
        {
            $(obj).attr("value", $(obj).val());
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
        function save()
        {
            var copy = $('#store').html();
            // $('#p2').html(copy);
            redirectPost("index.php",{save_cbs : "yes", data : copy });
        }
    </script>

</body>

</html>