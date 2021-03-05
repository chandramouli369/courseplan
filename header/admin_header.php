<?php
session_start();

if (isset($_SESSION['is_admin'])) if ($_SESSION['is_admin']) $_SESSION['name'] = $_SESSION['admin_name'];
$name = $_SESSION['name'];

?>
		<script src="../js/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="../header/sidebar.css"> -->
		<style type="text/css">
			.header
			{
				height: 60px;
				padding-left: 40px;
				background-color: rgb(52, 69, 180);
			}
			.header h2 .logo {
			  color: #fff;
			}

			.header h1 .logo span {
			  font-size: 14px;
			  color: #44bef1;
			  display: block;
			}
			.header .menu ul
			{
				margin: 0;
			}
			.menu_items li
			{
				padding-top: 25px;
			}
			.header .menu li
			{
				display: block;
				float: left;
			}
			.header .menu li>a
			{
				color: white;
				text-decoration: none;
				font-size: 20px;
			}
		</style>
		<div>
			<style scoped>
		        @import "../header/sidebar.css";
		        @import "../header/header.css";
		    </style>

		    <div class="header">
			  	
			  	<div class="menu">
			  		<ul>
			  			<li><h2 style="margin: 0!important;padding: 12px;"><a href="../admin/editable.php" class="logo">Course Files</a></h2></li>
			  			<!-- <li style="color: white;font-size: 50px;font-weight: 100;">|</li> -->
			  			<!-- <div class="menu_items">
				  			<li style="margin-left: 50px;"><a href="../dashboard">Dashboard</a></li>
			  			</div> -->
			  			<li style="float: right;color: white; font-size: 20px;margin-right: 10px;padding: 15px;"><a href="../login/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

			  			<li style="float: right;color: white; font-size: 20px;margin-right: 10px;padding: 15px;"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;<?php echo $name ?></li>
			  		</ul>
			  	</div>
		    	
		    </div>

			<div class="wrapper d-flex align-items-stretch">
				<nav id="sidebar">
					<div class="custom-menu">
						<button type="button" id="sidebarCollapse" class="btn btn-primary">
				          <i class="fa fa-bars"></i>
				          <span class="sr-only">Toggle Menu</span>
				        </button>
			        </div>
					<div class="p-4">
			  		<h1><a href="" class="logo">ANITS <span>Course Files</span></a></h1>
		        <ul class="list-unstyled components mb-5">
		          <li class="active"><a href="../admin/editable.php"><span class="fa fa-home mr-3"></span> Home</a></li>
		          
		          <li><a href="editable.php">Edit Lecturer</a></li>
		          <li><a href="assign.php">Assign Lecturer</a></li>
		          <li><a href="verify.php">Review All</a></li>
		          <li><a href="adduser.php">Add User</a></li>
				  
		        </ul>

		      </div>
	    	</nav>
	    </div>
	</div>

    <script>
      $('#sidebar').toggleClass('active');
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