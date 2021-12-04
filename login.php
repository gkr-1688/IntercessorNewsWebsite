<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.html");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	          <link rel="icon" href="logo.png" type="image/x-icon" />
</head>
<body><br><br>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin blue;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 310px;
		color: white;
		background-color: blue;
		border: none;
	}

	#box{

		background-color: navy;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	h1{
		text-align: center;
		border: solid black;
		background-color: darkorchid;
		border-spacing: center;


	}
	body{
		background-color: #7FFFD4;
	}
	.ribbon {
 font-size: 15px;
 width: 20%;
    
 position: relative;
 background: gold;
 color: navy;
 text-align: center;
 padding: 1em 2em; 
 margin: 2em auto 3em;
}
.ribbon:before, .ribbon:after {
 content: "";
 position: absolute;
 display: block;
 bottom: -1em;
 border: 1.5em solid #986794;
 z-index: -1;
}
.ribbon:before {
 left: -2em;
 border-right-width: 1.5em;
 border-left-color: transparent;
}
.ribbon:after {
 right: -2em;
 border-left-width: 1.5em;
 border-right-color: transparent;
}
.ribbon .ribbon-content:before, .ribbon .ribbon-content:after {
 content: "";
 position: absolute;
 display: block;
 border-style: solid;
 border-color: #804f7c transparent transparent transparent;
 bottom: -1em;
}
.ribbon .ribbon-content:before {
 left: 0;
 border-width: 1em 0 0 1em;
}
.ribbon .ribbon-content:after {
 right: 0;
 border-width: 1em 1em 0 0;
}
body {
	text-align: center;
	align-items: center;
   width:1400px;height:750px;
   position:relative;
   border:15px solid white;
}
.red_ribbon {
   position: absolute;
   right: -6px; top: -8px;
   z-index: 1;
   overflow: hidden;
   width: 90px; height: 100px; 
   text-align: right;
}
.red_ribbon span {
   font-size: 15px;
   color: #fff; 
   text-align: right;
   font-weight: bold; line-height: 22px;
   transform: rotate(60deg);
   -webkit-transform: rotate(45deg); 
   width: 150px; display: block;
   background: #12AD2B;
   background: linear-gradient(#9BC90D 1%, #79A70A 99%);
   box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
   position: absolute;
   top: 20px; right: -22px;
}
strong{
	font-size: 25px;
}
.center {
  margin: auto;
  width: 600px;
  height: 80px;
  border: 3px solid #73AD21;
  padding: 5px;
  font-size: 30px;
  background-color: violet;
}
	</style>
	<h1 class="ribbon">
   <strong class="ribbon-content">Welcome to</strong>
</h1><div class="center">
  <p><img src="logo.png" height="50px" width="35px">IntercessorNews</p>
</div>
	<br><br><br>
<div class="main_div">
    <div class="red_ribbon"><span>IntercessorNews</span></div>
</div>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php" style="color: white">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>