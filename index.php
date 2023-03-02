<?php
    require_once 'config/connection.php';
    session_start();

    if(isset($_POST['signupBtn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM entity_information WHERE username = ? Limit 1";


        $stmt = $connection -> prepare($sql);
        $stmt -> bind_param('s',$username);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $user = $result -> fetch_assoc();


        if(hash('md5',$password) == $user['password'] and $user['userType'] == 1  ){
            header("location: homepage.php");
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['message'] = "You are now Logged in as an Admin!";
            

        }
        elseif(hash('md5',$password) == $user['password'] and $user['userType'] == 2  ){
            header('location: homepage.php');
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['message'] = "You are now Logged in as a Student!";
        }

        else{
            header('location: index.php');
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</head>
<body>
 <div class="container pt-5 mt-5" >
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Sign In </h5>
            <form>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label" for="rememberPasswordCheck">
                  Remember password
                </label>
              </div>
              <div class="d-grid">
           		 <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit" name = "signupBtn">Sign
                  in</button>
                  
              </div>
                <div class="d-flex justify-content-center p-2 text-secondary" >Not a member?
              <a href="register.html" class="nbtn btn-primary btn-login text-uppercase fw-bold">register</a>
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