<html>
    <head>
        <title>Welcome to Slotify</title>
    </head>
    <body>
        
        <div id = "inputContainer">
            <form id = "loginForm" action="register.php" method="POST">
                <h2>Login to Your Account</h2>
                <p>
                    <label for = "loginUserName">UserName</label>
                    <input id = "loginUserName" name = "loginUserName" type = "text" placeholder = "Enter login" required>
                </p>
                <p>
                    <label for = "loginPassword">Password</label>
                    <input id = "loginPassword" name = "loginPassword" type = "password" required>
                </p>
                <button type = "submit" name = "loginButton"> LOG IN</button>
            </form>

            <form id = "registerForm" action="register.php" method="POST">
                <h2>Create your free Account</h2>
                <p>
                    <label for = "userName">UserName</label>
                    <input id = "userName" name = "userName" type = "text" placeholder = "Enter login" required>
                </p>

                <p>
                    <label for = "firstName">First Name</label>
                    <input id = "firstName" name = "firstName" type = "text" placeholder = "e.g Pawel" required>
                </p>

                <p>
                    <label for = "lastName">UserName</label>
                    <input id = "lastName" name = "lastName" type = "text" placeholder = "e.g Zarzycki" required>
                </p>

                <p>
                    <label for = "email">Email</label>
                    <input id = "email" name = "email" type = "email" placeholder = "e.g pawel.zarzycki@op.pl" required>
                </p>

                <p>
                    <label for = "email2">Confirm email</label>
                    <input id = "email2" name = "email2" type = "email" placeholder = "e.g pawel.zarzycki@op.pl" required>
                </p>
                <p>
                    <label for = "password">Password</label>
                    <input id = "password" name = "password" type = "password" required>
                </p>

                <p>
                    <label for = "password2">Confirm Password</label>
                    <input id = "password2" name = "password2" type = "password" required>
                </p>
                <button type = "submit" name = "registerButton">SIGN UP</button>
            </form>
        </div>

    </body>
</html>