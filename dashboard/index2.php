<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Sidebar 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> -->
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="sidebar.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">ANITS <span>Course Files</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active"><a href="#"><span class="fa fa-home mr-3"></span> Home</a></li>
	          
	          <li><a href="../fileupload/index.php?page=individual_timetable"><b style="color: green;">Done:</b> Individual Time Table</a></li>
			  <li><a href="../fileupload/index.php?page=class_timetable"><b style="color: green;">Done:</b> Class Time Table</a></li>
			  <li><a href="../fileupload/index.php?page=course_plan"><b style="color: green;">Done:</b> Course plan</a></li>
			  <li><a href="../fileupload/index.php?page=lesson_plan"><b style="color: green;">Done:</b> Lesson plan</a></li>
			  <li><a href="../paper/index.php">Mid</a></li>
			  <li><a href="../paper/review.php">Review</a></li>
			  <li><a href="../paper/index.php">Assignment</a></li>
			  <li><a href="../fileupload/index.php?page=notes"><b style="color: green;">Done:</b> Notes</a></li>
			  <li><a href="../fileupload/index.php?page=old_question_papers"><b style="color: green;">Done:</b> Old question papers</a></li>
			  <li><a href="../rubrics/index.php"><b style="color: green;">Done:</b> Rubrics</a></li>
			  <li><a href="../paper/index.php">Open book test</a></li>
			  <li><a href="../content_beyond_syllabus/index.php">Contents beyond syllabus</a></li>
			  <li><a href="../tutorial/index.php">Tutorial classes</a></li>
			  <li><a href="">Quiz</a></li>
			  <li><a href="../remedial/index.php"><b style="color: green;">Done:</b> Remedial classes</a></li>
			  <li><a href="../fileupload/index.php?page="><b style="color: green;">Done:</b> Bright student</a></li>
			  <!-- <a href="../fileupload">Course feedback</a> -->
			  <!-- <a href="../fileupload">Result analysis</a> -->
			  <li><a href="#">Co-Po Attainment</a></li>
	        </ul>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Heading</h2>
        Hello
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script>
    	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });
    </script>
  </body>
</html>