<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
            /* background: #222; */
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
        #about {
    padding: 20px;
    background-color: #f5f5f5;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

#about h2 {
    color: #333;
    font-size: 24px;
    margin-bottom: 10px;
}

#about p {
    color: #555;
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 10px;
}

    </style>
<header>
        <div class="logo"><h1>Math Minds</h1></div>
        <nav>
            <ul>
                <li><a href="about.html" class="cta about-us-btn">About Us</a></li>
                <li><a href="signin.php" class="cta sign-in-btn">Sign In</a></li>
                <li><a href="signup.php" class="cta">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <div id="about">
    <h2>About Us</h2>
    <p></p>
    <p>Welcome to our website! We're a team of researchers who want to make learning math super fun and exciting for you! We're creating a special game just for sixth-grade students like you, to help you become math masters!</p>

    <p>Our game is designed to help you get better and better at math, without feeling stressed or worried about time running out. We want you to feel confident and happy when you're solving math problems, and to have lots of chances to practice and improve your skills. By playing our game, you'll become a math whiz in no time!</p>

    <p>We believe that math can be cool and fun, and we want to help you see it that way too! Our game is all about making math enjoyable and easy to understand, so you can focus on solving problems and getting better at math. We're excited to share our game with you and help you unlock your math potential!</p>
</div>

</body>
</html>