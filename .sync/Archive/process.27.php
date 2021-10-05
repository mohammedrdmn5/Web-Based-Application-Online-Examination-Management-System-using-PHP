<?php
require_once('dbConnect.php');
$exam_id = 0;
$exam_title = "";
$exam_datetime = "";
$exam_duration = "";
$total_question = "";
$status = "";
$course_title = "";
$faculty_title = "";
$fullname = "";
$exam_code = "";

$update = false;

if (isset($_POST['save'])) {

    $exam_title = $conn->real_escape_string($_POST['exam_title']);
    $exam_datetime = $conn->$_POST['exam_datetime'];
    $exam_duration = $conn->real_escape_string($_POST['exam_duration']);
    $total_question = $conn->real_escape_string($_POST['total_question']);
    $status = $conn->real_escape_string($_POST['status']);
    $course_title = $conn->real_escape_string($_POST['course_title']);
    $faculty_title = $conn->real_escape_string($_POST['faculty_title']);
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $exam_code = $conn->real_escape_string($_POST['exam_code']);

    if (empty($_POST['exam_title'])) {
        echo "<script>
                alert('exam title is required');
                </script>";
    } else if (empty($_POST['exam_datetime'])) {
        echo "<script>
        alert('exam datetime is required');
        </script>";
    } else if (empty($_POST['exam_duration'])) {
        echo "<script>
        alert('exam duration is required');
        </script>";
    } else if (empty($_POST['total_question'])) {
        echo "<script>
        alert('total question is required');
        </script>";
    } else if (empty($_POST['exam_code'])) {
        echo "<script>
        alert('exam code is required');
        </script>";
    } else if (empty($_POST['course_title'])) {
        echo "<script>
        alert('course title  is required');
        </script>";
    } else if (empty($_POST['faculty_title'])) {
        echo "<script>
        alert('faculty title  is required');
        </script>";
    } else if (empty($_POST['fullname'])) {
        echo "<script>
        alert('teacher name  is required');
        </script>";
    } else if ($status == "" || ($status != "0" && $status != "1")) {
        echo "<script>
        alert('status is required');
        </script>";
    } else {
        $sql_e = "SELECT * FROM users WHERE email='$email'";
        $res_e = mysqli_query($con, $sql_e);

        if (mysqli_num_rows($res_e) > 0) {
            echo "<script>
        alert('The specified email already in the system pleace choose another one');
        </script>";
        } else {
            $con->query("INSERT INTO users (fName,lName,email,phone,password,role) VALUES('$firstname','$lastname','$email','$phone','$pwdEncrypted','$role')") or die($con->error);
            session_start();
            $_SESSION['message'] = "Record has been saved!";
            $_SESSION['type'] = "success";
        }
    }
    echo "<script>window.location.href='users.php';</script>";
    exit;
}
if (isset($_POST['search'])) {
    if (empty($_POST['searcher'])) {
        echo "<script>window.location.href='Exams.php';</script>";
        exit;
    } else {
        $searchValue = $conn->real_escape_string($_POST['searcher']);
        $category = $conn->real_escape_string($_POST['category']);
        echo "<script>window.location.href='Exams.php?search=$searchValue&cat=$category';</script>";
        exit;
    }
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $con->query("DELETE FROM Exams WHERE id=$id") or die($conn->error);
    session_start();
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['type'] = "danger";
    echo "<script>window.location.href='Exams.php';</script>";
    exit;
}
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM Exams WHERE id=$id") or die($conn->error);
    if (@count($result) == 1) {
        $row = $result->fetch_array();
        $efirstname = $row['fName'];
        $elastname = $row['lName'];
        $eemail = $row['email'];
        $ephone = $row['phone'];
        $erole = $row['role'];
    }
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $firstname = $conn->real_escape_string($_POST['fname']);
    $lastname = $conn->real_escape_string($_POST['lname']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $pass = $conn->real_escape_string($_POST['pass']);
    $salt = 'leaderfrank';
    $pwdEncrypted = sha1($pass . $salt);
    $role = $conn->real_escape_string($_POST['role']);

    $conn->query("UPDATE Exams SET fName='$firstname',lName='$lastname',email='$email',phone='$phone',password='$pwdEncrypted',role='$role' WHERE id=$id") or die($con->error);
    session_start();
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['type'] = "warning";
    echo "<script>window.location.href='Exams.php';</script>";
}
