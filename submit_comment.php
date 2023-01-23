<?php
$title = 'add comment';
require_once 'includes/header.php';
require_once 'db/conn.php';

session_start();

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
    header("location: log_in.php");
}


$user_id = $_SESSION["id"];
$product_id = $_POST["product_id"];
$comment_text = $_POST['new-comment'];

$is_success = $crud->insert_comment($product_id, $user_id, $comment_text);

if ($is_success) {
    echo 'your comment have been added.';
} else {
    echo 'there was some error';
}


?>


<?php require_once 'includes/footer.php'; ?>