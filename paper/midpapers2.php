<?php
// session_start();
clearstatcache();
require("../db.php");
include("../header/header.php");

$sid = $_SESSION['sid'];
$qry = "SELECT * from subjects where sid='$sid' ";

$data = mysqli_fetch_assoc(mysqli_query($db, $qry));
if (isset($_GET['delete']))
{
	if (count(glob($_GET['delete']))) unlink ($_GET['delete']);
	?><script type="text/javascript">window.location.href='midpapers.php';</script><?php
}
if (isset($_GET['upload']))
{
	$filetype = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
	if ($filetype!="php") 
    	move_uploaded_file($_FILES["file"]["tmp_name"], $_GET['upload']);
	?><script type="text/javascript">window.location.href='midpapers.php';</script><?php

	// if (pathinfo($_GET['upload'],PATHINFO_EXTENSION)=="pdf")
}
if (isset($_GET['send_to_sid']))
{
	$mid = $_GET['mid'];
	$from = $sid;
	$to = $_GET['send_to_sid'];
	$qry = "INSERT into review(from_sid, to_sid, type) values('$from', '$to', '$mid') ";
	mysqli_query($db, $qry);
	?><script type="text/javascript">//window.location.href="midpapers.php";</script><?php
}
$upload_files = array("paper", "scheme", "key", "marks", "sample_papers");

// Send to Admin
$qry = "SELECT mid from status where sid='$sid' ";
$sta = mysqli_fetch_assoc(mysqli_query($db,$qry))['mid'];

if (isset($_GET['send']))
{
    $value = $sta;
    if(substr($sta, 0, 5) != "_req_") $value = "_req_".$value;
    else $value = substr($sta, 5);
    
    $qry = "UPDATE status set mid='$value' where sid='$sid' ";
    mysqli_query($db,$qry);
    // echo $qry;
    
    ?><script type="text/javascript">window.location.href="midpapers.php"</script><?php
}
// End

?>

<!DOCTYPE html>
<html>
<head>
	<title>Paper</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <meta http-equiv=”Pragma” content=”no-cache”>
	<meta http-equiv=”Expires” content=”-1″>
	<meta http-equiv=”CACHE-CONTROL” content=”NO-CACHE”>


    <style type="text/css">
    	.card
    	{
    		border-radius: 7px;
            box-shadow: 0 10px 15px rgba(0,0,0,0.3);
            height: 150px;
            margin-bottom: 50px;
    	}
    	.card img
    	{
    		height: 130px;
    		width: 130px;
    		border-radius: 5px;
    		margin: 10px;
    	}
    	.title
    	{
    		font-size: 25px;
    	}
    	.pbutton
    	{
    		border: none;
    		outline: none;
    		color: white;
    		height: 50px;
    		width: 100px;
    		border-radius: 10px;
    		background-color: #3498db;
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
    </style>

</head>
<body>

	<div class="container" style="padding-top: 80px;">

		<div class="row card">
			<div class="col-sm-2">
				<img src="defaults/paper.png">
			</div>
			<div class="col-sm-10">
                <div class="title">Mid - 1</div>
                <div class="modified" style="margin-bottom: 15px;">Date Modified: 14-02-2020</div>
                <div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid1/".$sid."_paper.pdf"?>' data-target="#mid1modal_paper" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Paper</button></div>
                <div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid1/".$sid."_scheme.pdf"?>' data-target="#mid1modal_scheme" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Scheme of Evalution</button></div>
                <div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid1/".$sid."_key.pdf"?>' data-target="#mid1modal_key" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Key</button></div>
                <div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid1/".$sid."_marks.pdf"?>' data-target="#mid1modal_marks" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Marks</button></div>
                <div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid1/".$sid."_sample_papers.pdf"?>' data-target="#mid1modal_sample_papers" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Sample Papers</button></div>
                <div class="col-sm-2"><button class="pbutton">Send for review</button></div>
            </div>
		</div>

		<div class="row card">
			<div class="col-sm-2">
				<img src="defaults/paper.png">
			</div>
			<div class="col-sm-10">
				<div class="title">Mid - 2</div>
				<div class="modified" style="margin-bottom: 15px;">Date Modified: 14-02-2020</div>
				<div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid2/".$sid."_paper.pdf"?>' data-target="#mid1modal_paper" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Paper</button></div>
				<div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid2/".$sid."_scheme.pdf"?>' data-target="#mid1modal_scheme" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Scheme of Evalution</button></div>
				<div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid2/".$sid."_key.pdf"?>' data-target="#mid1modal_key" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Key</button></div>
				<div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid2/".$sid."_marks.pdf"?>' data-target="#mid1modal_marks" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Marks</button></div>
				<div class="col-sm-2"><button path='<?php echo "uploads/".$data['academic_year']."/".$data['subject_name']."/mid2/".$sid."_sample_papers.pdf"?>' data-target="#mid1modal_sample_papers" data-toggle="modal" class="pbutton" onclick="loadmodel($(this).attr('path'))">Sample Papers</button></div>
				<div class="col-sm-2"><button class="pbutton">Send for review</button></div>
			</div>
		</div>

		

	</div>





	<!-- Model -->
	<div aria-hidden="true" id="myModalLabel" aria-labelledby="myModalLabel" class="modal fade" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body mb-0 p-0">
					<iframe id="model_frame" src="" frameborder="0"></iframe>
				</div>
				<div class="modal-footer">
					<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" ><a href="" id="model_download" target="_blank">Download</a></button>

					<button id="model_upload" path="" class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center model_upload" id="" type="button" onclick="upload_pdf($(this).attr('path'))">Upload</button>

					<button id="model_delete" class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" onclick="window.location.href='midpapers.php?delete= '">Delete</button>

					<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
				</div>
			</div>
		</div>
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
                        <button style="float: right; margin-right: 10px;"  onclick="window.location.href='<?php echo "midpapers.php?send" ?>' "><?php if(substr($sta, 0, 5) != "_req_") echo "Send"; else echo "Unsend"; ?> Request</button>
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






	<div id="paper_view_model"></div>

	<form method="post" id="upload_pdf_form" enctype="multipart/form-data" hidden>
		<input class="file_select" type="file" name="file" onchange="$('#file_auto_submit').click();">
		<input id="file_auto_submit" type="submit" name="submit" value="Upload">
	</form>
	<script type="text/javascript">
		function upload_pdf(path)
		{	
			$('#upload_pdf_form').attr("action","midpapers.php?upload="+path);
			$('.file_select').click();
		}

		function loadmodel(path)
		{
				$('#model_frame').attr('src', path+"?v="+$.now());
				$('#model_download').attr('href', path+"?v="+$.now());
				$('#model_upload').attr('path', path);
				$('#model_delete').attr('onclick', "window.location.href=\'midpapers.php?delete="+path+"\'");

				$('#myModalLabel').modal('show');

                $.ajax({url: path,type:'HEAD',error:()=>{
                    $('#model_frame').attr('src', "defaults/upload_file.jpg?v="+$.now());
                }});
		}
	</script>

</body>
</html>