<?php
    $title = 'price-tracker';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
?>

<form class="signup-form" action="success.php" method="post">
    <h2 class="form-title">Sign up for price-tracker</h2>
    <div class="form-group">
        <input type="text" id="username" name="username" placeholder="Username" required>
    </div>
    <div class="form-group">
        <input type="email" id="email" name="email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <input type="password" id="password" name="password" placeholder="Password" required>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Submit">
    </div>
</form>

<?php require_once 'includes/footer.php'; ?>