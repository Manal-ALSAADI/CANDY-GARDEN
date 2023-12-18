<?php include("db.php") ?>
<?php
$msg = "";
if (isset($_SESSION["userId"])) {
	header("Location: admin.php");
	exit();
} else if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	if ($password != "" && $email != "")
		$msg =	login($email, $password);
	else
		$msg = "please enter email and password!!";
}
?>

<!DOCTYPE html>
<html>
<header>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400|Lora');

		body {
			background: #361b28;
		}

		/* div box styling */
		.container {
			margin: auto;
			width: 650px;
			height: 550px;
			position: relative;
		}

		.welcome {
			background: #f6f6f6;
			width: 650px;
			height: 415px;
			position: absolute;
			top: 25%;
			border-radius: 5px;
			box-shadow: 5px 5px 5px rgba(0, 0, 0, .1);
		}

		.pinkbox {
			position: absolute;
			top: -10%;
			left: 5%;
			background: #eac7cc;
			width: 320px;
			height: 500px;
			border-radius: 5px;
			box-shadow: 2px 0 10px rgba(0, 0, 0, .1);
			transition: all 0.5s ease-in-out;
			z-index: 2;
		}

		.nodisplay {
			display: none;
			transition: all 0.5s ease;
		}

		.leftbox,
		.rightbox {
			position: absolute;
			width: 50%;
			transition: 1s all ease;
		}

		.leftbox {
			left: -2%;
		}

		.rightbox {
			right: -2%;
		}

		/* font & button styling */
		h1 {
			font-family: 'Open Sans', sans-serif;
			text-align: center;
			margin-top: 95px;
			text-transform: uppercase;
			color: #f6f6f6;
			font-size: 2em;
			letter-spacing: 8px;
		}

		.title {
			font-family: 'Lora', serif;
			color: #8e9aaf;
			font-size: 1.8em;
			line-height: 1.1em;
			letter-spacing: 3px;
			text-align: center;
			font-weight: 300;
			margin-top: 20%;
		}

		.desc {
			margin-top: -8px;
		}

		.account {
			margin-top: 45%;
			font-size: 10px;
		}

		p {
			font-family: 'Open Sans', sans-serif;
			font-size: 0.7em;
			letter-spacing: 2px;
			color: #8e9aaf;
			text-align: center;
		}

		span {
			color: #eac7cc;
		}

		.flower {
			position: absolute;
			width: 120px;
			height: 120px;
			top: 46%;
			left: 29%;
			opacity: 0.7;
		}

		.smaller {
			width: 90px;
			height: 100px;
			top: 48%;
			left: 38%;
			opacity: 0.9;
		}

		button {
			padding: 12px;
			font-family: 'Open Sans', sans-serif;
			text-transform: uppercase;
			letter-spacing: 3px;
			font-size: 11px;
			border-radius: 10px;
			margin: auto;
			outline: none;
			display: block;
		}

		button:hover {
			background: #eac7cc;
			color: #f6f6f6;
			transition: background-color 1s ease-out;
		}

		.button {
			margin-top: 3%;
			background: #f6f6f6;
			color: #ce7d88;
			border: solid 1px #eac7cc;
		}

		/* form styling */
		form {
			display: flex;
			align-items: center;
			flex-direction: column;
			padding-top: 7px;
		}

		.more-padding {
			padding-top: 35px;
		}

		.more-padding input {
			padding: 12px;
		}

		.more-padding .submit {
			margin-top: 45px;
		}

		.submit {
			margin-top: 25px;
			padding: 12px;
			border-color: #ce7d88;
		}

		.submit:hover {
			background: #cbc0d3;
			border-color: #bfb1c9;
		}

		input {
			background: #eac7cc;
			width: 65%;
			color: #ce7d88;
			border: none;
			border-bottom: 1px solid rgba(246, 246, 246, 0.5);
			padding: 9px;
			margin: 7px;
		}

		input::placeholder {
			color: rgba(246, 246, 246, 1);
			letter-spacing: 2px;
			font-size: 1.3em;
			font-weight: 100;
		}

		input:focus {
			color: #ce7d88;
			outline: none;
			border-bottom: 1.2px solid rgba(206, 125, 136, 0.7);
			font-size: 1em;
			transition: 0.8s all ease;
		}

		input:focus::placeholder {
			opacity: 0;
		}

		label {
			font-family: 'Open Sans', sans-serif;
			color: #ce7d88;
			font-size: 0.8em;
			letter-spacing: 1px;
		}

		.checkbox {
			display: inline;
			white-space: nowrap;
			position: relative;
			left: -62px;
			top: 5px;
		}

		input[type=checkbox] {
			width: 7px;
			background: #ce7d88;
		}

		.checkbox input[type="checkbox"]:checked+label {
			color: #ce7d88;
			transition: 0.5s all ease;
		}
	</style>
</header>

<body>
	<div class="container">
		<div class="welcome">
			<div class="pinkbox">
				<div class="signin">
					<h1>sign in</h1>
					<form method="post" class="more-padding" aria-autocomplete="off" autocomplete="off">
						<input type="email" name="email" autocomplete="off" placeholder="email">
						<input type="password" name="password" placeholder="password">
						<div class="checkbox">
							<input type="checkbox" id="remember" /><label for="remember">remember me</label>
						</div>

						<button type="submit" name="login" class="button submit">login</button>
						<?php echo $msg ?>
					</form>
				</div>
			</div>

			<div class="rightbox">
				<h2 class="title"><span>CANDY</span>&<br>GARDENS</h2>
				<p class="desc"> choose your favorite <span>dessert</span></p><br><br><br><br><br><br><br>
				<img class="flower" src="img/na.png" /><br><br><br><br><br>

			</div>
		</div>
	</div>

	</div>



</body>

</html>