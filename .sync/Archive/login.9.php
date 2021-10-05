<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <?php
    include("cssLinks.php");
    $page = null;
    if (isset($_SESSION['username'])) {
        $page = 0;
    }
    ?>
</head>

<body>
    <?php
    $try = mysqli_query($conn, "select * from User ");

    while($trow = mysqli_fetch_array($try)){
     $use =    $trow['username'];
     $password = $trow['password'];   
    mysqli_query($conn, "UPDATE User set password = '$password' where username = '$use '");
        echo '
    <script>
    alert("You change Successfully ! ")     
    </script>';

    }

    $username = "";
    $password = "";
    $hash = null;
    if (isset($_POST['Login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = sha1($_POST['password']);
                                          //////////////////////////////////////change
        $usercheck = mysqli_query($conn, "select username from User where username='" . $username . "'");
        $passcheck = mysqli_query($conn, "select * from User where username='" . $username . "'");

        if (mysqli_num_rows($usercheck) > 0) {
            $row = mysqli_fetch_array($passcheck);
            if ($row['password'] == $hash) {
                $_SESSION['message'] = "Successful Login! Welcome to Online Examination!";
                $_SESSION['type'] = "success";
                $_SESSION['logined'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['picture'] = $row['user_image'];
                //remember me cookies and it set The cookie that expire after 7 days  
                if (isset($_POST['rememberme'])) {
                    setcookie("rememberme", $_SESSION['username'], time() + (86400 * 7), "/");
                } elseif (!isset($_POST['rememberme'])) {
                    setcookie("rememberme", "", time() - 1,);
                }
                echo "
                <script>
                location.href = 'Dashboard.php';
                </script>
                ";
            } else {
                $_SESSION['message'] = "Incorrect Password! Failed Login, try again.";
                $_SESSION['type'] = "danger";
                echo "
                <script>
                location.href = 'login.php';
                </script>
                ";
            }
        } else {
            $_SESSION['message'] = "Username does not exist! Failed Login, try again.";
            $_SESSION['type'] = "danger";
            echo "
                <script>
                location.href = 'login.php';
                </script>
                ";
        }
    }
    ?>

    <body class="bg-gradient-primary">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-12 col-xl-10">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-flex">
                                    <div class="flex-grow-1 bg-login-image"
                                        style="background-image: url(&quot;assets/img/edu55.jpg&quot;);"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Welcome Back!</h4>
                                        </div>
                                        <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group"><input class="form-control form-control-user"
                                                    type="text" placeholder="Username" name="username" required
                                                    value="<?php echo $username; ?>"></div>
                                            <div class="form-group"><input class="form-control form-control-user"
                                                    type="password" placeholder="Password" name="password" required
                                                    value="<?php echo $password; ?>"></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <div class="form-check">
                                                        <input class="form-check-input custom-control-input"
                                                            type="checkbox" id="formCheck-1" name="rememberme">
                                                        <label class="form-check-label custom-control-label"
                                                            for="formCheck-1">Remember Me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-block text-white btn-user" name="Login"
                                                type="submit">Login</button>

                                        </form>
                                        <a class="small" href="Dashboard.php">skip>>>>></a>
                                        <div class="text-center"><a class="small" href="Resetpassword.php">Forgot
                                                Password?</a></div>
                                        <div class="text-center"><a class="small" href="register.php">Create an
                                                Account!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('jslinks.php');

        ?>


    </body>

</html>