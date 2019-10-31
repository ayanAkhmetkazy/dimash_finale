<?php
$info = $_REQUEST['INFO_ELSE'];
$sub = $_REQUEST['SUB'];
$posts = $_REQUEST['POSTS'];

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
    <a class="nav-link active" href="page.php">Tweets</a>
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
				<p class="m-2"><h3>Info:</h3></p>
				<?php
			   	if($info!=null){ ?>
					        <div class="card m-3">
				  				<div class="card-body">
				    				<h5 class="card-title"><?php echo $info->email ?></h5>
				    				<p class="card-text"><b>Name: </b><?php echo $info->name; ?></p>
				    				<p class="card-text"><b>Surname: </b><?php echo $info->surname; ?></p>
				    				<p class="card-text"><b>Gender: </b><?php echo $info->gender; ?></p>
				    				<p class="card-text"><b>Country: </b><?php echo $info->country; ?></p>
				    				<p class="card-text"><b>City: </b><?php echo $info->city; ?></p>
					   	 			<?php
					   	 			
					   	 			if(empty($sub)){ ?>	
					   	 				<form action="toFollow" method="post">
					   	 					<input type="hidden" name="follow" value="<?php echo $_GET['id']; ?>">
					   	 					<button type="submit" class="btn btn-link">Follow</button>
					   	 				</form>
					   	 			<?php }else { ?>
					   	 				<form action="unfollow" method="post">
					   	 					<input type="hidden" name="unfollow" value="<?php echo $_GET['id']; ?>">
					   	 					<button type="submit" class="btn btn-link">Unfollow</button>
					   	 				</form>
					   	 			<?php } ?>
				  				</div>
							</div>
						<?php }
				    
				?>
				<p class="m-2"><h3>Posts:</h3></p>
				<?php
					
	        		if($posts!=null){
            foreach($posts as $tweet){
	        			if($tweet->active==1){ ?>
	        				<div class="card m-3" >
  								<div class="card-body">
    								<h5 class="card-text"><?php echo $tweet->tweet ?></h5>
    								<p class="card-text"><b>Posted: </b><?php echo $tweet->post_date; ?></p>
    								<p class="card-text"><b>Likes: </b><?php echo $tweet->like_count; ?></p>
  								</div>
							</div>
	        			<?php }
	        		}
	        	}
	    			?>

			</div>
			<div class="col-md"></div>
		</div>
	</div>

</body>
</html>