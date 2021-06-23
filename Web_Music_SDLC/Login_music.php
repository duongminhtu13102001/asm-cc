<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style type="text/css">
		body{
    margin: 0;
    padding: 0;
    background: url("Img/hinh-nen-may-tinh-3d-2_111409826.jpg") center center fixed;
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
	background-repeat: no-repeat;
	
}

.loginbox{
    width: 320px;
    height: 420px;
    background: #000;
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

.loginbox p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.loginbox input{
    width: 100%;
    margin-bottom: 20px;
}

.loginbox input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.loginbox input[type="submit"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #fb2525;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.loginbox input[type="submit"]:hover
{
    cursor: pointer;
    background: #ffc107;
    color: #000;
}
.loginbox a{
    text-decoration: none;
    font-size: 12px;
    line-height: 20px;
    color: darkgrey;
}

.loginbox a:hover
{
    color: #ffc107;
}
	</style>
</head>
	<div class="loginbox">
		<img src="Img/199a225c0fa6e75157533a4454e10702.jpg" class="avatar">
		<h1>Login Here</h1>
		<form method = "post">
    
        <p>UserName:</p>
        <p colspan="3"><input type="text" name="Username" required placeholder="Username"> </p>
      
      
			<p width="15%"><b>Password:</p>
        <p colspan="3"><input type="Password" name="Password" required placeholder="Password"></p>
      
			<p align="left"></p>
        
        <p colspan="4"><input type="submit" name="login" value="login"> </p>
		  
   
		 <span> Don't have account? <a href="Register_music.php">Register Here</a><br />
    
  </form>
	</div>
		<?php
	$connect = mysqli_connect('localhost','root','','web_musics_sdlc');
	session_start();
	if(!$connect){
		echo "kết nối thất bại";
	}
else {

}
	if(isset($_POST['login'])){
  
  $Username = $_POST['Username'];
  $Password = $_POST['Password'];
  $sql="select * from user where Username='$Username' AND Password='$Password'";
  $result = mysqli_query($connect,$sql);  
  $check_login = mysqli_num_rows($result);  
  if($check_login == 0){
   echo "<script>alert('Password or username is incorrect, please try again!')</script>";
   exit();
  }  
  if($check_login > 0){   
  echo "<script>alert('You have logged in successfully !')</script>";  
  echo"<script>window.open('index.php','_self')</script>";
  $_SESSION['Username'] = $Username;
  }
}
	?>
<body>
</body>
</html>