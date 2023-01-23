<?php
$title = 'price-tracker';
require_once 'includes/header-main.php';
require_once 'db/conn.php';

$loggedin = false;
$isadmin = false;
$logout_button = '';
$your_product_button = '';
$admin_panel_button = '';
$login_button = '<a href="log_in.php">
                    <button class="login-button">    Login    </button>
                  </a>';
$signup_button = '<a href="sign_up.php">
                    <button class="signup-button">   Sign Up   </button>
                  </a>';
$products = $crud->get_all_products();

session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $loggedin = true;
    $login_button = '';
    $signup_button = '';
    $logout_button = '<a href="scripts/log_out.php">
                        <button class="login-button">   Log Out   </button>
                      </a>';
    $your_product_button = '<a href="scripts/log_out.php">
                                <button class="login-button">Your Products</button>
                              </a>';
    if ($_SESSION["isadmin"] == true) {
        $isadmin = true;
        $admin_panel_button = '<a href="scripts/log_out.php">
                                    <button class="login-button"> Admin Panel </button>
                              </a>';
    }
}

?>

<div class="top-section">
    <h1 class="header-title">PRICE TRACKER</h1>
    <h2 class="header-subtitle">A place where you can monitor popular product price changes over the years</h2>
    <div class="button-container">
        <?php echo $logout_button . $your_product_button . $admin_panel_button . $login_button . $signup_button; ?>
    </div>
</div>


<hr>

<?php
$products = $crud->get_all_products();
foreach ($products as $product) {
    $product_id = $product['product_id'];
    $product_name = $product['product_name'];
    $measurement_unit = $product['measurements_unit'];
    if(empty($measurement_unit)){
        $measurement_unit = 'N/A';
    }
    echo '
    <div class="product-box">
        <h2 class="product-name">' . $product_name . '</h2>
        <div class="plot-container">
            <div class="plot-placeholder"></div>
        </div>
        <div class="comments-container">
            <h3>User Comments:</h3>
            <div class="comments">
        
    ';
    $comments = $crud->get_comments_by_product_id($product_id);
    if (empty($comments)) {
        echo '<p class="placeholder">No comments yet.</p>';
} else {
foreach ($comments as $comment) {
    $comment_date = $comment['comment_date'];
    $username = $crud->get_username_by_user_id($comment['user_id']);
    echo '<p style="text-align:left;"><span class="small-font">Comment date: '.$comment_date.' <br> Comment owner: '.$username['username'].'</span></p> <p>' . $comment['comment_text'] . '</p><hr>';
}
}
echo '
</div>
</div>
<form action="submit_comment.php" method="post">
<input type="hidden" name="product_id" value="'.$product_id.'">
<textarea id="new-comment" name="new-comment" placeholder="add a comment"></textarea>
<div class="submit-container">
<button type="submit">Submit</button>
</div>
</form>
</div>
';
}
?>
<hr>
<img class="rocket" src="src/rocket_right.png">

<script>var loggedin = <?php echo json_encode($loggedin); ?>;</script>

<?php require_once 'includes/footer.php'; ?>


