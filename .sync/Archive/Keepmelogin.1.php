<?php

//remember me cookies 
if (isset($_COOKIE['rememberme'])) {
    $_SESSION['logined'] = true;
    $_SESSION['username'] = $_COOKIE['rememberme'];
}

if (!isset($_SESSION['logined'])) {
    if (isset($page)) {
        if ($page == 1) {
            echo "
            <script>
            location.href = 'Login.php';
            </script>
            ";
        }
    }
} elseif (isset($_SESSION['logined'])) {

    ?>


    <!-- <div class="dropdown">
        <button class="dropbtn"><strong><?php if (isset($_COOKIE['rememberme'])) {
                                            echo "{$_COOKIE['rememberme']}" . "&nbsp";
                                        } else {
                                            echo $_SESSION['username'];
                                        } ?> <i class="fa fa-user-circle" style="font-size: 20px;"></i></strong></button>
        <div class="dropdown-content">
            <a href="./Index.php">Home</a>
            <a href="./Form.php">Submit Form</a>
            <a href="./Submited.php">Last Form</a>
            <a href="./Changepassword.php">Change Password</a>
            <a href="./Logout.php">Logout</a>
        </div>
    </div> -->

<?php    
        if ($page == 0) {
            echo "
            <script>
            location.href = 'Dashboard.php';
            </script>
            ";
        }
    
}

?>