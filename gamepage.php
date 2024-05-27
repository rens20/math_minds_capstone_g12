

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="gamepage.css">
	<style>
		.loading {
			position: fixed;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			width: 100px;
			height: 100px;
			border: 5px solid #ccc;
			border-top-color: #3498db;
			border-radius: 50%;
			animation: spin 1s linear infinite;
			z-index: 9999;
			display: none;
		}

		@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
		}

		.blur {
			filter: blur(5px);
			-webkit-filter: blur(5px);
			-moz-filter: blur(5px);
			-o-filter: blur(5px);
			-ms-filter: blur(5px);
		}
	</style>
</head>
<body>
	<div class="container">
	
		<?php

require_once __DIR__ . '../config/configuration.php'; 
require_once __DIR__ . '../config/validation.php';

?>
		<div class="box easy" id="easy" onclick="showLoading()" >
			<div class="label">Easy</div>
		</div>
		<div class="box medium" id="medium" onclick="showLoading()"> 
			<div class="label">Medium</div>
		</div>
		<div class="box hard" id="hard" onclick="showLoading()">
			<div class="label">Hard</div>
		</div>
	</div>
	<div class="loading"></div>
	<script>
		function showLoading(url) {
			const loading = document.querySelector('.loading');
			const body = document.querySelector('body');
			loading.style.display = 'block';
			body.classList.add('blur');
			setTimeout(() => {
				window.location.href = url;
			}, 5000);
		}

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

        const levels = ['easy', 'medium', 'hard'];

        levels.forEach(level => {
            const playBtn = document.getElementById(level);
            playBtn.addEventListener('click', () => {
                window.location.href = `${level}.php?id=${encodeURIComponent(userId)}&name=${encodeURIComponent(userName)}`;
            });
        });
	</script>
</body>
</html>
