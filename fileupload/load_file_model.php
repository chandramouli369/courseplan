<?php

$page = $_GET['page'];
$path = $_GET['path'];
$perminent_path = $path;
if (!glob($path)) $path="defaults/no_file_uploaded.png";



?>

<!-- Model -->
<div aria-hidden="true" id="myModalLabel" aria-labelledby="myModalLabel" class="modal fade" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">

		<div class="modal-content">

			<!-- <div class="modal-header" style="padding: 0">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title">Modal Header</h4>
	        	<form>
	        		<input type="text" name="name">
	        		<input type="submit" name="rename">
	        	</form>
	      	</div> -->

			<div class="modal-body mb-0 p-0">
				<iframe src="<?php echo $path; ?>" frameborder="0"></iframe>
			</div>
			<div class="modal-footer">
				<form method="post" action="index.php?page=<?=$page?>" style="position: absolute;">
					<!-- <input type="text" value="<?php echo $page; ?>" name="page" hidden> -->
					<input type="text" value="<?php echo $path; ?>" name="old_name" hidden>
	        		<input type="text" name="new_name" style="outline: none; border: 0; border-bottom: 1px solid black;" placeholder="Rename File">
	        		<input type="submit" name="rename" value="Rename" class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center">
	        	</form>

				<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" ><a href="<?php echo $path; ?>" target="_blank">Download</a></button>

				<!-- <button path="<?=$perminent_path?>" class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center model_upload" id="" type="button" onclick="upload_pdf($(this).attr('path'))">Upload</button> -->

				<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" onclick="window.location.href='index.php?page=<?=$page?>&delete=<?=$path?>'">Delete</button>

				<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>