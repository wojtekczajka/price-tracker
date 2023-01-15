<?php
    $title = 'success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];  
    $email = $_POST['email'];
    $password = $_POST['password'];

    $is_success = $crud->insert_user($username, $email, $password);

    if ($is_success) {
        echo 'you have been registered';
    }
    else {
        echo 'there was some error';
    }
}
else {
    echo 'submit not set :(';
} 
?>

<?php require_once 'includes/footer.php'; ?>