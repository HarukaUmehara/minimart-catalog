<!-- function createUser() -->
<?php
   require "connection.php";

   function createUsers($first_name, $last_name, $username, $password){

         $conn = connection();
         $password = password_hash($password, PASSWORD_DEFAULT); 
         $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `password`) VALUES ('$first_name', '$last_name', '$username', '$password')";

         if($conn->query($sql)){
            header("location: login.php");
            exit;
         }else{
            die("Error adding new user: " .$conn->error);
         }
   }

   if(isset($_POST['btn_sign_up'])){
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

         if($password == $confirm_password){
            createUsers($first_name, $last_name, $username, $password);
         }else{
            echo "<p class= 'text-danger'> Error password and comfirm password does not match </p>";
         }

      
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Sign Up</title>
</head>

<body class="bg-light">
   <div style="height: 100vh;">
      <div class="row h-100 m-0">
         <div class="card w-25 mx-auto my-auto p-0">
            <div class="card-header text-success">
               <h1 class="card-title h3 mb-0">Create your account</h1>
            </div>
            <div class="card-body">
               <form method="post">
                  <label for="first-name" class="small">First Name</label>
                  <input type="text" name="first_name" id="first-name" class="form-control mb-2" required autofocus>

                  <label for="last-name" class="small">Last Name</label>
                  <input type="text" name="last_name" id="last-name" class="form-control mb-2" required>

                  <label for="username" class="small font-weight-bold">Username</label>
                  <input type="text" name="username" id="username" class="form-control mb-2 fw-bold" maxlength="15" required>

                  <label for="password" class="small">Password</label>
                  <input type="password" name="password" id="password" class="form-control mb-2" required>

                  <label for="confirm-password" class="small">Confirm Password</label>
                  <input type="password" name="confirm_password" id="confirm-password" class="form-control mb-5">

                  <button type="submit" class="btn btn-success w-100" name="btn_sign_up">Sign up</button>
               </form>

               <div class="text-center mt-3">
                  <p class="small">Already have an account? <a href="login.php">Log in.</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>