<?php
   $tweetList = $_REQUEST['TWEET_LIST'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page</title>
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
				

				<form action="addtweet" method="post">
	  				<div class="form-group">
	    				<label><h5>Write new tweet</h5></label>
	    				<textarea class="form-control" name="tweet" style="height: 18rem;" placeholder="write tweet.."></textarea>
	  				</div>
	  				<button type="submit" class="btn btn-primary">Post</button>
				</form>
				
				
					 <?php
         if($tweetList!=null){
            foreach($tweetList as $tweet){
      
	        			if($tweet->active==1){ ?>
	        				<div class="card m-3 "  >
  								<div class="card-body">
    								<h5 class="card-text"><?php echo $tweet->tweet ?></h5>
    								<p><h6 class="card-text text-muted"><b>Posted: </b><?php echo $tweet->post_date; ?></h6></p>
    								<p><h6 class="card-text text-muted" style="margin: 0 0 0 3em;"><b>Likes: </b><?php echo $tweet->like_count; ?></h6></p>
    								<form action="deletetweet" method="post">
    									<input type="hidden" name="tweet_id" value=<?php echo $tweet->id ?>>
    									<a href="edittweet?id=<?php echo $tweet->id;?>" class="btn btn-link">Edit</a>
    									<button type="submit" class="btn btn-link">Delete</button>
    								</form>
  								</div>
							</div>
	        			<?php }
	        		}}
	    			?>

			</div>
			<div class="col-md"></div>

		</div>	
		
	</div>



</body>
</html>