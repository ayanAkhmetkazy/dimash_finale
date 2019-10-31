<!DOCTYPE html>
<html>
<head>
	<title>Yo</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md"></div>
			<div class="col-md-4">
				<div class="card">
  			<div class="card-header">
    			Login
  			</div>
  		<div class="card-body">
				<form action="checkuser" method="post">
  <div class="form-group">
    <label >Email address</label>
    <input type="email" class="form-control"  placeholder="Enter email" name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password">
    <small  class="form-text"><a href="register.php"> Don't have an account? Register now!</a></small>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>
			</div></div></div>
			<div class="col-md"></div>
		</div>



	</div>

</body>
</html>