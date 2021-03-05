<?php
// session_start();
include ("../header/header.php");
require("../db.php");

if(!isset($_SESSION['userid'])) 
{
    ?><script type="text/javascript">window.location.href="../login/index_login.php"</script><?php
}

$un = $_SESSION['username'];
$sid = $_SESSION['sid'];
$page = $_GET['page'];
$pagename = ucwords(preg_replace('/_/', " ", $page));


if ($page == "individual_timetable")
{
    $qry = "SELECT individual_time_table from status where sid='$sid' ";
    $sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['individual_time_table'];
}
else if ($page == "class_timetable")
{
    $qry = "SELECT class_time_table from status where sid='$sid' ";
    $sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['class_time_table'];
}
else if ($page == "course_plan")
{
    $qry = "SELECT course_plan from status where sid='$sid' ";
    $sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['course_plan'];
}
else if ($page == "lesson_plan")
{
    $qry = "SELECT lesson_plan from status where sid='$sid' ";
    $sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['lesson_plan'];
}
else if ($page == "notes")
{
    $qry = "SELECT notes from status where sid='$sid' ";
    $sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['notes'];
}
else if ($page == "co_po_attainment")
{
    $qry = "SELECT co_po from status where sid='$sid' ";
    $sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['co_po'];
}
else if ($page == "bright_student" or $page = "old_question_papers")
{
    ?><style type="text/css">
        #sta
        {
            display: none;
        }
    </style><?php
}


if (isset($_GET['send']))
{
    $value = $sta;
    if(substr($sta, 0, 5) != "_req_") $value = "_req_".$value;
    else $value = substr($sta, 5);
    echo $value;
    
    if ($page == "individual_timetable")
    {
        $qry = "UPDATE status set individual_time_table='$value' where sid='$sid' ";
        mysqli_query($db,$qry);
    }
    else if ($page == "class_timetable")
    {
        $qry = "UPDATE status set class_time_table='$value' where sid='$sid' ";
        mysqli_query($db,$qry);
    }
    else if ($page == "lesson_plan")
    {
        $qry = "UPDATE status set lesson_plan='$value' where sid='$sid' ";
        mysqli_query($db,$qry);
    }
    else if ($page == "course_plan")
    {
        $qry = "UPDATE status set course_plan='$value' where sid='$sid' ";
        mysqli_query($db,$qry);
    }
    else if ($page == "notes")
    {
        $qry = "UPDATE status set notes='$value' where sid='$sid' ";
        mysqli_query($db,$qry);
    }
    else if ($page == "co_po_attainment")
    {
        $qry = "UPDATE status set co_po='$value' where sid='$sid' ";
        mysqli_query($db,$qry);
    }
    ?><script type="text/javascript">window.location.href="index.php?page=<?php echo $page ?>"</script><?php
}



if (isset($_POST['new_file']))
{
    $filename = $_POST['filename'];
    $filetype = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
    $path = "uploads/".$page."/".$sid."_".$filename.".".$filetype;

    if ($filetype!="php") 
        move_uploaded_file($_FILES["file"]["tmp_name"], $path);
    ?><script type="text/javascript">window.location.href="index.php?page=<?php echo $page ?>";</script><?php


    // if (pathinfo($_GET['upload'],PATHINFO_EXTENSION)=="pdf")
}
if (isset($_GET['delete']))
{
    if (count(glob($_GET['delete']))) unlink ($_GET['delete']);
    ?><script type="text/javascript">window.location.href="index.php?page=<?php echo $page ?>";</script><?php
}
if (isset($_POST['rename']))
{
    $old_path = $_POST['old_name'];
    $new_name = $_POST['new_name'];
    $filetype = pathinfo($old_path,PATHINFO_EXTENSION);

    rename($old_path, "uploads/".$page."/".$sid."_".$new_name.".".$filetype);

    ?><script type="text/javascript">window.location.href="index.php?page=<?php echo $page ?>";</script><?php
}

