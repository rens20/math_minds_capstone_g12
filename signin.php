
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
    <form action="playbutton.php" method="post" action="signup.php">
      <div class="form-group">
        <i class="fas fa-envelope"></i>
        <input type="Email" name="Email" placeholder="Email" required />
      </div>
      <div class="form-group">
        <i class="fas fa-lock"></i>
        <input type="Password" name="Password" placeholder="Password" required />
      </div>
      <button type="submit" class="btn">Continue</button>
    </form>
    <p>Already have an account? <a href="signup.php" id="signin-link">Sign Up</a></p>
  </div>
  <script>

const signinBtn = document.getElementById('signin-btn');

signinBtn.addEventListener('click', () => {
  const container = signinBtn.parentNode.parentNode;
  const formGroups = container.querySelectorAll('.form-group');
  formGroups.forEach((formGroup) => {
    if (formGroup.firstElementChild.name === 'username') {
      formGroup.classList.add('shrink');
    } else {
      formGroup.classList.remove('shrink');
      formGroup.classList.add('grow');
    }
  });
  container.classList.add('shrink');
  setTimeout(() => {
    window.location.href = 'signin.php'; /* redirect to sign in page */
  }, 500); /* wait for 500ms for the transition effect */
});

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


