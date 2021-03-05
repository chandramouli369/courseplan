<?php
// session_start();
require("../db.php");
include ("../header/header.php");

// $email = $_POST['email'];
$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];


if (isset($_GET['create_roleplay']))
{
    $name = $_GET['create_roleplay'];
    $sql = "INSERT into roleplay(`sid`, `modified`, `name`) values('$sid', '".date("Y-m-d")."', '$name') ";
    mysqli_query($db, $sql);

    ?><script type="text/javascript">window.location.href="index.php";</script><?php

}
if (isset($_GET['del_rid']))
{
    $rid = $_GET['del_rid'];

    $sql = "DELETE from roleplay where id='$rid' ";
    mysqli_query($db, $sql);

    ?><script type="text/javascript">window.location.href="index.php";</script><?php
}

// echo $id;
$sql = "SELECT * FROM roleplay where sid='$sid' ";
$res = mysqli_query($db, $sql);

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
            #sidebar
            {
                padding-left: 10px;
                margin-left: -250px;
            }
            #sidebar.active {
              margin-left: -505px;
            }
            ul
            {
                list-style: none;
            }
            .input input
            {
                outline: none;
                border: none;
                border: 1px solid black;
                border-radius: 20px;
                /* width: 300px; */
                width: 100%;
                padding: 2px 7px;
            }
            .view button
            {
                color: white;
                border: none;
                outline: none;
                border-radius: 20px;
                height: 30px;
                width: 250px;
                background-color: rgba(25, 181, 254, 1);
            }
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
            th,td
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <h3 style="text-align: center;">Role Play</h3>
            <div class="row" style="margin: 0;margin-top: 30px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-5" style="margin-left: 30px;">    
                            <input type="text" id="roleplay_name" placeholder="Roleplay Name" style="width: 100%;outline: none;border: none;border-bottom: 1px solid black;" name="">
                        </div>
                        <div class="col-sm-3">
                            <div class="view">
                                <button onclick="window.location.href='index.php?create_roleplay='+$('#roleplay_name').val()">New Role Play</button>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>            
        </div>

        <div class="row" style="margin: 0;margin-top:30px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Date</th>
                        <th>Topic</th>
                        <!-- <th>Certificate id</th> -->
                        <!-- <th>Last Modified</th> -->
                        <th colspan="2" style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while ($data = mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $data['modified']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='roleplay.php?rid=<?php echo $data['id'] ?>'">View</button></td>
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='index.php?del_rid=<?php echo $data['id'] ?>'">Delete</button></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
            
        </div>
    </body>
</html>