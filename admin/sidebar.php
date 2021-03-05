<style type="text/css">
	.sidebar {
  margin-top: -2%;
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
.sidebar a.active3 {
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

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
.header
{
	height: 50px;
	background-color: #2c3e50;
}
.header .head
{
	color: white;
	font-size: 30px;
	padding-top: 10px;
	padding-left: 10px;
}
.header .options
{
	/*float: left;*/
}
.logout a
{
	text-decoration: none;
	float: right;
	font-size: 25px;
	color: white;
	margin-top: -35px;
	margin-right: 50px;
}
.user_name a
{
	text-decoration: none;
	float: right;
	font-size: 25px;
	color: white;
	margin-top: -35px;
	margin-right: 200px;
}


a
{
	text-decoration: none;
}
.header
{
	height: 60px;
	background-color: #2c3e50;
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

<!-- <div class="header">
	<div class="head options">Course Files</div>
	<div class="options logout"><a href="">Logout</a></div>
	<div class="options user_name"><a href="">Name</a></div>
</div> -->
<div class="header">
			  	
	<div class="menu">
		<ul>
			<li><h2 style="margin: 0!important;padding: 12px;"><a href="../dashboard" class="logo">Course Files</a></h2></li>
			<!-- <li style="color: white;font-size: 50px;font-weight: 100;">|</li> -->
			<!-- <div class="menu_items">
  			<li style="margin-left: 50px;"><a href="../dashboard">Dashboard</a></li>
			</div> -->
			<li style="float: right;color: white; font-size: 20px;margin-right: 10px;padding: 15px;"><a href="../login/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

			<li style="float: right;color: white; font-size: 20px;margin-right: 10px;padding: 15px;"><i class="fa fa-user" aria-hidden="true"></i> &nbsp;Name</li>
		</ul>
	</div>

</div>

<div class="sidebar">
	<a href="" class="active">ADMIN</a>
	<a href="editable.php">Edit lecturer</a>
	<a href="assign.php">Assign lecturer</a>
	<a href="verify.php">Review all</a>
	<a href="adduser.php">Add User</a>
</div>