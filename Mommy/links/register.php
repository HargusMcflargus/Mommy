<?php
    session_start();
?>

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

        div {
            margin: 20px 0 0 20px;
        }

        label {
            display: inline-block;
            width: 150px;
            text-align: left;
            margin: 0 0 0 10px;
        }

        #main-holder {
            height: auto;
            width: 28%;
            background-color: white;
            border-radius: 7px;
            box-shadow: 0px 0px 5px 2px black;
        }

        #register-header{
            margin: 1.5em 0 0 1.5em;
        }

        #submit-next-page {
            width: 20%;
            padding: 7px;
            border-radius: 3px;
            float: right;
            justify-content: flex-end;
            color: white;
            font-weight: bold;
            background-color: #3a3a3a;
            cursor: pointer;
            outline: none;
            margin: 2em 2em 1em;
        }
        </style>
    </head>

    <body>
        <main id="main-holder">
            <p id="register-header"><b>Register</b></p>

            <form id="registrationForm" action="register_2.php" method="post">
                <div>
                    <label>Username</label>
                    <input name="registration_username" type="text" />
                </div>
                <div>
                    <label>Password</label>
                    <input name="registration_password" id="pass1" type="password" />
                </div>
                <div>
                    <label>Repeat Password </label>
                    <input id="pass2" type="password" />
                </div>
            
            </form>

            <input onclick="validate()" type="submit" value="Next" id="submit-next-page">
        </main>
        
    </body>

</html>

<script>
	function validate(){
		let pass1 = document.getElementById("pass1").value;
		let pass2 = document.getElementById("pass2").value;
		if (pass1 == pass2){
            document.getElementById("registrationForm").submit();
		}
	}
</script>