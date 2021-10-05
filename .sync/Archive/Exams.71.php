<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>

    <?php
    include("cssLinks.php");
    $page = 6;
    require("Keepmelogin.php");
    ?>
</head>
<?php
require_once 'process.php';

?>

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
                    <h3 class="text-dark mb-4">Exam</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Exam Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <label>Select&nbsp; <select class="form-control form-control-sm custom-select custom-select-sm" name="category" style="width:fit-content;">
                                                    <option value="exam.exam_title" selected>exam title</option>
                                                    <option value="exam.exam_datetime">exam datetime</option>
                                                    <option value="exam.exam_duration">exam duration</option>
                                                    <option value="exam.total_question">total question</option>
                                                    <option value="exam.status">created on</option>
                                                    <option value="course.course_title">course title</option>
                                                    <option value="faculty.faculty_title">faculty title</option>
                                                    <option value="CONCAT(user.fname, ' ',user.lname)">teacher name</option>
                                                    <option value="exam.exam_code">exam code</option>
                                                </select>&nbsp;</label>&nbsp;&nbsp;
                                            <input type="search" placeholder="Search" name="searcher">&nbsp;&nbsp;
                                            <button class="btn btn-primary btn-sm" type="submit" name="search">Search</button>
                                        </form>
                                    </div>
                                    <form action="process.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                                            <?php
                                            if (isset($update) && $update == true) {
                                                echo '<button type="submit" class="btn btn-info" name="update">Update</button>';
                                            } else {
                                                echo '<button type="submit" class="btn btn-primary" name="save">Save</button>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group" style="float: right;padding:20px">

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <!-- exam_title	exam_datetime	exam_duration	total_question	created_on	status	course_id	teacher_id	faculty_id	exam_code	 -->
                                        <tr>
                                            <th>exam title</th>
                                            <th>exam datetime</th>
                                            <th>exam duration</th>
                                            <th>total question</th>
                                            <th>created on</th>
                                            <th>status</th>
                                            <th>course title</th>
                                            <th>faculty title</th>
                                            <th>teacher name</th>
                                            <th>exam code</th>
                                            <th colspan="2">Action</th>
                                        </tr>

                                    </thead>

                                    <?php
                                    if (isset($_GET['search'])) {
                                        $searchValue = $_GET['search'];
                                        $category = $_GET['cat'];
                                        $searchResult = $conn->query("SELECT
                                        CONCAT(user.fname, ' ',user.lname) AS fullname,
                                        exam.*,
                                        teacher.*,
                                        user.*,
                                        course.*,
                                        faculty.*
                                        FROM exam
                                        INNER JOIN teacher
                                            ON exam.teacher_id = teacher.teacher_id
                                        INNER JOIN faculty
                                            ON exam.faculty_id = faculty.faculty_id
                                            AND teacher.faculty_id = faculty.faculty_id
                                        INNER JOIN course
                                            ON exam.course_id = course.course_id
                                            AND course.teacher_id = teacher.teacher_id
                                            AND course.faculty_id = faculty.faculty_id
                                        INNER JOIN user
                                            ON teacher.user_id = user.user_id WHERE $category LIKE '%$searchValue%'") or die($conn->error);
                                        while ($row = $searchResult->fetch_assoc()) {
                                            //exam_title	exam_datetime	exam_duration	total_question	created_on	status	course_id	teacher_id	faculty_id	exam_code	
                                            if ($row['status'] == 1) {
                                                $status = "Available";
                                            } else {
                                                $status = "Unavailable";
                                            }

                                            echo '
                                                <tr>
                                                    <td>' . $row['exam_title'] . '</td>
                                                    <td>' . $row['exam_datetime'] . '</td>
                                                    <td>' . $row['exam_duration'] . ' Minutes</td>
                                                    <td>' . $row['total_question'] . '</td>
                                                    <td>' . $row['created_on'] . '</td>
                                                    <td>' . $status . '</td>
                                                    <td>' . $row['course_title'] . '</td>
                                                    <td>' . $row['faculty_title'] . '</td>
                                                    <td>' . $row['fullname'] .  '</td>
                                                    <td>' . $row['exam_code'] . '</td>
                                                    <td>
                                                    <a href="./Exams.php?edit=' . $row['exam_id'] . '"
                                                    class ="btn btn-info">Edit</a>
                                                    <a href="./Exams.php?delete=' . $row['exam_id'] . '"
                                                    class ="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                
                                                ';
                                        }
                                    } else {
                                        $searchResult = $conn->query("SELECT  * FROM exam  INNER JOIN teacher    ON exam.teacher_id = teacher.teacher_id  INNER JOIN faculty
                                            ON exam.faculty_id = faculty.faculty_id    AND teacher.faculty_id = faculty.faculty_id  INNER JOIN course    ON exam.course_id = course.course_id
                                                AND course.teacher_id = teacher.teacher_id    AND course.faculty_id = faculty.faculty_id  INNER JOIN user    ON teacher.user_id = user.user_id")
                                            or die($conn->error);
                                        while ($row = $searchResult->fetch_assoc()) {
                                            //exam_title	exam_datetime	exam_duration	total_question	created_on	status	course_id	teacher_id	faculty_id	exam_code	
                                            if ($row['status'] == 1) {
                                                $status = "Available";
                                            } else {
                                                $status = "Unavailable";
                                            }

                                            echo '
                                                <tr>
                                                    <td>' . $row['exam_title'] . '</td>
                                                    <td>' . $row['exam_datetime'] . '</td>
                                                    <td>' . $row['exam_duration'] . ' Minutes</td>
                                                    <td>' . $row['total_question'] . '</td>
                                                    <td>' . $row['created_on'] . '</td>
                                                    <td>' . $status . '</td>
                                                    <td>' . $row['course_title'] . '</td>
                                                    <td>' . $row['faculty_title'] . '</td>
                                                    <td>' . $row['fname'] . ' ' . $row['lname'] . '</td>
                                                    <td>' . $row['exam_code'] . '</td>
                                                    <td>
                                                    <a href="./Exams.php?edit=' . $row['exam_id'] . '"
                                                    class ="btn btn-info">Edit</a>
                                                    <a href="./Exams.php?delete=' . $row['exam_id'] . '"
                                                    class ="btn btn-danger">Delete</a>
                                                    </td>
                                                </tr>
                                                
                                                ';
                                        }
                                    }
                                    ?>

                                    <tfoot>
                                        <tr>
                                            <th>exam title</th>
                                            <th>exam datetime</th>
                                            <th>exam duration</th>
                                            <th>total question</th>
                                            <th>created on</th>
                                            <th>status</th>
                                            <th>course title</th>
                                            <th>faculty title</th>
                                            <th>teacher name</th>
                                            <th>exam code</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 27</p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <<?php
                include('footer.php');
                ?> </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
        <?php

        include('jsLinks.php');
        ?>
</body>

</html>