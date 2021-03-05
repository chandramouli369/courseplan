<?php
session_start();
require("../db.php");
// include ("../header/header.php");

// $email = $_POST['email'];
$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];
$acyear = $_SESSION['academic_year'];

$mid = $_GET['mid'];

$sql = "SELECT u.name,s.sid FROM users u inner join subjects s on u.userid=s.fid where s.academic_year='$acyear' and s.subject_name in (select subject_name from subjects where sid='$sid') order by u.name ";
$res = mysqli_query($db, $sql);
// order by u.name 

?>


<!DOCTYPE html>
<html>
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <style>
            table button
            {
                color: white;
                border: none;
                outline: none;
                border-radius: 20px;
                height: 30px;
                width: 100px;
                background-color: rgba(25, 181, 254, 1);
            }

        </style>
    </head>
    <body>

        <div class="row" style="margin-top:30px;">
            <!-- <div class="col-sm-2"></div> -->
            <div class="col-sm-8">
                <table class="table table-striped" style="text-align: center; width:500px; margin-left: 30px;">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Faculty Name</th>
                        <th style="width: 40px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while ($data = mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $data['name']; ?></td>
                        <td style="width: 40px;"><button onclick='window.parent.location.href="midpapers.php?mid=<?php echo $mid;?>&send_to_sid=<?php echo $data['sid'] ?>"'>Send</button></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>