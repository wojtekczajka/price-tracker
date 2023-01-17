<?php
$title = 'add comment';
require_once 'includes/header.php';
require_once 'db/conn.php';


if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $comment_text = $_POST['new-comment'];

    $is_success = $crud->add_comment($product_id, $user_id, $comment_text);

    if ($is_success) {
        echo 'your comment have been added.';
    } else {
        echo 'there was some error';
    }
} else {
    echo 'submit not set :(';
}


?>


<?php require_once 'includes/footer.php'; ?>