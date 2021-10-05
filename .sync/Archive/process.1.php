<?php
if (isset($_POST['search'])) {
    if (empty($_POST['searcher'])) {
        echo "<script>window.location.href='Exams.php';</script>";
        exit;
    } else {
        $searchValue = $conn->real_escape_string($_POST['searcher']);
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



?>