<?php
// session_start();
include("../header/header.php");

$id = $_SESSION['userid'];
$sid = $_SESSION['sid'];
$acyear = $_SESSION['academic_year'];
$sub = $_SESSION['subject_name'];


$rid = $_GET['rid'];
$mid_path = "uploads/".$acyear."/".$sub."/mid1/".$sid."_paper.pdf";

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#sidebar
		{
		    padding-left: 20px;
		}
		#sidebar.active {
		  margin-left: -290px;
		}
		ul
		{
		    list-style: none;
		}

		iframe
		{
			float: left;
			height: 800px;
			width: 49%;
		}

	</style>
</head>
<body>
	<iframe src="<?php echo $mid_path ?>" scrolling="hidden" frameborder="0"></iframe>
	<iframe src="review_page.php?rid=<?php echo $rid; ?>"></iframe>
</body>
</html>