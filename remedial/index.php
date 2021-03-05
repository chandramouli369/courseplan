<?php
// session_start();
require("../db.php");
include ("../header/header.php");

// $email = $_POST['email'];
$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];


if (isset($_GET['create']))
{
    $sql = "INSERT into remedial(`sid`, `date`) values('$sid', '".date("Y-m-d")."') ";
    mysqli_query($db, $sql);

    ?><script type="text/javascript">window.location.href="index.php";</script><?php

}
if (isset($_GET['del_rid']))
{
    $rid = $_GET['del_rid'];

    $sql = "DELETE from remedial where id='$rid' ";
    mysqli_query($db, $sql);

    ?><script type="text/javascript">window.location.href="index.php";</script><?php
}

// echo $id;
$sql = "SELECT * FROM remedial where sid='$sid' ";
$res = mysqli_query($db, $sql);


// Send to Admin
$qry = "SELECT remedial from status where sid='$sid' ";
$sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['remedial'];

if (isset($_GET['send']))
{
    $value = $sta;
    if(substr($sta, 0, 5) != "_req_") $value = "_req_".$value;
    else $value = substr($sta, 5);
    
    $qry = "UPDATE status set remedial='$value' where sid='$sid' ";
    mysqli_query($db,$qry);
    // echo $qry;
    
    ?><script type="text/javascript">window.location.href="index.php"</script><?php
}
// End



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
        <h3 style="text-align: center;">Remedial Classes</h3>
            <div class="row" style="margin-top: 30px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-3">
                            <div class="view">
                                <button onclick="window.location.href='index.php?create'">New Remedial Form</button>
                            </div>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>            
        </div>

        <div class="row" style="margin-top:30px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Date</th>
                        <!-- <th>Contest</th> -->
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
                        <td><?php echo $data['date']; ?></td>
                        <!-- <td><?php echo $data['modified']; ?></td> -->
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='remedial.php?rid=<?php echo $data['id'] ?>'">View</button></td>
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='index.php?del_rid=<?php echo $data['id'] ?>'">Delete</button></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
            
        </div>


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
                padding: 5px 5px 70px 5px;
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