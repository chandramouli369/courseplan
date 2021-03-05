<?php 
session_start();
$subdir="../";
// if ((basename(__DIR__) == "student") or (basename(__DIR__) == "faculty")) $subdir="studentinfo/";
// echo (dirname(__FILE__));
?>

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- <link rel="stylesheet" href="test.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script> -->

<!-- <link rel="stylesheet" href="../includes/bootstrap.min.css">
<script src="../includes/jquery.min.js"></script>
<script src="../includes/bootstrap.min.js"></script> -->

<nav class="navbar navbar-inverse" style="margin: 0; border-radius: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">ANITS Course Files</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li class="dropdown">
          <!-- <a href="<?php echo $subdir; ?>student/">Student</a> -->
         <!--  <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul> -->
        </li>
        <li><a href="<?php echo $subdir; ?>dashboard/">Faculty</a></li>
        <li><a href="<?php echo $subdir; ?>admin/">Admin</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
        <?php if (isset($_SESSION['username'])) { ?>
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name']; ?></a></li>
          <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        <?php } else{ ?>
          <li><a href=""><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
