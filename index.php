<!doctype html>
<html>
<head>
  <title>Moon Light Parallax Effects | Vanilla Javascript</title>
  <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
    <header>
      <div class="logo">
        </div>
      <nav>
        <ul>
          <li><a href="#about-us" class="cta about-us-btn">About Us</a></li>
          <li><a href="signin.php" class="cta">Sign In</a></li>
          <li><a href="signup.php" class="cta">Sign Up</a></li>
        </ul>
      </nav>
    </header>
    <main>
  <section>
    <h2 id="text">Math Minds</h2>
    <img src="bg.jpg" id="bg">
  </section>

  <div id="about">
    <h2>About Us</h2>
    <p></p>
    <p>Welcome to our website! We're a team of researchers who want to make learning math super fun and exciting for you! We're creating a special game just for sixth-grade students like you, to help you become math masters!</p>

<p>Our game is designed to help you get better and better at math, without feeling stressed or worried about time running out. We want you to feel confident and happy when you're solving math problems, and to have lots of chances to practice and improve your skills. By playing our game, you'll become a math whiz in no time!</p>

<p>We believe that math can be cool and fun, and we want to help you see it that way too! Our game is all about making math enjoyable and easy to understand, so you can focus on solving problems and getting better at math. We're excited to share our game with you and help you unlock your math potential!</p>
  </div>

  <script type="text/Javascript">
// Constants
const PARALLAX_SPEED_BG = 0.17;

// Get elements
let bg = document.getElementById("bg");
let text = document.getElementById("text");

// Add event listener
window.addEventListener('scroll', handleScroll);

// Function to handle scroll event
function handleScroll() {
  var value = window.scrollY;

  // Update styles using CSS classes
  bg.classList.add('bg-parallax');
  bg.style.top = `${value * PARALLAX_SPEED_BG}px`;

  text.classList.add('text-parallax');
  text.style.top = `${value * PARALLAX_SPEED_TEXT}px`;
}

// Function to scroll to About Us section
function scrollToAboutUs() {
  document.getElementById('about-us').scrollIntoView({ behavior: 'smooth' });
}

// Add event listener to About Us link
document.querySelector('a[href="#about-us"]').addEventListener('click', scrollToAboutUs);

// Function to scroll to About Us section
function scrollToAboutUs() {
  document.getElementById('about').scrollIntoView({ behavior: 'smooth' });
}

// Add event listener to About Us link
document.querySelector('a[href="#about-us"]').addEventListener('click', scrollToAboutUs);

  </script>
</body>
</html>