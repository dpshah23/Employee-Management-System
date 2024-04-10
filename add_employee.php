<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Employee | Employee Management System</title>
    <link rel="stylesheet" href="../login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
        include 'navbaradmin.php';
    ?>
    <div class="containe">
    <main class="form-signin w-100 m-auto">
<form action="" method="post" class="container">

  <h1 class="h3 mb-3 fw-normal">Create New Employee</h1>

  <div class="form-floating">
    <input type="text" class="form-control" id="floatingInput" placeholder="Employee Id" name="empid">
    <label for="floatingInput">Employee ID</label>
  </div>
  <div class="form-floating">
    <input type="email" class="form-control" id="floatingPassword" placeholder="Email" name="email">
    <label for="floatingPassword">Email</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
    <label for="floatingPassword">Password</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" placeholder="First Name" name="fname">
    <label for="floatingPassword">First Name</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" placeholder="Last Name" name="lname">
    <label for="floatingPassword">Last Name</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" placeholder="Gender" name="gender">
    <label for="floatingPassword">Gender</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" placeholder="Address" name="address">
    <label for="floatingPassword">Address</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" placeholder="Mobile" name="mobile">
    <label for="floatingPassword">Mobile</label>
  </div>
  <div class="form-floating">
    <input type="text" class="form-control" id="floatingPassword" placeholder="Start Date (DD/MM/YYYY)" name="sdate">
    <label for="floatingPassword">Start Date</label>
  </div>
  <div class="form-floating">
  <select class="form-select" name="option" aria-label="Default select example">
                        <option selected>Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                        
                    </select>
  </div>
  

  <div class="form-check text-start my-3">
    <input class="form-check-input" type="checkbox" value="remember-me"  id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
      Is Active?
    </label>
  </div>
  <button class="btn btn-success w-100 py-2" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-body-secondary">&copy; <?php echo date('Y');?></p>
</form>
</main>
    </div>
</body>
</html>