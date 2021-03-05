<?php
// session_start();
require("../db.php");
include ("../header/header.php");

$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];
$hasdata = 0;
$qry = "SELECT data from tutorial where sid='$sid' ";
$res = mysqli_query($db, $qry);
$row = mysqli_fetch_assoc($res);
$count = mysqli_num_rows($res);
if($count) 
{
    $remedial = $row['data'];
    $hasdata = 1;
}
// if (mysqli_num_rows($res)) 

if (isset($_POST['save_tutorial']))
{
    $data = $_POST['data'];

    if ($hasdata == 1)
    {
      $qry = "UPDATE tutorial set data='$data' where sid='$sid' ";
      mysqli_query($db, $qry);
    }
    else
    {
        $qry = "INSERT INTO tutorial VALUES ('$sid', '$data')";
        mysqli_query($db, $qry);
    }

    ?><script type="text/javascript">window.location.href="index.php";</script><?php

}

// Send to Admin
$qry = "SELECT tutorial from status where sid='$sid' ";
$sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['tutorial'];

if (isset($_GET['send']))
{
    $value = $sta;
    if(substr($sta, 0, 5) != "_req_") $value = "_req_".$value;
    else $value = substr($sta, 5);
    
    $qry = "UPDATE status set tutorial='$value' where sid='$sid' ";
    mysqli_query($db,$qry);
    // echo $qry;
    
    ?><script type="text/javascript">window.location.href="index.php"</script><?php
}
// End

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
            /*border: 3px solid #85144b;*/
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
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1 style="text-align:center;font-weight: bold;font-family: 'Ultra', sans-serif; ">Tutorial Classes</h1>
    <div class="button">
        <button onclick="myCreateFunction()" class='btn'>Create row</button>
        <button onclick="myDeleteFunction()" class='btn'>Delete row</button>
        <input type="button" onclick="copy()" value=" Save " class='btn'>
    </div>
    <br>
    <?php 
      if ($count) echo "<div id='store'>".$remedial."</div>";
      else {
    ?>
    <div id="store">
        <table id="myTable" align="center">
            <tr>
                <th>Date</th>
                <th>Topic</th>
                <th>Description</th>
                <th>Course Outcome</th>
                <th>Level of Attainment</th>
            </tr>
            <tr>
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
            cell1.innerHTML = "<input type='text' onchange='update(this)'>";
            cell2.innerHTML = "<input type='text' onchange='update(this)'>";
            cell3.innerHTML = "<input type='text' onchange='update(this)'>";
            cell4.innerHTML = "<input type='text' onchange='update(this)'>";
            cell5.innerHTML = "<input type='text' onchange='update(this)'>";
        }

        /*function myDeleteFunction() {
          document.getElementById("myTable").deleteRow(-1);
        }*/
        function update(obj) 
        {
          if ($(obj).is("input")) $(obj).attr("value",$(obj).val());
          if ($(obj).is("textarea")) $(obj).text(obj.value);
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
            var copy = $('#store').html();
            // $('#p2').html(copy);
            redirectPost("index.php",{save_tutorial : "yes", data : copy });
        }
    </script>


    <!-- Sent to Admin -->


        <style type="text/css">
            #sta
            {
                position: fixed;
                bottom: 30px;
                right: 30px;
                text-align: center;
            }
            #sta_btn
            {
                border-radius: 50%;
                /*background-color: rgb(52, 69, 200);*/
                height: 50px;
                width: 50px;
                padding-top: 10px;
                border: 1px solid black;
                cursor: pointer;    
            }
            #sta_head
            {
                position: fixed;
                text-align: left;
                padding: 5px;
                background-color: white;
                bottom: 40px;
                right: 100px;
                width: 250px;
                border: 1px solid black;
                border-radius: 5px;
            }
            #sta_desc
            {
                position: fixed;
                text-align: left;
                padding: 5px 5px 55px 5px;
                background-color: white;
                bottom: 40px;
                right: 100px;
                width: 250px;
                border: 1px solid black;
                border-radius: 5px;
            }
            #sta_msg
            {
                display: none;
            }
        </style>

        <div id="sta">
            <div id="sta_btn"><i class="fa fa-paper-plane-o fa-2x" aria-hidden='true'></i></div>
            <div id="sta_msg">
                <div id="sta_desc">
                    <div id="sta_head">
                        Status : 
                        <?php
                            if(substr($sta, 0, 5) == "_req_") echo "Requested"; 
                            else if(strpos($sta, 'Completed') !== false) echo "Completed"; 
                            else echo "Remarks Given by Admin";
                        ?>
                        <br>
                        <button style="float: right; margin-right: 10px;"  onclick="window.location.href='<?php echo "index.php?send" ?>' "><?php if(substr($sta, 0, 5) != "_req_") echo "Send"; else echo "Unsend"; ?> Request</button>
                    </div>
                    <?php 
                        if(substr($sta, 0, 5) == "_req_") echo substr($sta, 5);
                        else echo $sta;
                    ?>
                </div>
            </div>
        </div>
        <script>
            $('#sta').click(()=> {
                $('#sta_msg').toggle();
            });
        </script>
        <!-- end  -->

</body>

</html>