<?php
// session_start();
require("../db.php");
include ("../header/header.php");

if(isset($_GET['del_paper_id']))
{
    $id = $_GET['del_paper_id'];
    $qry = "DELETE FROM papers where id='$id' ";
    mysqli_query($db, $qry);
}
// $email = $_POST['email'];
$id = $_SESSION['userid'];

$sql = "SELECT * FROM papers where user_id='$id' order by modified desc ";
$res = mysqli_query($db, $sql);

?>


<!doctype html>
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
            button
            {
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
        <div class="container">
        <h3 style="text-align: center;">Open Book Test</h3>
                       
        <div align="center" class="view" style="margin-top: 30px;">
            <button onclick="window.location.href='paper.php'">New Paper</button>
        </div>
        </div>

        <div class="row" style="margin-top:30px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Paper</th>
                        <!-- <th>Contest</th> -->
                        <!-- <th>Certificate id</th> -->
                        <th>Last Modified</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    while ($data = mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $data['type']; ?></td>
                        <td><?php echo $data['modified']; ?></td>
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='paperview.php?paper_id=<?php echo $data['id'] ?>'">View</button></td>
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='paper.php?paper_id=<?php echo $data['id'] ?>'">Edit</button></td>
                        <td style="padding-left: 0;padding-right: 0;"><button onclick="document.location.href='index.php?del_paper_id=<?php echo $data['id'] ?>'">Delete</button></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2"></div>
            
        </div>
    </body>
</html>