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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Search list</h3>
                <?php
                  $conn = mysqli_connect('localhost','root','','web_musics_sdlc');
                  if(isset($_GET['search'])){
                    echo "<script>alert('ok)</script>";
                    $index=$_GET['inputsearch'];
					  
                    $result=mysqli_query($conn,"Select * from song where SongName like '%$index%'");
                    $row=mysqli_fetch_array($result);
                    $Image=$row['Image'];
                    $name=$row['SongName'];
                    $ida=$row['SongID'];
                    echo "<div class='card border-success mb-3' style='max-width: 33%;'>
                    <div class='card-header bg-transparent border-success'>$name</div>
                    <div class='card-body text-success'>
                      <img src='./Img/$Image' alt='' style='height: 10rem;width:100%'>
                    </div>
                    <div class='card-footer bg-transparent border-success'>
                    <a class='btn btn-primary' href='Song _details.php?id=$ida'>Song Details</a>";
				  }
				?>
					<form method='POST' action='Manage_shopping_cart.php'> 
                    <input type='number' name='sl' value='1' min='1' max='1' style='display: none;'> 
       
          <input type='hidden' name='id' value='<?=$ida?>'>
                    <button type='submit' name='button-buy' class='button-buy'><i class='fas fa-cart-plus'></i>  Add to cart</button>
          </form>
                  </div>
                  </div>
                
           
				

            </div>
        </div>
    </div>
    

</body>
</html>