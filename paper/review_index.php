<?php
// session_start();
require("../db.php");
include ("../header/header.php");

// $email = $_POST['email'];
$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];


if (isset($_GET['delete']))
{
    $rid = $_GET['rid'];

    $sql = "DELETE from review where id='$rid' ";
    mysqli_query($db, $sql);

    ?><script type="text/javascript">window.location.href="review_index.php";</script><?php
}

// Recieved
$sql = "SELECT r.id, u.name, r.type, length(r.review) as length FROM review r, subjects s, users u where r.to_sid='$sid' and s.sid=r.from_sid and u.userid=s.fid ";
$received = mysqli_query($db, $sql);

$sql = "SELECT r.id, u.name, r.type, length(r.review) as length FROM review r, subjects s, users u where r.from_sid='$sid' and s.sid=r.to_sid and u.userid=s.fid ";
$sent = mysqli_query($db, $sql);

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
            .heading
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top: 30px;">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-3">
                            <div class="view">

                            </div>
                        </div>
                        <div class="col-sm-5"></div>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>            
        </div>

                <h3 align="center">Review</h3>
        <div class="row" style="margin: 0; margin-top:30px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h4 style="text-align: center;">Received</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Type</th>
                        <th>Faculty Name</th>
                        <th>Status</th>
                        <!-- <th>Last Modified</th> -->
                        <th colspan="1" style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while ($data = mysqli_fetch_assoc($received)) {
                    ?>
                    <tr>
                        <td><?php echo "Mid ".$data['type']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <?php
                            if($data['length']>0) $status = "Reviewed";
                            else $status = "Pending";
                        ?>
                        <td><?php echo $status; ?></td>
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='review.php?rid=<?php echo $data['id'] ?>'">Review</button></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
            
        </div>


        <div class="row" style="margin: 0; margin-top:30px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h4 style="text-align: center;">Sent</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Type</th>
                        <th>Faculty Name</th>
                        <th>Status</th>
                        <!-- <th>Last Modified</th> -->
                        <th colspan="1" style="text-align: center;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while ($data = mysqli_fetch_assoc($sent)) {
                    ?>
                    <tr>
                        <td><?php echo "Mid ".$data['type']; ?></td>
                        <td><?php echo $data['name']; ?></td>
                        <?php
                            if($data['length']>0) $status = "Reviewed";
                            else $status = "Pending";
                        ?>
                        <td><?php echo $status; ?></td>
                        <td style="padding-left: 0;padding-right: 0;">
                            <button onclick="document.location.href='review.php?rid=<?php echo $data['id'] ?>'">View</button>
                            <button onclick="document.location.href='review_index.php?delete&rid=<?php echo $data['id'] ?>'">Delete</button>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
            
        </div>

    </body>
</html>