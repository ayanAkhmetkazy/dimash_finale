<?php
   $info = $_REQUEST['INFO'];
   $follows = $_REQUEST['FOLLOWS'];
   $follow = $_REQUEST['FOLLOW'];
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
    <a class="nav-link text-muted " href="page.php">Tweets</a>
  </li>
    <a class="nav-link  active" href="profile.php">Profile</a>
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
			<div class="col-md-4">
				<label class="m-2"><h3>Info:</h3></label>
				<?php
					
       if($info!=null){
            
            	?>
            
           
           	 	<div class="card">
           	 		<div class="card-header">Profile info</div>
           	 		<div class="card-body">
           	 		<p class="card-text">Name: <?php echo $info->name; ?></p>
    				<p class="card-text">Surname: <?php echo $info->surname; ?></p>
    				<p class="card-text">Gender: <?php echo $info->gender; ?></p>
    				<p class="card-text">Country: <?php echo $info->country; ?></p>
    				<p class="card-text">City: <?php echo $info->city; ?></p>
   	 				<a href="editprofile.php" class="card-link">Edit</a>
    				<a href="delete.php" class="card-link">Delete</a>
           	 		</div>
           	 	</div>
	<?php
            }
       
    ?>
    <p class="m-2"><h3>I follow:</h3></p>
    		<?php
		if($follows!=null){
            foreach($follows as $user){ ?>
		        <div class="card m-3">
		        	<h5 class="card-header"><a href="else.php?id=<?php echo $user->id;?>"><?php echo $user->email ?></a></h5>
	  				<div class="card-body">
	    				
	    				<p class="card-text"><b>Name: </b><?php echo $user->u_name; ?></p>
	    				<p class="card-text"><b>Surname: </b><?php echo $user->u_surname; ?></p>
	  				</div>
				</div>
		        <?php }
		    }?>



			<p class="m-2"><h3>My followers:</h3></p>
			<?php
		if($follow!=null){
            foreach($follow as $user){ ?>
		        <div class="card m-3">
		        	<h5 class="card-header"><a href="else.php?id=<?php echo $user->id;?>"><?php echo $user->email ?></a></h5>
	  				<div class="card-body">
	    				
	    				<p class="card-text"><b>Name: </b><?php echo $user->u_name; ?></p>
	    				<p class="card-text"><b>Surname: </b><?php echo $user->u_surname; ?></p>
	  				</div>
				</div>
		        <?php }
		    }?>


			</div>
			<div class="col-md"></div>

		</div>



	</div>
<br><br><br>
</body>
</html>