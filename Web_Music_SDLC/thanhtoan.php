<!DOCTYPE html>
<html lang="en">
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="Index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
      </li>
     
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

    </ul>
    <form class="form-inline my-2 my-lg-0" method="get" action="Search_song.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="inputsearch" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
    </form>
  </div>
      </nav>
	<?php 
 session_start();
 $conn = mysqli_connect('localhost','root','','web_musics_sdlc');
 ?>
 <h3 style="text-align: center;">Congratulations on your payment and you can now download it</h3>
 <?php 
    if($_SERVER['REQUEST_METHOD']=='POST'){
  $total=$_POST['total'];
  $date=$_POST['date'];
  $usn=$_POST['name'];
  $bank=$_POST['bank'];
  $sql="INSERT INTO orders(Total,OderDate,UsernameC,Bank) VALUES ('$total','$date','$usn','$bank')";
if(mysqli_query($conn,$sql)){
  echo "thanh toan thanh cong";
}
else{
  echo "Error: ".mysqli_errno($conn);
}
}
 ?>
 <?php
 if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id =$_POST['OrderID'];
  if (empty($_SESSION['cart'][$id])) {
    $q=mysqli_query($conn,"SELECT * FROM song WHERE SongID = {$id}");
    $product = mysqli_fetch_assoc($q);
      header("location:thanhtoan.php");
  }
 }
 ?>
 <div class="container-fluid">
 <div class="row">
  <link rel="stylesheet" type="text/css" href="cart.css">
  <?php 
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) :
    ?>
    <div class="products" style="border: 2px solid black">
    <a href="single.php?id=<?php echo $item['SongID']?>" style="text-decoration: none;">
    <div><img style="width: 310px" src="Img/<?php echo $item['Image']?>" class="img-cart"></div>
    <h2><?php echo $item['SongName'] ?></h2>
        <audio controls controlsList="autodownload">
          <source src="song/<?php echo $item['MP3'] ?>" type="audio/mpeg">
          </audio>
         </a>
         <br>
         <h4>Click on icon <i class="fas fa-ellipsis-v"></i> to download</h4>
         </div>
           <?php
  endforeach;
  }
     ?>
  </div>  
</body>
</html>