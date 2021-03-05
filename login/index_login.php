<?php
include ("header.php");

if(isset($_SESSION['userid'])) header("Location:../dashboard");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Course File</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="animate.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style type="text/css">
            body {
                font-family: 'Varela Round', sans-serif;

                background: #667db6;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #667db6, #0082c8, #0082c8, #667db6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            .modal-login {
            /*margin-left:1000px;*/
            width: 350px;
            }
            .modal-login .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            }
            .modal-login .modal-header {
            border-bottom: none;
            justify-content: right;
            }
            .modal-login .close {
            top: 100px;
            right: 90px;
            }
            .modal-login h4 {
            color: #636363;
            text-align: center;
            font-size: 26px;
            margin-top: 0;
            }
            .modal-login .modal-content {
            color: #999;
            border-radius: 1px;
            margin-bottom: 15px;
            background: #fff;
            border: 1px solid #f3f3f3;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 25px;
            }
            .modal-login .form-group {
            margin-bottom: 20px;
            }
            .modal-login label {
            font-weight: normal;
            font-size: 13px;
            }
            .modal-login .form-control {
            min-height: 38px;
            padding-left: 5px;
            box-shadow: none !important;
            border-width: 0 0 1px 0;
            border-radius: 0;
            }
            .modal-login .form-control:focus {
            border-color: #ccc;
            }
            .modal-login .input-group-addon {
            max-width: 42px;
            text-align: center;
            background: none;
            border-width: 0 0 1px 0;
            padding-left: 5px;
            border-radius: 0;
            }
            .modal-login .btn {        
            font-size: 16px;
            font-weight: bold;
            background: #19aa8d;
            border-radius: 3px;
            border: none;
            min-width: 140px;
            outline: none !important;
            }
            .modal-login .btn:hover, .modal-login .btn:focus {
            background: #179b81;
            }
            .modal-login .hint-text {
            text-align: center;
            padding-top: 5px;
            font-size: 13px;
            }
            .modal-login .modal-footer {
            color: #999;
            border-color: #dee4e7;
            text-align: center;
            margin: 0 -25px -25px;
            font-size: 13px;
            justify-content: center;
            }
            .modal-login a {
            color: #fff;
            text-decoration: underline;
            }
            .modal-login a:hover {
            text-decoration: none;
            }
            .modal-login a {
            color: #19aa8d;
            text-decoration: none;
            }	
            .modal-login a:hover {
            text-decoration: underline;
            }
            .modal-login .fa {
            font-size: 21px;
            }
            .trigger-btn {
            display: inline-block;
            margin: 100px auto;
            }
            .description
            {
            font-style: Sans-Serif;
            font-size: 18px;
            color: #fff;
            }
            .desc{
            /*border: 1px solid black;*/
            margin-top: 50px;
            margin-bottom: 100px;
            padding-left: 55px;
            text-align: justify;
            /*margin-right: 100px;*/
            /*margin-left: 10px;*/
            }

            .flipInX {
			  animation-duration: 1.5s;
			  animation-delay: 0.3s;
			}
            .bounceIn {
			  animation-duration: 2s;
			  animation-delay: 0.3s;
			}
			.jackInTheBox {
			  animation-duration: 2s;
			  animation-delay: 0.8s;
			}
            @keyframes fadeInUp {
              from {
                opacity: 0;
                transform: translate3d(0, 10%, 0);
              }

              to {
                opacity: 1;
                transform: none;
              }
            }
        </style>
    </head>
    <body>
        <div class="title animated fadeInDown"><h2 style="text-align:center; color: #fff;"><b>COURSE FILE</b></h2></div>


        <div class="container-fluid">
        	<div class="row">
        		<div class="col-sm-7">
        			<div class="desc animated bounceIn">
			            <div class="description">
			                <!-- <h3 style="text-align:left"><b>DESCRIPTOIN:</b></h3> -->
			                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
			                	In  the academic setup, a <b>course file</b> is essentially a document that includes all the necessary details regarding the batch, assessment and overall outcomes of the <b>course</b>. 
			                    All universities usually mandates the need to keep a <b>course file</b>  
			                    by the faculties, and most are quite strict on following it too.

			                    <br><br>
			                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 

			                    The  archiving system for  course files is very important for all departments in the colleges and universities. The main aim of this system is to  solve the problems related to submission the files by hand from faculty members to the Committees of Academic Acrediation in the university faculties.

			                    <br><br>

			                </p>
			            </div>
			            
			            <div class="coordinator">
			                <p style="text-align: right; color: #fff;"><b>COORDINATOR : Joshua Johnson</b></p>
			            </div>
			        </div>
        		</div>
        
        		<div class="col-sm-5">
        			<div class="modal-dialog modal-login animated fadeInUp faster">
                        <?php if(isset($_GET['error'])) if($_GET['error']=="invalid_details") { ?>
                    <div class="alert alert-danger alert-dismissible fade in">
                        Authentication Failed -> Please check your login credentials<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                    <?php } ?>

                    <?php if(isset($_GET['error'])) if($_GET['error']=="logout_success") { ?>
                    <div class="alert alert-success alert-dismissible fade in">
                        Logged out Successfully<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                    <?php } ?>



					    <div class="modal-content">
					        <div class="modal-header">
					            <h4 class="modal-title">LOGIN</h4>
					        </div>
					        <div class="modal-body">
					            <form action="auth.php" method="post">
					                <div class="form-group">
					                    <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
					                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">
					                    </div>
					                </div>
					                <div class="form-group">
					                    <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
					                    </div>
					                </div>
					                <div class="form-group">
					                    <button type="submit" name="login" class="btn btn-primary btn-block btn-lg">login</button>
					                </div>
                                    <div class="form-group">
                                        <div align="center"><a href="otp.php">Forgot Password!</a></div>
                                    </div>
					            </form>
					        </div>
					    </div>
					</div>
        		</div>
        	</div>
        </div>

    </body>
</html>


