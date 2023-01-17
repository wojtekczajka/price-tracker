<?php
$title = 'price-tracker';
require_once 'includes/header-main.php';
require_once 'db/conn.php';
?>


<div class="top-section">
    <h1 class="header-title">PRICE TRACKER</h1>
    <h2 class="header-subtitle">A place where you can monitor popular product price changes over the years</h2>
    <div class="button-container">

        <?php
        session_start();

        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<a href="scripts/log_out.php">
                    <button class="login-button">   Log Out   </button>
                  </a>
                  <a href="scripts/log_out.php">
                    <button class="login-button">Your Products</button>
                  </a>';
                  if ($_SESSION["isadmin"] == true) {
                echo '<a href="scripts/log_out.php">
                            <button class="login-button"> Admin Panel </button>
                      </a>';
                  }
        } else {
            echo '<a href="log_in.php">
                    <button class="login-button">    Login    </button>
                  </a>
                  <a href="sign_up.php">
                    <button class="signup-button">   Sign Up   </button>
                  </a>';
        }
        ?>

        <!-- <a href="log_in.php">
            <button class="login-button">Login</button>
        </a>
        <a href="sign_up.php">
            <button class="signup-button">Sign Up</button>
        </a> -->
    </div>
</div>


<hr>

<div class="product-box">
    <h2 class="product-name">product name</h2>
    <div class="plot-container">
        <div class="plot-placeholder"></div>
    </div>
    <div class="comments-container">
        <h3>User Comments:</h3>
        <div class="comments">
            <p class="placeholder">No comments yet.</p>
        </div>
        <form>
            <textarea id="new-comment" placeholder="add a comment"></textarea>
            <div class="submit-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>


<div class="product-box">
    <h2 class="product-name">product name</h2>
    <div class="plot-container">
        <div class="plot-placeholder"></div>
    </div>
    <div class="comments-container">
        <h3>User Comments:</h3>
        <div class="comments">
            <p class="placeholder">No comments yet.</p>
        </div>
        <form>
            <textarea id="new-comment" placeholder="add a comment"></textarea>
            <div class="submit-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<div class="product-box">
    <h2 class="product-name">product name</h2>
    <div class="plot-container">
        <div class="plot-placeholder"></div>
    </div>
    <div class="comments-container">
        <h3>User Comments:</h3>
        <div class="comments">
            <p class="placeholder">No comments yet.</p>
        </div>
        <form>
            <textarea id="new-comment" placeholder="add a comment"></textarea>
            <div class="submit-container">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>



<hr>

<img class="rocket" src="src/rocket_right.png">




<?php require_once 'includes/footer.php'; ?>