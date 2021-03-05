<?php
include ("header.php");
require("../db.php");
// echo (15*60+time())-time();
if (isset($_POST['change']))
{
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $qry = "SELECT * from users where email='$email' ";
    $res = mysqli_query($db, $qry);
    $data = mysqli_fetch_assoc($res);

    if ($data['otp']==$otp && $password1==$password2)
    {
        $qry = "UPDATE users set password='$password1' where email='$email' ";
        mysqli_query($db, $qry);

        ?><script>window.location.href="logout.php"</script><?php
    }
}

$email = $_POST['email'];
$otp = $_POST['otp'];


$qry = "SELECT * from users where email='$email' ";
$res = mysqli_query($db, $qry);
$data = mysqli_fetch_assoc($res);
if ($data['otp']!=$otp || (time()-$data['reset_time'])>900) header("Location:otp.php?email=$email&error=otp_time");


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
        
        		<div>
        			<div class="modal-dialog modal-login animated fadeInUp faster">
                        <?php if(isset($_GET['error'])) if($_GET['error']=="psw") { ?>
                    <div class="alert alert-danger alert-dismissible fade in">
                        Passwords Doesn't match<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      </div>
                    <?php } ?>


					    <div class="modal-content">
					        <div class="modal-header">
					            <h4 class="modal-title">Reset Password</h4>
					        </div>
					        <div class="modal-body">
					            <form action="" method="post">
                                    <input type="text" name="email" value="<?php echo $email ?>" hidden>
                                    <input type="text" name="otp" value="<?php echo $otp ?>" hidden>
					                <div class="form-group">
					                    <div class="input-group">
					                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					                        <input type="password" class="form-control" name="password1" placeholder="New Password" required="required">
					                    </div>
					                </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required="required">
                                        </div>
                                    </div>
					                <div class="form-group">
                                        <button type="submit" name="change" class="btn btn-primary btn-block btn-lg">Change Password</button>
                                    </div>
					            </form>
					        </div>
					    </div>
					</div>
        		</div>
        	</div>
        </div>
        <!-- <div id="test"></div> -->
    </body>
</html>

<script>
    function sendotp()
    {

        <?php // if (isset($_GET['email'])) { ?>
            $('#sendotp').html('<div align="center"><i class="fa fa-circle-o-notch fa-spin" style="font-size:24px"></i></div>');
            var k = $(this).load("../phpMailer/index.php?email="+$('#email').val(), {}, ()=>{
                $('#sendotp').html('<div align="center">OTP sent</div>');
                // console.log("../phpMailer/index.php?email="+$('#email').val());
            });

        <?php //} ?>
    }
</script>