$fileType = pathinfo("uploads/$page/".$sid,PATHINFO_EXTENSION);
$file = glob ("./uploads/$page/$sid.*");

?>

<!DOCTYPE html>
<html>
    <head>
        <title>File Upload</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>

        <style type="text/css">
            .card_box
            {
                /*border-radius: 7px;*/
                /*box-shadow: 0 10px 15px rgba(0,0,0,0.3);*/
                height: 200px;
                width: 160px; 
                padding: 0;
                margin-left: 100px;
                margin-bottom: 50px;
            }
            .card_box img
            {
                cursor: pointer;
                height: 160px;
                width: 160px;
            }

            .card_upload {
                background-color: white;
                border-radius: 7px;
                box-shadow: 0 15px 20px rgba(0,0,0,0.3);
                padding: 10px 20px;
                width: 500px;
                padding-bottom: 6px;
            }
            .img
            {
                height: 300px;
                width:  300px;
            }
            #sidebar
            {
                padding-left: 20px;
            }
            #sidebar.active {
              margin-left: -275px;
            }
            ul
            {
                list-style: none;
            }

            .modal-dialog 
            {
                width: 90%;
            }
            iframe
            {
                height:600px;
                width: 100%;
                overflow: hidden;
            }
            
            
        </style>
    </head>
    <body>

        <h3 style="margin: 0;margin-top: 20px;text-align: center; padding-bottom: 40px;"><?php echo $pagename ?></h3>
        <div class="container card_upload">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3" style="padding: 0;">File Upload : </div>
                    <div class="col-sm-5 input"><input style="height: 25px;" type="text" name="filename" placeholder="File Name"></div>
                    <div class="" hidden><input style="height: 25px;" type="file" name="file" id="new_file_select" onchange="$('#newfile_submit').click();"></div>
                    <div class="col-sm-3"><input type="button" value="Upload" onclick="document.getElementById('new_file_select').click();" /></div>
                    <input id="newfile_submit" type="submit" name="new_file" value="Upload" hidden>
                </div>
            </form>
        </div>

        <?php
            $files = glob("uploads/".$page."/".$sid."_*");
            $file_count = count($files);
        ?>
        <!-- List -->
        <div class="container mt-4" style="margin-top: 40px;">
            
            <div class="row">
                <?php for ($i=0;$i<$file_count;$i++) { 
                    $name_index = strpos($files[$i], $sid."_");
                    $name = substr($files[$i], $name_index+strlen($sid)+1);

                ?>

                <div class="col-sm-4 card_box">
                    <img src="defaults/file.png" path="<?php echo $files[$i] ?>" onclick="loadmodel($(this).attr('path'))">
                    <p style="text-align: center;padding-top: 10px;"><?php echo $name; ?></p>
                </div>

                <?php } ?>
                
            </div>

        </div>

        <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="modalIMG" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body mb-0 p-0">
                        <img src="uploads/class_timetable/3.png" alt="" style="width:100%">
                    </div>
                    <div class="modal-footer">
                        <div><a href="uploads/class_timetable/3.png" target="_blank">Download</a></div>
                        <button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div> -->

        <div id="file_view_model"></div>


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
                        <!-- <button style="float: right;" onclick="window.location.href='<?php echo "index.php?page=".$page."&unsend" ?>' ">Unsend Request</button> -->
                        <button style="float: right; margin-right: 10px;"  onclick="window.location.href='<?php echo "index.php?page=".$page."&send" ?>' "><?php if(substr($sta, 0, 5) != "_req_") echo "Send"; else echo "Unsend"; ?> Request</button>
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

        <script type="text/javascript">
            function loadmodel(path)
            {
                $('#file_view_model').load("load_file_model.php?page=<?php echo $page ?>&path="+encodeURIComponent(path),{},()=>{
                    $('#myModalLabel').modal('show');
                });
            }
        </script>


    </body>
</html>