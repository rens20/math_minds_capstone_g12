<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #222;
        }
        /* Box Pseudo-Elements */
        /* Header Styles */

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            background: transparent;
            z-index: 10000;
        }

    .logo {
            font-size: 15px;
            font-weight: bold;
            color: #fff;
            transition: color 0.3s ease;
            margin: 0 20px;
            text-align: center;
            font-family: sans-serif;
        }

    .logo:hover {
            color: #ddd;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }

        nav li {
            margin-right: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
            font-family: sans-serif;
        }

        nav a:hover {
            color: #ffeb3b;
        }

    .sign-in-btn,.cta {
            background-color: #fff;
            color: black;
            padding: 14px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
            margin: 10px;
            font-family: sans-serif;
        }

   .sign-in-btn:hover,.cta:hover {
            background-color: black;
            color: #fff;
            box-shadow: 0 0 10px #fff;
            transform: scale(1.05);
        }
        /* Play Button Styles */

   .image-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: none;
            border: none;
            font-size: 3rem;
            color: black;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
            box-shadow: 0 0 10px black;
            background-image: url('playbutton.png');
            background-size: cover;
            background-position: center;
            top: 30px;
            left: 0px;
        }

   .image-btn:hover {
            transform: scale(1.1);
            color: #662549;
            animation: pulse 0.5s ease-in-out;
        }

   .image-btn:hover.play-text {
            opacity: 1;
        }

        /* Add some animation to the play button */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1.1);
            }
        }

        /* Home Button Styles */
      .home-btn {
            padding: 14px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.2s ease-in-out;
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1;
            background: #662549;
            color: #fff;
            border: none;
            cursor: pointer;
        }

      .home-btn:hover {
            background-color:#fff;
            color: #662549;
            box-shadow: 0 0 10px #662549;
            transform: scale(1.05);
        }

        /* Media queries for responsiveness */
        @media only screen and (max-width: 1200px) {
       .logo {
                font-size: 12px;
            }
            nav a {
                font-size: 14px;
            }
        }
        @media only screen and (max-width: 992px) {
       .logo {
                font-size: 10px;
            }
            nav a {
                font-size: 12px;
            }
        }
        @media only screen and (max-width: 768px) {
       .logo {
                font-size: 8px;
            }
            nav a {
                font-size: 10px;
            }
        }
        @media only screen and (max-width: 576px) {
       .logo {
                font-size: 6px;
            }
            nav a {
                font-size: 8px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo"><h1>Math Minds</h1></div>
        <nav>
            <ul>
                <li><a href="about.php" class="cta about-us-btn">About Us</a></li>
                <li><a href="signin.php" class="cta sign-in-btn">Sign In</a></li>
                <li><a href="signup.php" class="cta">Sign Up</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <div class="container">
            <button class="image-btn" id="play-button">
                <span class="play-text"></span>
            </button>
        </div>
    </section>
    <script>
        function changeBG() {
            let r = Math.floor(Math.random() * 255);
            let g = Math.floor(Math.random() * 255);
            let b = Math.floor(Math.random() * 255);
            document.body.style.backgroundColor = "rgba(" + r + "," + g + "," + b + ")";
        }
        setInterval(changeBG, 1000);
    </script>
 <script>
    function showCustomPrompt(message, callback) {
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = '10000';

        const dialog = document.createElement('div');
        dialog.style.backgroundColor = '#fff';
        dialog.style.padding = '20px';
        dialog.style.borderRadius = '5px';
        dialog.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
        dialog.style.display = 'flex';
        dialog.style.flexDirection = 'column';
        dialog.style.alignItems = 'center';

        const text = document.createElement('p');
        text.style.fontSize = '20px';
        text.style.marginBottom = '20px';
        text.textContent = message;

        const buttons = document.createElement('div');
        buttons.style.display = 'flex';
        buttons.style.justifyContent = 'center';
        buttons.style.width = '100%';

        const yesButton = document.createElement('button');
        yesButton.style.backgroundColor = '#4CAF50';
        yesButton.style.color = '#fff';
        yesButton.style.padding = '10px 20px';
        yesButton.style.border = 'none';
        yesButton.style.borderRadius = '5px';
        yesButton.style.cursor = 'pointer';
        yesButton.textContent = 'Yes';
        yesButton.addEventListener('click', () => {
            overlay.remove();
            callback(true);
        });

        const noButton = document.createElement('button');
        noButton.style.backgroundColor = '#f44336';
        noButton.style.color = '#fff';
        noButton.style.padding = '10px 20px';
        noButton.style.border = 'none';
        noButton.style.borderRadius = '5px';
        noButton.style.cursor = 'pointer';
        noButton.textContent = 'No';
        noButton.addEventListener('click', () => {
            overlay.remove();
            callback(false);
        });

        buttons.appendChild(yesButton);
        buttons.appendChild(noButton);

        dialog.appendChild(text);
        dialog.appendChild(buttons);

        overlay.appendChild(dialog);

        document.body.appendChild(overlay);
    }

    function showCustomAlert(message) {
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = '0';
        overlay.style.left = '0';
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = '10000';

        const dialog = document.createElement('div');
        dialog.style.backgroundColor = '#fff';
        dialog.style.padding = '20px';
        dialog.style.borderRadius = '5px';
        dialog.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
        dialog.style.display = 'flex';
        dialog.style.flexDirection = 'column';
        dialog.style.alignItems = 'center';

        const text = document.createElement('p');
        text.style.fontSize = '20px';
        text.style.marginBottom = '20px';
        text.textContent = message;

        const okButton = document.createElement('button');
        okButton.style.backgroundColor = '#4CAF50';
        okButton.style.color = '#fff';
        okButton.style.padding = '10px 20px';
        okButton.style.border = 'none';
        okButton.style.borderRadius = '5px';
        okButton.style.cursor = 'pointer';
        okButton.textContent = 'OK';
        okButton.addEventListener('click', () => {
            overlay.remove();
        });

        dialog.appendChild(text);
        dialog.appendChild(okButton);

        overlay.appendChild(dialog);

        document.body.appendChild(overlay);
    }

    function dontHateThePlaysHateTheGame(name) {
        const url = window.location.href;
        const nameRegex = name.replace(/[\[\]]/g, '\\$&');
        const regex = new RegExp('[?&]' + nameRegex + '(=([^&#]*)|&|#|$)');
        const results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ''));
    }
    const userId = dontHateThePlaysHateTheGame('id');
    const userName = dontHateThePlaysHateTheGame('name');
    const playBtn = document.getElementById('play-button');
    playBtn.addEventListener('click', () => {
        if (!userId ||!userName) {
            showCustomPrompt('You need to create an account first. Are you sure you want to create an account now?', (result) => {
                if (result) {
                    window.location.href = './signup.php';
                } else {
                    showCustomAlert('No worries! You can create an account later. But for now, you won\'t be able to access the game page.');
                }
            });
        } else {
            window.location.href = `gamepage.php?id=${encodeURIComponent(userId)}&name=${encodeURIComponent(userName)}`;
        }
    });
</script>
</body>
</html>