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
		<div class="box easy" onclick="showLoading('easy.php');">
			<div class="label">Easy</div>
		</div>
		<div class="box medium" onclick="showLoading('medium.php');">
			<div class="label">Medium</div>
		</div>
		<div class="box hard" onclick="showLoading('hard.php');">
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
			}, 5000); // Wait for 5 seconds before navigating
		}
	</script>
</body>
</html>