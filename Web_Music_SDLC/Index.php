<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript">
            function myAudio(event){
              if(event.currentTime >60){
                event.currentTime=0;
                event.pause();
                alert ("Payment to listen to the full song!")
              }
            }
          </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.col-lg-3{
			background-color: aqua;
			border: 1px solid black;
		}
		
	</style>
<body>
	<?php
	session_start();
	?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Home</a>
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
          <a class="dropdown-item" href="./admin/Genrelist.php">Genre</a>
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
		<div class="row">
			
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./Img/son.jpg" class="d-block w-100" alt="" style="height: 500px">
    </div>
    <div class="carousel-item">
      <img src="./Img/j97.jpg" class="d-block w-100" alt="..." style="height: 500px">
    </div>
    <div class="carousel-item">
      <img src="./Img/quan.jpg" class="d-block w-100" alt="..." style="height: 500px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
			</div>
		</div>
</div>
			</div>
		</div>
	</div>
<div class="row row-cols-1 row-cols-md-3">
	<?php
	
		  $conn = mysqli_connect('localhost','root','','web_musics_sdlc');
		  $result=mysqli_query($conn,"Select * from song");
	while($row=mysqli_fetch_array($result)){
		$id=$row ['SongID'];
		$Mp3=$row['MP3'];
	$img=$row['Image'];
		$title=$row['SongName'];
		$NameSinger=$row['NameSinger'];
			echo("<div class='col mb-4'>
			<a href='Song _details.php?id=$id' style='text-decoration: none; 
        text-align: center;'>
    <div class='card'>
      <img src='./Img/$img' class='card-img-top'>
      <div class='card-body'>
        <h5 class='card-title'>$title</h5>
        <p class='card-text'>$NameSinger</p>
		  <audio controls controlsList='nodownload' ontimeupdate='myAudio(this)' src='./song/$Mp3'></audio>
      </div>
    </div>
	</a>
  </div>");
	}
		  
		  ?>

</div>
</body>
</html>