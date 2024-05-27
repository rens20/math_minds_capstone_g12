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
    function dontHateThePlaysHateTheGame(name) {
      const url = window.location.href;
      const nameRegex = name.replace(/[\[\]]/g, '\\$&');
      const regex = new RegExp('[?&]' + nameRegex + '(=([^&#]*)|&|#|$)');
      const results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    const userId = dontHateThePlaysHateTheGame('id');
    const userName = dontHateThePlaysHateTheGame('name');
    const playBtn = document.getElementById('play-button');
    playBtn.addEventListener('click', () => {
      window.location.href = `gamepage.php?id=${encodeURIComponent(userId)}&name=${encodeURIComponent(userName)}`;
    });
  </script>
</body>
</html>
