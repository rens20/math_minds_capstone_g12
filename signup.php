<?php

require_once __DIR__ . '../config/configuration.php'; 
require_once __DIR__ . '../config/validation.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $last = $_POST['last'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = Register($email, $name, $last, $password, $username); 
    echo $message;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container">
                <div class="form">
                    <h2>Sign In</h2>
                    <form id="signInForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        <div class="inputBox">
                            <input type="text" name="name" placeholder="Firstname">
                        </div>
                        <div class="inputBox">
                            <input type="text" name="last" placeholder="Lastname">
                        </div>
                        <div class="inputBox">
                            <input type="text" name="username" placeholder="Username">
                        </div>
                        <div class="inputBox">
                            <input type="email" name="email" placeholder="Email">
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>
                        <p class="forget">Already have an account? <a href="signin.php">Sign up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
     <script>

        document.addEventListener('DOMContentLoaded', function() {
  
            const form = document.getElementById('signInForm');

    
            form.addEventListener('submit', function(event) {
      
                event.preventDefault();

                
                Swal.fire({
                    icon: 'success',
                    title: 'Signed In Successfully!',
                    text: 'Redirecting to sign-in page...',
                    showConfirmButton: false,
                    timer: 1500,
                    willClose: () => {
                   
                        form.submit();
                    }
                });
            });
        });
    </script>
</body>
</html>

    <style>
  body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
  }
  section {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(to bottom, #f1f4f9, #dff1ff);
    position: relative;
  }
  section .color {
    position: absolute;
    filter: blur(150px);
  }
  section .color:nth-child(1) {
    top: -350px;
    width: 600px;
    height: 600px;
    background: #451952;
  }
  section .color:nth-child(2) {
    bottom: -150px;
    left: 100px;
    width: 500px;
    height: 500px;
    background: #e8bcb9;
  }
  section .color:nth-child(3) {
    bottom: 50px;
    right: 100px;
    width: 300px;
    height: 300px;
    background: #ae445a;
  }
  .box {
    position: relative;
  }
  .box .square {
    position: absolute;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    animation: animate 10s linear infinite;
    animation-delay: calc(-1s * var(--i));
  }
  @keyframes animate {
    0%, 100% {
      transform: translateY(-40px);
    }
    50% {
      transform: translateY(40px);
    }
  }
  .box .square:nth-child(1) {
    top: -50px;
    right: -60px;
    width: 100px;
    height: 100px;
  }
  .box .square:nth-child(2) {
    top: 150px;
    left: -100px;
    width: 120px;
    height: 120px;
    z-index: 2;
  }
  .box .square:nth-child(3) {
    bottom: 50px;
    right: -60px;
    width: 80px;
    height: 80px;
    z-index: 2;
  }
  .box .square:nth-child(4) {
    bottom: -80px;
    right: 100px;
    width: 50px;
    height: 50px;
  }
  .box .square:nth-child(5) {
    top: -80px;
    left: 140px;
    width: 60px;
    height: 60px;
  }
  .container {
    position: relative;
    width: 400px;
    min-height: 400px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 45px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
  }
  .form {
    position: relative;
    width: 65%;
    height: 100%;
    padding: 40px;
  }
  .form h2 {
    position: relative;
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 40px;
  }
  .form h2::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 80px;
    height: 4px;
    background: #fff;
  }
  .form .inputBox {
    width: 100%;
    margin-top: 20px;
  }
  .form .inputBox input {
    width: 100%;
    background: rgba(255, 255, 255, 0.2);
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 35px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    border-right: 1px solid rgba(255, 255, 255, 0.2);
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    font-size: 16px;
    letter-spacing: 1px;
    color: #fff;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  }
  .form .inputBox input::placeholder {
    color: #fff;
  }
  .form .inputBox input[type="submit"] {
    background: #fff;
    color: #666;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
  }
  .forget {
    margin-top: 5px;
    color: #fff;
  }
  .forget a {
    color: #fff;
    font-weight: 600;
  }
</style>