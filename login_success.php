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
            $_SESSION['id'] = $user['user_id'];
            $_SESSION["username"] = $username;
            if($user['is_admin'] == true) {
                $_SESSION["isadmin"] = true;
            } else {
                $_SESSION["isadmin"] = false;
            }
            echo '<script>alert("You have been logged in.");window.location.href = "index.php";</script>';
        } else {
            echo '<script>alert("Your form is not correct. Please try again.");window.location.href = "log_in.php";</script>';
        }
    } else {
        echo '<script>alert("Some error on server side... :(.");window.location.href = "log_in.php";</script>';
    }
    require_once 'includes/footer.php'; 
