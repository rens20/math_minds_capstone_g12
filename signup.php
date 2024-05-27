<?php

require_once __DIR__ . '../config/configuration.php'; 
require_once __DIR__ . '../config/validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $last = $_POST['last'];
    $username = $_POST['username'];


    $message = Register($email, $password, $name, $last,$username);
    echo $message;
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-zhxArI4BvUs5JjNlZ/62M1e5dZ8qjhFqGQAtufq5K0Et4IqGh+j5/8YXq5v5vL4w" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="signup.css" />
</head>
<body>
</head>
<body>
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
    <h2>Sign Up</h2>
    <form action="" method="POST">
        <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" name="name" placeholder="Firstname" required />
          </div>
          <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" name="last" placeholder="Lastname" required />
          </div>
          <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required />
          </div>
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <input type="Email" name="email" placeholder="Email" required />
          </div>
          <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="Password" name="password" placeholder="Password" required />
          </div>
          <button type="submit" class="btn">Sign up</button>
    </form>
    <p>Already have an account? <a href="signin.php" id="signin-link">Sign in</a></p>
  </div>
  <script>

// const signupBtn = document.getElementById('signup-btn');

// signupBtn.addEventListener('click', () => {
//   const container = signupBtn.parentNode.parentNode;
//   const formGroups = container.querySelectorAll('.form-group');
//   formGroups.forEach((formGroup) => {
//     if (formGroup.firstElementChild.name === 'email') {
//       formGroup.classList.add('shrink');
//     } else {
//       formGroup.classList.remove('shrink');
//       formGroup.classList.add('grow');
//     }
//   });
//   container.classList.add('shrink');
//   setTimeout(() => {
//     window.location.href ='signup.php'; /* redirect to sign up page */
//   }, 500); /* wait for 500ms for the transition effect */
// });

// add event listener to the container to remove the shrink effect when the transition is complete
document.addEventListener('DOMContentLoaded', () => {
  const containers = document.querySelectorAll('.container');
  containers.forEach((container) => {
    container.addEventListener('transitionend', () => {
      container.classList.remove('shrink');
      container.classList.add('show');
      const formGroups = container.querySelectorAll('.form-group');
      formGroups.forEach((formGroup) => {
        formGroup.classList.remove('shrink');
        formGroup.classList.add('grow');
      });
    });
  });
});

  </script>
</body>
</html>