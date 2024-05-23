<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Play Button</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-zhxArI4BvUs5JjNlZ/62M1e5dZ8qjhFqGQAtufq5K0Et4IqGh+j5/8YXq5v5vL4w" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="playbutton.css" />
</head>
<body>
  <header>
    <a class="btn home-btn" href="home.php">
      <i class="fas fa-home"></i> Home
    </a>
    <div class="container">
      <button class="image-btn" id="play-button">
        <span class="play-text"></span>
      </button>
    </div>
  </header>
  <script>
    const playBtn = document.getElementById('play-button');

    // Add an event listener to the play button
    playBtn.addEventListener('click', () => {
      // Redirect to the game page
      window.location.href = 'gamepage.php';
    });
  </script>
</body>
</html>