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
<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.col-lg-3{
			background-color: aqua;
			border: 1px solid black;
		}
		
	</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./Index.php">Home</a>
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
	<?php 
session_start();
$conn = mysqli_connect('localhost','root','','web_musics_sdlc');
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $id =$_POST['id'];
  if (empty($_SESSION['cart'][$id])) {
    $q=mysqli_query($conn,"SELECT * FROM song WHERE SongID = {$id}");
    $product = mysqli_fetch_assoc($q);
    $_SESSION['cart'][$id]=$product;
  $_SESSION['cart'][$id]['sl']=$_POST['sl'];
  }
  
 }
 ?>
 <div class="container-fluid">
 <div class="row">
 	<link rel="stylesheet" type="text/css" href="cart.css">
 	<h3 class="giohang"><i class="fas fa-shopping-cart"></i> Cart</h3>
  <br>
  <br>
 	<?php 
 	if (!empty($_SESSION['cart'])) {
 		foreach ($_SESSION['cart'] as $item) :
 		?>
 		<div class="products" style="border: 2px solid black">
 	 	<a href="single.php?id=<?php echo $item['SongID']?>" style="text-decoration: none;">
 	 	<div><img style="width: 310px" src="Img/<?php echo $item['Image']?>" class="img-cart"></div>
 	 	<h2><?php echo $item['SongName'] ?></h2>
        <p style="color: red">Price: <?php echo $item['Price']." $"; ?></p>
        <?php
		echo "<a href='delcart.php?productid=$item[SongID]' style='text-decoration: none;'>Delete</a>";
		?>
         </a>
         </div>
         	 <?php
 	endforeach;
 	}
 	else 
 		echo "There are no products in the product";
 	?>
 	<br>
   <a href="delcart.php?productid=0" style="text-decoration: none; color: white"><button type="button" class="btn btn-danger">Delete All</button></a>
 	<div id="total" class="clearfix">
 		 <?php
 		 $tong = 0;
 		  foreach ($_SESSION['cart'] as $item ) :
 		 	$tong += $item['sl'] * $item['Price'];
 		 endforeach;
 		 ?>
 	</div>	
  <div class="container" style="border-top:3px solid #38D276;margin-top: 20px">
 	<div class="col-md-6" style="border: 1px solid #38D276">
<h3 style="text-align: center;">Payment</h3>
 	<form method="POST" action="thanhtoan.php" class="was-validated">
 		<div class="form-group">
  		<label for="usr">UserName:</label>
  		<input type="text" class="form-control" id="user" name="name" value="<?php echo $_SESSION['Username'];  ?>" readonly>
		</div>
    <label for="bank">Select payment bank</label>
  <select class="custom-select" required id="bank" name="bank">
    <option selected></option>
    <option value="Vietcombank">Vietcombank</option>
    <option value="Techcombank">Techcombank</option>
    <option value="Airpay">Airpay</option>
    <option value="momo">momo</option>
  </select>
<div class="form-group">
  <div class="form-group">
  <label for="usr">Order date:</label>
  <input type="text" class="form-control" id="usr" name="date" value="<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
echo "". date("Y.m.d h:i:sa");
?>" readonly>
</div>
<div class="form-group">
  <label for="usr">Total</label>
  <input type="text" class="form-control" id="usr" value=" <?php echo number_format($tong) ." $" ?>" readonly name="total">
</div>
<input type="submit" class="btn btn-success" value="Pay">

 	</form>
 	</div>
 </div>
 </div>
 </div>

  
</body>
</html>