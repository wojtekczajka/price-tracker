<?php
$title = 'register success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $is_success = $crud->insert_user($username, $email, $password);

    if ($is_success) {
        echo '<script>alert("You have been registered.");window.location.href = "index.php";</script>';
    } else {
        echo '<script>alert("Your form is not correct. Please try again.");window.location.href = "sign_up.php";</script>';
    }
} else {
    echo '<script>alert("Some error on server side... :(.");window.location.href = "log_in.php";</script>';
}
?>

<?php require_once 'includes/footer.php'; ?>