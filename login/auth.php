<?php

session_start();

require("../db.php");


if (isset($_POST['login']))
{
	$username = mysqli_escape_string($db,$_POST['username']);
    $password = mysqli_escape_string($db,$_POST['password']);
	// $password = md5(sha1(crypt($password,10)));
	$query = "SELECT * FROM users where username='$username' and password='$password'";
	$res = mysqli_query($db, $query);
	$row = mysqli_fetch_array($res);
    $sameusers = mysqli_num_rows($res);

    if ($sameusers==1)
    {
    	$_SESSION['userid']=$row['userid'];
    	$_SESSION['username']=$row['username'];
        $_SESSION['name']=$row['name'];
    	$_SESSION['email']=$row['email'];
        $_SESSION['usertype']=$row['usertype'];

        if ($row['usertype']=="admin")
        {
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['is_admin'] = true;
        } 

        if ($row['usertype']=="faculty") header("Location:../dashboard");
        else if ($row['usertype']=="admin") header("Location:../admin");
    }
    else header("Location:index_login.php?error=invalid_details");
}

?>