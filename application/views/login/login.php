<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<title>Login</title>
	<style type="text/css">
			@font-face {
		font-family: 'Source Sans Pro';
		font-style: normal;
		font-weight: 200;
		src: url(https://fonts.gstatic.com/s/sourcesanspro/v14/6xKydSBYKcSV-LCoeQqfX1RYOo3i94_wlxdr.ttf) format('truetype');
	}

	@font-face {
		font-family: 'Source Sans Pro';
		font-style: normal;
		font-weight: 300;
		src: url(https://fonts.gstatic.com/s/sourcesanspro/v14/6xKydSBYKcSV-LCoeQqfX1RYOo3ik4zwlxdr.ttf) format('truetype');
	}

	* {
		box-sizing: border-box;
		margin: 0;
		padding: 0;
		font-weight: 300;
	}

	body {
		font-family: 'Source Sans Pro', sans-serif;
		color: white;
		font-weight: 300;
	}

	body ::-webkit-input-placeholder {
		/* WebKit browsers */
		font-family: 'Source Sans Pro', sans-serif;
		color: white;
		font-weight: 300;
	}

	body :-moz-placeholder {
		/* Mozilla Firefox 4 to 18 */
		font-family: 'Source Sans Pro', sans-serif;
		color: white;
		opacity: 1;
		font-weight: 300;
	}

	body ::-moz-placeholder {
		/* Mozilla Firefox 19+ */
		font-family: 'Source Sans Pro', sans-serif;
		color: #ffffff;
		opacity: 1;
		font-weight: 300;
	}

	body :-ms-input-placeholder {
		/* Internet Explorer 10+ */
		font-family: 'Source Sans Pro', sans-serif;
		color: white;
		font-weight: 300;
	}

	.background {
		background: #51c9c8;
		background: linear-gradient(to bottom right, #51c9c8 0%, #54f0ae 100%);
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		overflow: hidden;
	}

	.background.form-success .container h1 {
		transform: translateY(85px);
	}

	.container {
		max-width: 500px;
		margin: 0 auto;
		margin-top: 100px;
		padding: 80px 0;
		height: 400px;
		text-align: center;
	}

	.container h1 {
		font-size: 40px;
		transition-duration: 1s;
		transition-timing-function: ease-in-put;
		font-weight: 200;
	}

	form {
		padding: 20px 0;
		position: relative;
		z-index: 2;
	}

	form input {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		outline: 0;
		border: 1px solid rgba(255, 255, 255, 0.4);
		background-color: rgba(255, 255, 255, 0.2);
		width: 280px;
		border-radius: 3px;
		padding: 10px 15px;
		margin: 0 auto 10px auto;
		display: block;
		text-align: center;
		font-size: 18px;
		color: white;
		transition-duration: 0.25s;
		font-weight: 300;
	}

	form input:hover {
		background-color: rgba(255, 255, 255, 0.4);
	}

	form input:focus {
		border: 3px solid rgba(255, 255, 255, 0.4);		
		width: 300px;
		color: #ffffff;
	}

	form button {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		outline: 0;
		background-color: #f7f7f7;
		border: 0;
		padding: 10px 15px;
		color: #54f0ae;
		border-radius: 3px;
		width: 280px;
		cursor: pointer;
		font-size: 18px;
		transition-duration: 0.25s;
	}

	form button:hover {
		background-color: #ffffff;
		padding: 10px;
		width: 300px;	
		font-size: 20px;	
	}

	.bg-bubbles {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 1;
	}

	.bg-bubbles li {
		position: absolute;
		list-style: none;
		display: block;
		width: 40px;
		height: 40px;
		background-color: rgba(255, 255, 255, 0.15);
		bottom: -170px;
		border-radius: 20px;
		-webkit-animation: square 25s infinite;
		animation: square 25s infinite;
		transition-timing-function: linear;
	}

	.bg-bubbles li:nth-child(1) {
		left: 10%;
	}

	.bg-bubbles li:nth-child(2) {
		left: 20%;
		width: 80px;
		height: 80px;
		-webkit-animation-delay: 1s;
		animation-delay: 2s;
		-webkit-animation-duration: 17s;
		animation-duration: 17s;
	}

	.bg-bubbles li:nth-child(3) {
		left: 25%;
		-webkit-animation-delay: 2s;
		animation-delay: 4s;
	}

	.bg-bubbles li:nth-child(4) {
		left: 40%;
		width: 50px;
		height: 50px;
		-webkit-animation-duration: 11s;
		animation-duration: 22s;
		background-color: rgba(255, 255, 255, 0.25);
	}

	.bg-bubbles li:nth-child(5) {
		left: 70%;
	}

	.bg-bubbles li:nth-child(6) {
		left: 80%;
		width: 120px;
		height: 120px;
		-webkit-animation-delay: 1s;
		animation-delay: 3s;
		background-color: rgba(255, 255, 255, 0.2);
	}

	.bg-bubbles li:nth-child(7) {
		left: 32%;
		width: 170px;
		height: 170px;
		-webkit-animation-delay: 3s;
		animation-delay: 7s;
	}

	.bg-bubbles li:nth-child(8) {
		left: 55%;
		width: 20px;
		height: 20px;
		-webkit-animation-delay: 7s;
		animation-delay: 15s;
		-webkit-animation-duration: 40s;
		animation-duration: 40s;
	}

	.bg-bubbles li:nth-child(9) {
		left: 25%;
		width: 10px;
		height: 10px;
		-webkit-animation-delay: 1s;
		animation-delay: 2s;
		-webkit-animation-duration: 40s;
		animation-duration: 40s;
		background-color: rgba(255, 255, 255, 0.3);
	}

	.bg-bubbles li:nth-child(10) {
		left: 90%;
		width: 170px;
		height: 170px;
		-webkit-animation-delay: 6s;
		animation-delay: 11s;
	}

	@-webkit-keyframes square {
		0% {
			transform: translateY(0);
		}
		100% {
			transform: translateY(-500px) rotate(200deg);
		}
	}
	@keyframes square {
		0% {
			transform: translateY(0);
		}
		100% {
			transform: translateY(-1000px) rotate(600deg);
		}
	}
	</style>
</head>

<body>

	<div class="background">
		<div class="container">
			<!-- <?php if($this->session->flashdata('log_err_msg') !="") { ?>
            <div class="alert alert-danger">
               <button class="close" data-close="alert"></button>
               <span><?php echo $this->session->flashdata('log_err_msg');?></span> 
            </div>
            <?php } ?> -->
            
			<!--<h1>Al Hammadi Hospital</h1>-->
			<h3>PCR Test Application</h3>

			<form action="<?php echo base_url(); ?>login/loginaction" method="post" class="form">
				<input type="text" name="username" id="username" placeholder="Username" required="required" autocomplete="off">
				<input type="password" name="password" id="password" placeholder="Password">
				<!-- <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">				 -->
				<button type="submit" id="login-button">Login</button>
			</form>

		</div>

		<ul class="bg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>

		<h3 style="position: absolute; bottom: 15px; left: 15px;">Powered by Qzolve IT Solution</h3>
	</div>

</body>
</html>