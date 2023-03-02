<?php
    require_once 'config/connection.php';


    if(isset($_POST['signupBtn'])){
      
        $fanme = $_POST['username'];
        $lname = $_POST['password'];

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sectionName = $_POST['sectionName'];
        $contactNumber = $_POST['contactNumber'];
      
        $password = hash('md5',$password);
        $insertQuery = "INSERT INTO entity_information VALUES (?,?,?,?,?,?,2)";

        $stmt = $connection -> prepare($insertQuery);
        $stmt -> bind_param('ssssssi',$fname, $lname, $username,$password,$sectionName, $contactNumber);

        if($stmt -> execute()){
            header('location: index.php');

        }

        else{
            $errors['db_error'] = "Database error: failed to register";
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</head>
<body>
 <div class="container">
    <div class="row">
      <div class="col-xxl-9 col-md-7 col-md-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-2 p-sm-5">
            <h1 class="card-title text-center mb-3 fw-light fs-2">Sign up </h1>
            <form>
			   <div class="row">
			<div class="form-group p-2 col-sm-6">
				<label for="fnFormControl">First Name</label>
				<input type="text" class="form-control" name = "fname" placeholder="ex: Joshua">
			</div>
			<div class="form-group p-2 col-sm-6">
				<label for="lnFormControl">Last Name</label>
				<input type="text" class="form-control" name = "lname" placeholder="ex: Garcia">
				</div>
				<form>
			<div class="form-row">
				<div class="form-group p-1 col-sm-6">
				<label for="unFormControl">Username</label>
				<input type="text" class="form-control" name = "username" placeholder="joshuagarcia@example.com">
			</div>
			<div class="form-group p-1 col-sm-6">
				<label for="pwFormControl">Password</label>
				<input type="password" class="form-control" name = "password" placeholder="we'll never tell anyone, don't worry.">
			</div>
			</div>
			<div class="form-group p-2 col-md-6">
				<label for="snFormControl">Section Name</label>
				<input type="text" class="form-control" name = "sectionName" placeholder="ex: BSIT211B">
			</div>
			<div class="form-group p-2 col-md-6">
				<label for="cnFormControl">Contact Number</label>
				<input type="text" class="form-control" id="contactNumber" placeholder="+63">
			</div>
			</div>
            <div class="d-grid p-4">
           		<button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Register</button>
            </div>
                <div class="d-flex justify-content-center p-1 text-secondary" >Already have an account?
              <a href="register.html" class="nbtn btn-primary btn-login text-uppercase fw-bold">Log in</a>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>