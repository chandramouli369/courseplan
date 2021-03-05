<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		body
		{
			background: linear-gradient(to right, #1CB5E0, #000046);
		}
		.card
		{
			position: absolute;
			background-color: white;
			/*box-shadow: 10px;*/
			width: 300px;
			padding: 50px;
			border-radius: 10px;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
		}
		.card .label
		{
			text-align: center;
			font-size: 25px;
			margin-bottom: 30px; 
		}
		.card .input
		{
			display: block;
			width: 90%;
			padding: 5px;
			margin-bottom: 15px;
			/*border-radius: 30px;*/
			outline: none;
			border: none;
			border-bottom: 1px solid black;
		}
		.card .submit
		{
			background-color: 
		}
	</style>
</head>
<body>
	<div class="card">
		<form name="form" method="post" action="auth.php">
			<div class="label">Login</div>
			<input class="input" type="text" name="username" placeholder="Name">
			<input class="input" type="password" name="password" placeholder="Password">
			<input class="submit" type="submit" value="Login" name="login">
		</form>
	</div>

	<script type="text/javascript">
	  // function validate()
	  // {
	  //   // var name = document.forms["form"]["username"].value;
	  //   var pwd = document.forms["form"]["password"].value;
	      
	  //     if (!/[a-zA-Z0-9_\-]{6,25}/.test(pwd)) 
	  //     {
	  //         alert("Password must contain atleast 6 Characters");
	  //         return false;
	  //     }
	  //   return true;
	  // }
	</script>
</body>
</html>
