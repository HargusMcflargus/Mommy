<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<style type="text/css">
		  	html {
			  	height: 100%;
			}
			body {
				height: 100%;
				margin: 0;
				font-family: Arial, Helvetica, sans-serif;
				display: grid;
				justify-items: center;
				align-items: center;
				background-color: #3a3a3a;
			}
			#main-holder {
                padding: 1em 3em;
				display: grid;
				justify-items: center;
				align-items: center;
				background-color: white;
				border-radius: 7px;
				box-shadow: 0 0 0.1em 0.1em black;
			}
			#login-form {
				align-self: flex-start;
				display: grid;
				justify-items: center;
				align-items: center;
			}
			.login-form-field::placeholder {
				color: #3a3a3a;
			}
			.login-form-field {
				border: none;
				border-bottom: 1px solid #3a3a3a;
				margin-bottom: 10px;
				padding: 0.7em 3em;
                background-color: white;
                outline: none;
                font-size: 14px;
			}
			#login-form-submit {
                width: 60%;
				padding: 1em;
				border-radius: 5px;
				color: white;
				font-weight: bold;
				background-color: #3a3a3a;
				cursor: pointer;
			}
			#register-form-submit {
				padding: 1em;
                text-decoration: underline;
				cursor: pointer;
			}
		  </style>
	</head>

	<body>
		<main id="main-holder">
			<h1 id="login-header">Login</h1>
			<form action="links/login.php" method="POST" id="login-form">
				<input type="text" name="username" class="login-form-field" placeholder="Username"><br>
				<input type="password"  name="password" class="login-form-field" placeholder="Password"><br>
                <input type="submit" value="Login" id="login-form-submit">
			</form>
			<a href="links/register.php" id="register-form-submit">Need an Accout? Register Now</a>
		</main>
	</body>
</html>