<?php
// $page = 'users';
// require('dbConnect.php');
// include('header.php');
// include('navbar.php');
// if (isset($_SESSION['role'])) {
//     if ($_SESSION['role'] == 1) {
//         header("location:CoAdmin.php");
//     } else if ($_SESSION['role'] == 2) {
//         header("location:Customer.php");
//     } else {
//     }
// } else {
//     header("location:index.php");
// }

?>

<style>
    body {
        background: -webkit-linear-gradient(left, #f7bb97, #dd5e89);
        background: linear-gradient(to right, #f7bb97, #dd5e89);
        font-family: 'Roboto', sans-serif;
    }

    a {
        color: #69C;
        text-decoration: none;
    }

    a:hover {
        color: #F60;
    }

    h1 {
        font: 1.7em;
        line-height: 110%;
        color: #000;
    }

    p {
        margin: 0 0 20px;
    }


    input {
        outline: none;*-
    }

    input[type=search] {
        -webkit-appearance: textfield;
        -webkit-box-sizing: content-box;
        font-family: inherit;
        font-size: 100%;
    }

    input::-webkit-search-decoration,
    input::-webkit-search-cancel-button {
        display: none;
    }


    input[type=search] {
        background: #ededed url(https://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
        border: solid 1px #ccc;
        padding: 9px 10px 9px 32px;
        width: 150px;

        -webkit-border-radius: 10em;
        -moz-border-radius: 10em;
        border-radius: 10em;

        -webkit-transition: all .5s;
        -moz-transition: all .5s;
        transition: all .5s;
    }

    input[type=search]:focus {
        width: 300px;
        background-color: #fff;
        border-color: #66CC75;

        -webkit-box-shadow: 0 0 5px rgba(109, 207, 246, .5);
        -moz-box-shadow: 0 0 5px rgba(109, 207, 246, .5);
        box-shadow: 0 0 5px rgba(109, 207, 246, .5);
    }


    input:-moz-placeholder {
        color: #999;
    }

    input::-webkit-input-placeholder {
        color: #999;
    }
</style>type="hidden"
<?php
include('sidebar.php');
require_once 'process.php';

if (isset($_SESSION['message'])) {
    echo '
    <div style="padding-left:100px;" class="alert alert-' . $_SESSION['type'] . '">
    ' . $_SESSION['message'] . '
    ';
    unset($_SESSION['message']);
    echo '
    </div>
    ';
}

?>
<div class="container" style="padding-top:30px">
    <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <input type="search" placeholder="Search" name="searcher">
            <select style="width: 150px; background-color:#ccc;height:45px; border-radius:20px; color:dark;margin-right:10px;border-color: white;" id="sel1" name="category">
                <option value="fName">FirstName</option>
                <option value="lName">LastName</option>
                <option value="email">Email</option>
                <option value="phone">Phone</option>
                <option value="joined_at">Date</option>
                <option value="role_name">Role</option>
            </select>
            <button type="submit" class="btn btn-primary" style="background-color: #3797a4;height:40px; border-radius:20px" name="search">Search</button>
        </div>
        <div class="input-group" style="padding-top: 20px;">
            <input type="text" name="fname" class="form-control" placeholder="Enter user first name" value="<?php echo $efirstname; ?>">
            <input type="text" name="lname" class="form-control" placeholder="Enter user last name" value="<?php echo $elastname;  ?>">
            <input type="email" name="email" class="form-control" placeholder="Enter user email" value="<?php echo $eemail; ?>">
            <input type="number" name="phone" class="form-control" placeholder="Enter user phone" value="<?php echo $ephone; ?>">
            <input type="password" name="pass" class="form-control" placeholder="Enter user password" value="<?php echo $epass; ?>">
            <select class="form-control" id="sel1" name="role">
                <option value="">SELECT ROLE</option>
                <option value="0" <?php if ($erole == 0) {
                                        echo 'selected';
                                    } ?>>ADMIN</option>
                <option value="1" <?php if ($erole == 1) {
                                        echo 'selected';
                                    } ?>>MODERATOR</option>
                <option value="2" <?php if ($erole == 2) {
                                        echo 'selected';
                                    } ?>>CUSTOMER</option>
            </select>
        </div>
        <div class="form-group" style="float: right;padding:20px">
            <?php
            if ($update == true) {
                echo '<button type="submit" class="btn btn-info" name="update">Update</button>';
            } else {
                echo '<button type="submit" class="btn btn-primary" name="save">Save</button>';
            }
            ?>
        </div>
    </form>
    <div class="row justify-content-center" style="padding-top: 40px;width:100%;background-color:white;border-radius:15px">
        <table class="table">

            <thead>

                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>PHONE</th>
                    <th>JOINED</th>
                    <th>ROLE</th>
                    <th colspan="2">Action</th>
                </tr>

            </thead>

            <?php
            if (isset($_GET['search'])) {
                $searchValue = $_GET['search'];
                $category = $_GET['cat'];
                $searchResult = $con->query("SELECT * FROM role r,users us WHERE $category LIKE '%$searchValue%' AND us.role=r.id") or die($con->error);
                while ($row = $searchResult->fetch_assoc()) {
                    echo '
                <tr>
                    <td>' . $row['fName'] . '</td>
                    <td>' . $row['lName'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['joined_at'] . '</td>
                    <td>' . $row['role_name'] . '</td>
                    <td>
                    <a href="./users.php?edit=' . $row['id'] . '"
                    class ="btn btn-info">Edit</a>
                    <a href="./process.php?delete=' . $row['id'] . '"
                    class ="btn btn-danger">Delete</a>
                    </td>
                </tr>
                
                ';
                }
            } else {
                $searchResult = $con->query("SELECT * FROM role r,users us WHERE us.role=r.id") or die($con->error);
                while ($row = $searchResult->fetch_assoc()) {
                    echo '
                <tr>
                    <td>' . $row['fName'] . '</td>
                    <td>' . $row['lName'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['phone'] . '</td>
                    <td>' . $row['joined_at'] . '</td>
                    <td>' . $row['role_name'] . '</td>
                    <td>
                    <a href="./users.php?edit=' . $row['id'] . '"
                    class ="btn btn-info">Edit</a>
                    <a href="./process.php?delete=' . $row['id'] . '"
                    class ="btn btn-danger">Delete</a>
                    </td>
                </tr>
                
                ';
                }
            }
            ?>

        </table>

    </div>
</div>