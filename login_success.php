<?php
$title = 'login_success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $crud->find_user($username, $password);

    if ($user) {
        session_start();

        $_SESSION["loggedin"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        if($user['is_admin'] == true) {
            $_SESSION["isadmin"] = true;
        } else {
            $_SESSION["isadmin"] = false;
        }

        echo 'you have been logged in';
    } else {
        echo 'there was some error';
    }
} else {
    echo 'submit not set :(';
}

?>


<?php require_once 'includes/footer.php'; ?>