<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
	<style type="text/css" href="{{ asset('assets/css/new-css.css') }}"></style>
	<style type="text/css">
		/* ==========================Font========================== */

		@font-face {
			font-family: 'robotoregular';
			src: url(../fonts/roboto-regular-webfont.woff) format('woff');
			font-weight: normal;
			font-style: normal;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: "Poppins", "robotoregular", sans-serif;
		}

		body {
			min-height: 100vh;
			background: var(--bg-primary);
		}

		nav {
			position: fixed;
			width: 3%;
			height: 100%;
			background: var(--bg-secondary);
			transition: .5s;
			overflow: hidden;
		}

		nav.active {
			width: 12%;
		}



		nav ul {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
		}

		nav ul li {
			list-style: none;
			width: 100%;
			position: relative;

		}

		nav ul li a:hover {
			color: var(--bg-primary);
		}

		nav ul li:hover a::before {
			background-color: var(--bg-active);
			width: 100%;
		}

		nav ul li a {
			position: relative;
			display: block;
			width: 100%;
			display: flex;
			align-items: center;
			text-decoration: none;
			color: var(--cl-text);
			transition: .2s;
		}

		nav ul li a::before {
			content: "";
			position: absolute;
			top: 0;
			left: 0;
			width: 0;
			height: 100%;
			transition: .2s;
		}

		nav ul li a .icon {
			position: relative;
			display: block;
			min-width: 60px;
			height: 60px;
			line-height: 60px;
			text-align: center;
		}

		nav ul li a .title {
			position: relative;
			font-size: .85em;
		}

		nav ul li a .icon * {
			font-size: 1.1em;
		}

		nav ul li a.toggle {
			border-bottom: 3px solid var(--bg-primary);
		}

		.toggle {
			cursor: pointer;
		}

		header {
			display: none;
		}
		.main-section{
			width: 97%;
			position: absolute;
			left: 58px;
		}
		.mian{
			width: 88%;
			position: absolute;
			left: 230px;

		}
		@media (max-width: 768px) {
			header {
				display: flex;
				justify-content: space-around;
				align-items: center;
				height: 60px;
				background: var(--bg-secondary);
				color: var(--cl-text);
			}

			header a {
				color: var(--cl-text)
			}

			nav {
				left: -60px;
			}

			nav.active {
				left: 0;
				width: 100%;
			}

			nav ul li a.toggle {
				display: none;
			}
		}

		:root {
			--bg-primary: #41444b;
			--bg-secondary: #52575d;
			--bg-active: #fddb3a;
			--cl-text: #f6f4e6;
		}
</style>
<title></title>
</head>
<body>

	<header>
		<div class="toggle">
			<i class="fas fa-bars"></i>
		</div>
		<h3>Dashboard</h3>
		<a href="#">
			<i class="fas fa-sign-out-alt"></i>
		</a>
	</header>
	<nav>
		<ul>
			<li>
				<a class="toggle">
					<span class="icon"><i class="fas fa-bars"></i></span>
					<span class="title">Menu</span>
				</a>
			</li>
			<li>
				<a href="{{ url('/') }}">
					<span class="icon"><i class="fas fa-home"></i></span>
					<span class="title">Home</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fas fa-user"></i></span>
					<span class="title">Profile</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fas fa-envelope"></i></span>
					<span class="title">Messages</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fas fa-info"></i></span>
					<span class="title">Help</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fas fa-cog"></i></span>
					<span class="title">Setting</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fas fa-lock"></i></span>
					<span class="title">Password</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="icon"><i class="fas fa-sign-out-alt"></i></span>
					<span class="title">Sign Out</span>
				</a>
			</li>
		</ul>
	</nav>
	<div class="main-section">
		<h3>Hello</h3>
	</div>







	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
	<script type="text/javascript">
		var getSidebar = document.querySelector('nav');
		var getToggle = document.getElementsByClassName('toggle');
		for (var i = 0; i <= getToggle.length; i++) {
			getToggle[i].addEventListener('click', function () {
				getSidebar.classList.toggle('active');
				 $(".main-section").toggleClass();
			});
		}
	</script>
</body>
</html>