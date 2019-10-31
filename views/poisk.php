<?php
   $foundList = $_REQUEST['FOUND_LIST'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row" style="background-color: lightblue;">
			<div class="col-md"><a class="navbar-brand m-3" href="#">Twitter</a></div>
			<div class="col-md">		
			</div>
			<div class="col-md-5">
				<ul class="nav justify-content m-3">
			<li class="nav-item">
    <a class="nav-link text-muted" href="page.php">Tweets</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-muted" href="profile.php">Profile</a>
  </li>
  <li class="nav-item">
    <form style="margin: 0.5em 0 0 0;" action="search" method="get"> <input type="text" name="search" placeholder="Search.." ><button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> </button> </form>
  </li>
  <li class="nav-item">
    <a class="nav-link " style=" color:red;" href="login.php">Logout</a>
  </li>
		</ul>
	</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md"></div>
			<div class="col-md-6">
				<p class="m-2"><h3>Results:</h3></p>


	<?php
if($foundList!=null){
            foreach($foundList as $user){
  ?>
  		<div class="card m-3">
	        	<h5 class="card-header"><a href="else?id=<?php echo $user->id;?>"><?php echo $user->email ?></a></h5>
  				<div class="card-body">
    				
    				<p class="card-text">Name: <b><?php echo $user->u_name; ?></b></p>
    				<p class="card-text">Surname: <b><?php echo $user->u_surname; ?></b></p>
  				</div>
			</div>
	        <?php }
	    }
	?>



			</div>
			<div class="col-md"></div>
		</div>
	</div>
</body>
</html>