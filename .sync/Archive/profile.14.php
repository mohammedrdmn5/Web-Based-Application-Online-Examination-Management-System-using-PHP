<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <?php
    include("cssLinks.php");
    $page = 2;
    require("Keepmelogin.php");

    ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php

        include("sidebar.php");
        ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <?php

                include("aboveNavbar.php");
                ?>
                <div class="container-fluid">

                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <p class="text-primary m-2 font-weight-bold"
                                    style="margin:auto;font-size:25px !important;">
                                    <?php if (isset($_SESSION['username'])) {
                                        echo $_SESSION['username'];
                                    }
                                    ?></p>
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        <?php $pic = 'null.png';
                                                                                                                if (isset($_SESSION['picture'])) {
                                                                                                                    $pic = $_SESSION['picture'];
                                                                                                                }
                                                                                                                echo 'src = "assets/img/' . $pic . ' "'; ?> width="160" height="160">

                                    <div class="mb-3"><button class="btn btn-primary btn-sm" name="changepicture"
                                            type="button">Change Photo</button></div>
                                </div>
                            </div>




                            <?php
                            function checkDuplicate($username) // check if the username is exist in the database or not 
                            {
                                if ($username == $_SESSION['username']) {
                                    return false; // the user same as the user who login
                                } else {
                                    include 'dbConnection.php';
                                    $getusernames = mysqli_query($conn, "select * from User where username='$username'") or die(mysqli_error($conn));
                                    if (mysqli_num_rows($getusernames) > 0) {
                                        return true; // the username is exsit 
                                    } else
                                        return false; // the username is not exist
                                }
                            }
                            $fName = "";
                            $lName = "";
                            // while  $addressID = "";
                            $username = "";
                            $password = "";
                            $email = "";
                            $gender = "";
                            // $nohashPass = "";
                            $mobile_No = "";

                            if (isset($_SESSION['username'])) { // cehck if the session is exist to show the user info 

                                $userSession = $_SESSION['username'];
                                $courseData = mysqli_query($conn, "SELECT * from User where user.username = '$userSession'") or die(mysqli_error($conn));
                                // while (mysqli_num_rows($courseData)) {
                                // }    
                                while ($row = mysqli_fetch_array($courseData)) {


                                    $fName = $row['fname'];
                                    $lName = $row['lname'];

                                    $username = $row['username'];
                                    //$password = $row['password'];
                                    $email = $row['email'];
                                    $gender = $row['gender'];

                                    $mobile_No = $row['mobile_No'];

                                    //$data[$index] = $row;
                                    //   $index++;
                                }
                            }

                            if (isset($_POST['btnSavePersonal'])) // if the user update the personl information
                            {
                                if (checkDuplicate($_POST['username']) == false) {

                                    $fname1 = $_POST['fname'];
                                    $lname1 = $_POST['lname'];
                                    $username1 = $_POST['username'];
                                    $email1 = $_POST['email'];
                                    $gender1 = $_POST['gender'];
                                    $mobile_No1 = $_POST['mobile_No'];

                                    // echo "<script>alert('$fname1.$lname1.$username1.$username1.$gender1.$mobile_No1.'error num1'.');</script>";




                                    $query = "UPDATE User SET fname = '$fname1',lname = '$lname1', username = '$username1',email = '$email1',gender = '$gender1',mobile_No = '$mobile_No1' where username = '$username1'";

                                    $_SESSION['message'] = 'Personal Information has been changed successfully!';
                                    $_SESSION['type'] = 'success';
                                    $q = mysqli_query($conn, $query) or die(mysqli_error($conn));





                                    // if (isset($_SESSION['username'])) {
                                    //     echo "
                                    //         <script>
                                    //         location.href = 'Profile.php';
                                    //         </script>
                                    //         ";
                                    // } else {
                                    //     echo "
                                    //         <script>
                                    //         location.href = 'Login.php';
                                    //         </script>
                                    //         ";
                                    // }







                                } else {
                                    echo "<script>alert('This user exist,Please select another username');</script>";
                                }
                            }












                            ?>

















                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server migration<span
                                            class="float-right">20%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales tracking<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database<span
                                            class="float-right">60%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details<span
                                            class="float-right">80%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account setup<span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>



















                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label
                                                                for="username"><strong>Username</strong></label><input
                                                                class="form-control" type="text" placeholder="username"
                                                                value="<?php echo $username ?>" name="username"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Email
                                                                    Address</strong></label><input class="form-control"
                                                                type="email" placeholder="user@example.com"
                                                                value="<?php echo $email ?>" name="email"></div>
                                                    </div>
                                                </div>









                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>First
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" placeholder="John"
                                                                value="<?php echo $fName ?>" name="fname"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Last
                                                                    Name</strong></label><input class="form-control"
                                                                type="text" placeholder="Doe"
                                                                value="<?php echo $lName ?>" name="lname"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="mobile_No"><strong>Mobile
                                                                    No</strong></label><input class="form-control"
                                                                type="text" placeholder="01805151"
                                                                value="<?php echo $mobile_No ?>" name="mobile_No">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label
                                                                for="last_name"><strong>Gender</strong></label>
                                                            <select class="form-control" name="gender">
                                                                <?php
                                                                if ($gender = "") {
                                                                    echo ' 
                                                                 <option value="select">Select</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>';
                                                                } else if ($gender = "Male") {
                                                                    echo '   
                                                                <option value="select">Select</option>
                                                                <option selected value="Male">Male</option>
                                                                <option value="Female">Female</option>

                                                           ';
                                                                } else if ($gender = "Female") {
                                                                    echo '
                                                                <option value="select">Select</option>
                                                                <option  value="Male">Male</option>
                                                                <option selected value="Female">Female</option>

                                                            ';
                                                                }

                                                                ?>

                                                            </select>


                                                        </div>


                                                    </div>
                                                </div>










                                                <div class="form-group"><button class="btn btn-primary btn-sm"
                                                        type="submit" name="btnSavePersonal">Save Settings</button>
                                                </div>
                                            </form>

















                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group"><label
                                                        for="address"><strong>Address</strong></label><input
                                                        class="form-control" type="text" placeholder="Sunset Blvd, 38"
                                                        name="address"></div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label
                                                                for="city"><strong>City</strong></label><input
                                                                class="form-control" type="text"
                                                                placeholder="Los Angeles" name="city"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label
                                                                for="country"><strong>Country</strong></label><input
                                                                class="form-control" type="text" placeholder="USA"
                                                                name="country"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm"
                                                        type="submit">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Forum Settings</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form>
                                        <div class="form-group"><label
                                                for="signature"><strong>Signature</strong><br></label><textarea
                                                class="form-control" rows="4" name="signature"></textarea></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-switch"><input
                                                    class="custom-control-input" type="checkbox" id="formCheck-1"><label
                                                    class="custom-control-label" for="formCheck-1"><strong>Notify me
                                                        about new replies</strong></label></div>
                                        </div>
                                        <div class="form-group"><button class="btn btn-primary btn-sm"
                                                type="submit">Save Settings</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('footer.php'); ?>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <?php include('jsLinks.php'); ?>
</body>

</html>