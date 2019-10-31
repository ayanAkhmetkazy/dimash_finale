
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md"></div>
			<div class="col-md-6">
				<div class="card">
  			<div class="card-header">
    			Register
  			</div>
  		<div class="card-body">
				<form action="adduser" method="post">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control"  name="email" placeholder="Email@example.kz">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="name" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Surname</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="surname" placeholder="Surname">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  name="password" placeholder="Password">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio"   value="Male" name="gender" checked>
          <label class="form-check-label" for="Male">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio"  name="gender" value="Female">
          <label class="form-check-label" for="Female">
            Female
          </label>
        </div>
        
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-2">Country</div>
    <div class="col-sm-10">
      
        <input class="form-control" type="text" name="country" placeholder="Country">
      
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">City</div>
    <div class="col-sm-10">
      
        <select class="form-control form-control-sm" name="city">
  <option value="Almaty"  >Almaty</option>
  <option value="Astana"  >Astana</option>
  <option value="Shymkent">Shymkent</option>
  <option value="Aktobe"  >Aktobe</option>
  <option value="Kostanai">Kostanai</option>
</select>
      
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </div>
</form>
			</div></div></div>
			<div class="col-md"></div>
		</div>
	</div>
</body>
</html>