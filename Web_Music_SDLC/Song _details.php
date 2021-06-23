<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
</head>

<body>
	<?php 
session_start();
 ?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="admin/Songlist.php">Songs</a>
          <a class="dropdown-item" href="admin/Genrelist.php">Genre</a>
        
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Acount
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Login_music.php">SingIn</a>
          <a class="dropdown-item" href="Register_music.php">SingUp</a>
        
        </div>
      </li>
 <li>
			<a href="./Manage_shopping_cart.php"> <img src="Img/giohang.png" style="width: 50px"></a>
		</li>
    </ul>
     <form class="form-inline my-2 my-lg-0" method="get" action="Search_song.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="inputsearch" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
    </form>
  </div>
</nav>
 <div class="container">
 <div class="row justify-content-between">
    <?php 
	  $conn = mysqli_connect('localhost','root','','web_musics_sdlc');
	 if($conn){ echo"";}
    $id=$_GET["id"];
    $sql="SELECT * FROM song Where song.SongID={$id} ";
    $rs= mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_assoc($rs)) {
     ?>
	   <p>
          Basic song info:
        </p>
        <div class="col-12" style=" text-align: left;">
        <h2 class="name-pro">Name Of Music: <?php echo $row['SongName'] ?></h2>
		<h2 class="name-pro">Name Of Singer: <?php echo $row['NameSinger'] ?></h2>
        <p style="color: red;padding-left: 20px;"> Price: <?php echo $row['Price']." $"; ?></p>
          <audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 250px">
          <source src="song/<?php echo $row['MP3'] ?>" type="audio/mpeg">
          </audio>
          <script type="text/javascript">
            function myAudio(event){
              if(event.currentTime >60){
                event.currentTime=0;
                event.pause();
                alert ("Payment to listen to the full song!")
              }
            }
          </script>
        <br>
        <br>
        <div style="border-bottom: 1px solid black"></div>
        <br>
        <p style="width: 32%;float: right">
          Lyrics:
        </p>
        </div>
        <div class="col-6">
          <img src="img/<?php echo $row['Image']?>" style="width: 600px;height: 500px" >
	 <div class="row justify-content-center">  
		  
		 <form method="POST" action="Manage_shopping_cart.php"> 
            <input type="number" name="sl" value="1" min="1" max="1" style="display: none;"> 
          <input type="hidden" name="id" value="<?=$id?>">
          <button type="submit" name="button-buy" class="button-buy"><i class="fas fa-cart-plus"></i>  Add to cart</button>
          </form>
	 </div>
			
        </div>
	 	<div class="col-4">
			<div><?php echo nl2br($row["Lyrics"]); ?></div>
        </div>
	 
        <?php
    	}
    	?>
	 </div>
	      
     </div>
</body>
</html>