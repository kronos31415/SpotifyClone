<?php
if(isset($_POST['loginButton'])) {
    $userName = $_POST['loginUserName'];
    $password = $_POST['loginPassword'];
    // echo $userName;
    // echo $password;

    $result = $account->login($userName, $password);
    if($result == true) {
        $_SESSION['userLoggedIn'] = $userName;
        header("Location: index.php");
    }
}
?>