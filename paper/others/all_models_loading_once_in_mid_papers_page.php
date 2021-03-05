<?php
session_start();

require("../db.php");

$sid = $_SESSION['sid'];
$qry = "SELECT * from subjects where sid='$sid' ";

$data = mysqli_fetch_assoc(mysqli_query($db, $qry));
if (isset($_GET['delete']))
{
	if (count(glob($_GET['delete']))) unlink ($_GET['delete']);
	?><script type="text/javascript">window.location.href='newindex.php';</script><?php
}
if (isset($_GET['upload']))
{
	$filetype = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
	if ($filetype=="pdf") 
    	move_uploaded_file($_FILES["file"]["tmp_name"], $_GET['upload']);
	?><script type="text/javascript">window.location.href='newindex.php';</script><?php

	// if (pathinfo($_GET['upload'],PATHINFO_EXTENSION)=="pdf")
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Paper</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

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
    </style>

</head>
<body>

	<div class="container" style="margin-top: 80px;">

		<div class="row card">
			<div class="col-sm-2">
				<img src="defaults/paper.png">
			</div>
			<div class="col-sm-10">
				<div class="title">Mid - 1</div>
				<div class="modified" style="margin-bottom: 15px;">Date Modified: 14-02-2020</div>
				<div class="col-sm-2"><button data-target="#mid1modal_paper" data-toggle="modal" class="pbutton">Paper</button></div>
				<div class="col-sm-2"><button data-target="#mid1modal_scheme" data-toggle="modal" class="pbutton">Scheme of Evalution</button></div>
				<div class="col-sm-2"><button data-target="#mid1modal_key" data-toggle="modal" class="pbutton">Key</button></div>
				<div class="col-sm-2"><button data-target="#mid1modal_marks" data-toggle="modal" class="pbutton">Marks</button></div>
				<div class="col-sm-2"><button data-target="#mid1modal_sample_papers" data-toggle="modal" class="pbutton">Sample Papers</button></div>
				<div class="col-sm-2"><button class="pbutton">Delete</button></div>
			</div>
		</div>

		<div class="row card">
			<div class="col-sm-2">
				<img src="defaults/paper.png">
			</div>
			<div class="col-sm-10">
				<div class="title">Mid - 2</div>
				<div class="modified" style="margin-bottom: 15px;">Date Modified: 14-02-2020</div>
				<div class="col-sm-2"><button data-target="#mid2modal_paper" data-toggle="modal" class="pbutton">Paper</button></div>
				<div class="col-sm-2"><button data-target="#mid2modal_scheme" data-toggle="modal" class="pbutton">Scheme of Evalution</button></div>
				<div class="col-sm-2"><button data-target="#mid2modal_key" data-toggle="modal" class="pbutton">Key</button></div>
				<div class="col-sm-2"><button data-target="#mid2modal_marks" data-toggle="modal" class="pbutton">Marks</button></div>
				<div class="col-sm-2"><button data-target="#mid2modal_sample_papers" data-toggle="modal" class="pbutton">Sample Papers</button></div>
				<div class="col-sm-2"><button class="pbutton">Delete</button></div>
			</div>
		</div>

		

	</div>
	<?php 
	$upload_files = array("paper", "scheme", "key", "marks", "sample_papers");
	for ($i=1; $i<=2;$i++)
	{
		for ($j=0; $j<5;$j++)
		{
			?>
			<!-- Model -->
			<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="<?php echo 'mid'.$i.'modal_'.$upload_files[$j]; ?>" role="dialog" tabindex="-1">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-body mb-0 p-0">
							<?php 
								$path = "uploads/".$data['academic_year']."/".$data['subject_name']."/mid".$i."/".$upload_files[$j].".pdf"; 
								$perminent_path = $path;
								if (!glob($path)) $path="defaults/no_file_uploaded.png";
							?>
							<!-- <img src="../fileupload/uploads/class_timetable/3.png" alt="" style="width:100%"> -->
							<iframe src="<?php echo $path; ?>" frameborder="0"></iframe>
						</div>
						<div class="modal-footer">
							<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" ><a href="<?php echo $path; ?>" target="_blank">Download</a></button>

							<button path="<?=$perminent_path?>" class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center model_upload" id="" type="button" onclick="upload_pdf($(this).attr('path'))">Upload</button>

							<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" onclick="window.location.href='newindex.php?delete=<?=$path?>'">Delete</button>

							<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	}

	?>

	<form method="post" id="upload_pdf_form" enctype="multipart/form-data" hidden>
		<input class="file_select" type="file" name="file" onchange="$('#file_auto_submit').click();">
		<input id="file_auto_submit" type="submit" name="submit" value="Upload">
	</form>
	<script type="text/javascript">
		function upload_pdf(path)
		{	
			$('#upload_pdf_form').attr("action","newindex.php?upload="+path);
			$('.file_select').click();
		}
		
	</script>

</body>
</html>