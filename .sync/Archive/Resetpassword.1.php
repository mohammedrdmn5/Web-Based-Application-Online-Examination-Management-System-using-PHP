<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <?php

    include("cssLinks.php");
    ?>
</head>
<?php





?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/mbr-1266x844.jpg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Reset your password</h4>!</h4>
                                    </div>
                                    <form class="user" method="post" action="Resetpassword.php">
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputuser" placeholder="Username" name="username"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="number" id="exampleInputPassword" placeholder="Phone number" name="Phone"></div>
                                       
                                        <button class="btn btn-primary btn-block text-white btn-user" namme="Reset" type="submit">Reset</button>

                                    </form>
                                    <div class="text-center"><a class="small" href="login.php">Go back to login</a></div>
                                    <div class="text-center"><a class="small" href="register.php">Go back to resgister</a></div>
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