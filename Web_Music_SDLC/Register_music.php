<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
		<div style="background-image: url(https://dulichchat.com/wp-content/uploads/2019/10/du-lich-sapa-ninh-binh-dulichchat.jpg); width: 50rem; ">
		<form method="post" enctype="multipart/form-data">
		 <table>
        <tr>
            <td style="font-size: 50px;"> Register </td>
            <br>
            <tr>
                <td style="font-size: 20px;"> Please enter your complete information in the form below </td>
            </tr>
        </tr>
        <tr>
            <td style="font-size: 20px;"> Alredy have account? <a href="Login_music.php"> Login account </a> </td>
        
        <tr>
            <td style="font-size: 15px;"> <label> First and last name </label> </td>
        
            <td> <input type="text" name="FullName" required placeholder="Your answer"> </td>
        </tr>
        <tr>
            <td style="font-size: 15px;"><label> Phone number </label></td>
       
            <td> <input type="text" name="Phone" required placeholder="Your answer"></td>
       </tr>
	   <tr>
            <td><label > Account </label></td>
            <td> <input type="text" name="Username" required placeholder="Your answer"></td>
        </tr>
        <tr>
            <td> <label> Password </label></td>
            <td> <input type="password" name="Password" required placeholder="Your answer"></td>
        </tr>
			<tr>
				<td> Role </td>
				<td> <input type="text" name="Role" required placeholder="Your answer"></td>
			</tr>
			<tr>
				<td> Creditcard </td>
				<td> <input type="text" name="Creditcard" required placeholder="Your answer"></td>
			</tr>
		<tr>
			<td> <input type="submit" name="register" value="Register"> </td>
		</tr>
		</form>
		<?php
		$connect = mysqli_connect("localhost", "root", "", "web_musics_sdlc");
		mysqli_set_charset($connect,"utf8");
		
		if (!$connect){
			echo "ket noi that bai";
		}
		else{
			echo "";
		}
    if (isset($_POST['register'])) { 
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $FullName = $_POST['FullName'];
	$Phone = $_POST['Phone'];
	$Role = $_POST['Role'];
	$Creditcard = $_POST['Creditcard'];
	$sql="INSERT INTO user VALUES (NULL,'$Username','$Password','$Phone','$FullName','$Role','$Creditcard')";
    $result = mysqli_query($connect,$sql);
    if ($result) {
      echo "<script>alert('Account has been created successfully!')</script>";
      echo "<script>window.open('login_music.php','_self')</script>";
    }
    else{
      echo"<script>alert('Error')</script>";
    }  
  }
  ?>
    </table>
    </div>
</body>
</html>