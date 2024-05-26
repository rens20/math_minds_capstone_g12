<?php
session_start();

require_once __DIR__ . '../config/configuration.php';
require_once __DIR__ . '../config/validation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['Email']; 
    $password = $_POST['Password']; 

    // Validate login credentials
    $user = ValidateLogin($email, $password);

    if (empty($user)) {
        echo '<script>alert("Login failed!");</script>';
    } else {
        // Set session token based on user type
        switch ($user['type']) {
            case 'admin':
                $_SESSION['token'] = 'admin';
                header("Location: ./admin_easy.php?id=" . urlencode($user['id']));
                exit();
            case 'user':
                $_SESSION['token'] = 'user';
                $_SESSION['username'] = $user['name']; // Changed from $name to $user['name']
                header("Location: ./gamepage.php?id=" . urlencode($user['id']) . "&name=" . urlencode($user['name']));
                exit();
            default:
                echo "Invalid user type";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-zhxArI4BvUs5JjNlZ/62M1e5dZ8qjhFqGQAtufq5K0Et4IqGh+j5/8YXq5v5vL4w" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="signin.css" />
</head>
<body>
  <header class="border-box">
    <div class="logo">
    </div>
    <nav>
      <ul>
      </ul>
    </nav>
  </header>
  <div class="container">
    <h2>Sign In</h2>
    <form action="" method="post">
      <div class="form-group">
        <i class="fas fa-envelope"></i>
        <input type="email" name="Email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <i class="fas fa-lock"></i>
        <input type="password" name="Password" placeholder="Password" required />
      </div>
      <button type="submit" class="btn">Continue</button>
    </form>
    <p>Already have an account? <a href="signup.php" id="signin-link">Sign Up</a></p>
  </div>

</body>
</html>
