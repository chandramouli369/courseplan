<?php
// clearstatcache();

$path = $_GET['path'];
$perminent_path = $path;
if (!glob($path)) $path="defaults/upload_file.jpg";



?>

<!-- Model -->
<div aria-hidden="true" id="myModalLabel" aria-labelledby="myModalLabel" class="modal fade" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body mb-0 p-0">
				<iframe src="<?php echo $path; ?>" frameborder="0"></iframe>
			</div>
			<div class="modal-footer">
				<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" ><a href="<?php echo $path; ?>" target="_blank">Download</a></button>

				<button path="<?=$perminent_path?>" class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center model_upload" id="" type="button" onclick="upload_pdf($(this).attr('path'))">Upload</button>

				<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" type="button" onclick="window.location.href='midpapers.php?delete=<?=$path?>'">Delete</button>

				<button class="btn btn-outline-primary btn-rounded btn-md ml-4 text-center" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>