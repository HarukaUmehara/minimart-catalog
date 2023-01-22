<!-- function login -->
<?php
   require 'connection.php';
   function login($username, $password){
      $conn = connection();
      $sql = "SELECT * FROM users WHERE username = '$username'";

      if($result = $conn->query($sql)){
         if($result->num_rows == 1){

            // Check if the username exists
            $user_row = $result->fetch_assoc();
            if(password_verify($password, $user_row['password'])){
               session_start();

               $_SESSION['user_id'] = $user_row['id'];
               $_SESSION['username'] = $user_row['username'];
               $_SESSION['full_name'] = $user_row['first_name'] . " " . $user_row['last_name'];

               header("location: products.php");
               exit;  
            }else{
               echo "<p class='text-danger'>Incorrect Password.</p>";
            }
         }else{
            echo "<p class='text-danger'>Username not found.</p>";
         }
      }else{
         die("Error with the query:" . $conn->error);
      }
   }  

   if(isset($_POST['btn_log_in'])){
      $username = $_POST['username'];
      $password = $_POST['password'];

      login($username, $password);
   }

?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="Description" content="Enter your description here" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Login</title>
</head>

<body class="bg-light">
   <div style="height: 100vh;">
      <div class="row h-100 m-0">
         <div class="card w-25 my-auto mx-auto px-0">
            <div class="card-header text-primary bg-white">
               <h1 class="card-title text-center mb-0">MiniMart Catalog</h1>
            </div>
            <div class="card-body">
               <form action="" method="post">
                  <label for="username" class="small">Username</label>
                  <input type="text" name="username" id="username" class="form-control mb-2" autofocus required>

                  <label for="password" class="small">Password</label>
                  <input type="password" name="password" id="password" class="form-control mb-5">

                  <button type="submit" name="btn_log_in" class="btn btn-primary w-100">Log in</button>
               </form>

               <div class="text-center mt-3">
                  <a href="sign-up.php" class="small">Create Account</a>
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