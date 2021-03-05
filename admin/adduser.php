<?php include("../header/admin_header.php") ?>

<?php

// session_start();
if ($_SESSION['usertype']!="admin") header("Location:../login/index_login.php");

require "../db.php";

if (isset($_POST['adduser']))
{
  $usertype = $_POST['usertype'];
  $username = $_POST['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];

  $qry = "INSERT INTO `users`(`username`, `name`, `password`, `usertype`, `email`) VALUES ('$username', '$name', 'password', '$usertype', '$email') ";
  mysqli_query($db, $qry);



  ?>
  <script> 
    $(this).load("../phpMailer/index.php?email=<?php echo $email ?>", {}, ()=>{
      alert("OTP sent to <?php echo $email ?>");
    });
  </script>
  <?php

}


?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<head>
<style>
  #sidebar
  {
      padding-left: 10px;
      margin-left: 0px;
  }
  #sidebar.active {
    margin-left: -280px;
  }
  ul
  {
      list-style: none;
  }
body {
  margin: 0;
  font-family: "Lato", sans-serif;

}
.sidebar {
  margin-top: 0;
  padding: 0;
  width: 200px;
  background-color: #2c3e50;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 

.sidebar a.active {
  background-color: black;
  color: white;
}
.sidebar a.active2 {
  background-color: green;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #72587F;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}


body{
color: white;
font-size: 17px;
   font-family:sans-serif;
}
.contact{
max-width: 350px;
margin: auto;
border-radius: 5px;

background-color: rgba(0,0,0,0.6);
padding: 20px;
}
select{
width: 100%;
padding: 12px 20px;
margin: 8px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;

}
input[type=submit]
{
width: 100%;
background-color: #ff4000;
color:white;
padding:14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
}
.usertype
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.text
{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
</style>
<body>

<h1 style="text-align: center;font-family:sans-serif;color: black">Add User</h1>
<div class="contact">
<form method="post" >
  Usertype : 
  <select name="usertype" id="select">
    <option value="faculty">Faculty</option>
    <option value="admin">Admin</option>
  </select>
<br>
Username :
<input type="text" class="text" name="username">
<br>
Name :
<input type="text" class="text" name="name">
<br>
Email :
<input type="text" class="text" name="email">
<br>

<input type="submit"  name="adduser" value="Submit">        
</form>

</body>
</html>
