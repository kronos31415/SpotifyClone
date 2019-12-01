<?php
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");
    
    $account = new Account($con);

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    function getInputValue($input) {
        if(isset($_POST[$input])) {
            echo $_POST[$input];
        }
    }
?>

<html>

<head>

    <title>Welcome to Slotify</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>
    <?php
        if(isset($_POST['registerButton'])) {
           echo '<script>
                    $(document).ready(function() {
                        $("#loginForm").hide();
                        $("#registerForm").show();
                    });
                </script>';
        } else {
            echo '<script>
                    $(document).ready(function() {
                        $("#loginForm").show();
                        $("#registerForm").hide();
                    });
                </script>';
        }
    ?>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to Your Account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUserName">UserName</label>
                        <input id="loginUserName" name="loginUserName" type="text" placeholder="Enter login" value = "<?php getInputValue('loginUserName') ?>"required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Enter Your password" required>
                    </p>
                    <button type="submit" name="loginButton"> LOG IN</button>

                    <div class="hasAccountText">
                        <span id = "hideLogin">Dont't have account yet? Signup here</span>
                    </div>

                </form>

                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free Account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$userNameCharacters); ?>
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="userName">UserName</label>
                        <input id="userName" name="userName" type="text" placeholder="Enter login"
                            value="<?php getInputValue('userName') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstName">First Name</label>
                        <input id="firstName" name="firstName" type="text" placeholder="e.g Pawel"
                            value="<?php getInputValue('firstName') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastName">Last Name</label>
                        <input id="lastName" name="lastName" type="text" placeholder="e.g Zarzycki"
                            value="<?php getInputValue('lastName') ?>" required>
                    </p>

                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" placeholder="e.g pawel.zarzycki@op.pl"
                            value="<?php getInputValue('email') ?>" required>
                    </p>

                    <p>
                        <label for="email2">Confirm email</label>
                        <input id="email2" name="email2" type="email" placeholder="e.g pawel.zarzycki@op.pl"
                            value="<?php getInputValue('email2') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
                        <?php echo $account->getError(Constants::$passwordsDoNotMAtch); ?>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" placeholder="Enter Your password" required>
                    </p>

                    <p>
                        <label for="password2">Confirm Password</label>
                        <input id="password2" name="password2" type="password" placeholder="Enter Your password" required>
                    </p>
                    <button type="submit" name="registerButton">SIGN UP</button>

                    <div class="hasAccountText">
                        <span id = "hideRegister">Already have an account? Login here.</span>
                    </div>

                </form>
            </div>

            <div id="loginText">
                <h1>
                    Get Great Music
                </h1>
                <h2>
                    Listen to loads of songs for free
                </h2>
                <ul>
                    <li>Odkrywaj muzyke ktora kochasz</li>
                    <li>Tworz swoja playliste</li>
                    <li>Podazaj za swiatowymi tredami</li>
                </ul>
            </div>

        </div>
    </div>
</body>

</html>