<?php
   $user=$_REQUEST['INFO'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
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


	<form action="update" method="post">
	  
	    
    <?php
         if($user!=null){                           
    ?>
	 <p>Name</p>
	    <input type="text" class="form-control" name="name" value=<?php echo $user->name;?>>
	    <div class="form-group">
	    <p>Surname</p>
	    <input type="text" class="form-control" name="surname" value=<?php echo $user->surname; ?>>
	  </div>
	  <div class="form-group">
	    <p>Gender</p>
	    <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Male" name="gender" <?php if($user->gender == "Male") { echo "checked"; } ?>>
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" name="gender" value="Female" <?php if($user->gender == "Female") { echo "checked"; } ?>>
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
	  </div>
	  <div class="form-group">
	    <p>Country</p>
	    <input type="text" class="form-control" name="country" value=<?php echo $user->country; ?>>
	  </div>
	  <div class="form-group">
	    <label>City</label>
	    <select class="form-control form-control-sm" name="city">
  <option value="Almaty"   <?php if($user->city == ""){ echo "selected";} ?>>Almaty</option>
  <option value="Astana"   <?php if($user->city == ""){ echo "selected";} ?>>Astana</option>
  <option value="Shymkent" <?php if($user->city == ""){ echo "selected";} ?>>Shymkent</option>
  <option value="Aktobe"   <?php if($user->city == ""){ echo "selected";} ?>>Aktobe</option>
  <option value="Kostanai" <?php if($user->city == ""){ echo "selected";} ?>>Kostanai</option>
</select>
	  </div>
	  <button type="submit" class="btn btn-primary">Edit</button>
	</form>
			  
	  </div>

	  
	<?php 
        }
    ?>
<div class="col-md"></div>
</div>

</div>
</div>


</body>
</html>