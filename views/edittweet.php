<?php
    $tweet=$_REQUEST['SELECTED'];                             
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
			<div class="col-md">
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
    <form><input type="submit" class="nav-link " style="border: none;background-color: lightblue; color:red;" value="Logout"></form>
  </li>
		</ul>
	</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md"></div>
			<div class="col-md-4">
				<?php
        
            if($tweet!=null){
            	echo "<form class=\"ml-3 mt-3\" style=\"width: 18rem;\" action=\"updatetweet?id=".$_GET['id']."\" method=\"post\">
	  				<div class=\"form-group\">
	    				<label><h5>Edit your Tweet</h5></label>
	    				<textarea class=\"form-control\" name=\"tweet\" style=\"height: 18rem;\"> ". $tweet->tweet."</textarea>
	  				</div>
	  				
	  				<button type=\"submit\" class=\"btn btn-primary\">Edit</button>
				</form>"; 
            }
                                
    ?>



			</div>
			<div class="col-md"></div>


</body>
</html>



