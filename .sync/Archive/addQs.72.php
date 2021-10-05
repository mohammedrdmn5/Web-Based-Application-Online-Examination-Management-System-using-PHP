<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add questions</title>

    <?php
    include("cssLinks.php");
    $page = 9;
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
                                            <input type="search" placeholder="Search by exame code" name="searcher2">&nbsp;&nbsp;
                                            <button class="btn btn-primary btn-sm" type="submit" name="search2">Search</button>
                                        </form>
                                    </div>
                                    <!-- <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <form action="process.php" method="POST" id="formsave" style="min-width:1550px;">
                                            <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                                            <div class="input-group" style="padding-top: 20px;">
                                                <input type="text" name="exam_title" class="form-control" required placeholder="Enter exam title" value="<?php echo $exam_title;
                                                                                                                                                            ?>">
                                                <input type="datetime-local" data-type="datetime-local" min="<?php echo date('Y-m-d\TH:i'); ?>" required name="exam_datetime" class="form-control" placeholder="Enter exam datetime" value="<?php if (!isset($exam_datetime) && $exam_datetime == "") {
                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                echo date('Y-m-d\TH:i',  strtotime($exam_datetime));
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                            ?>">
                                                <input type="number" name="exam_duration" class="form-control" min="0" max="60" required placeholder="Enter exam duration" value="<?php echo $exam_duration;
                                                                                                                                                                                    ?>">
                                                <input type="number" name="total_question" class="form-control" min="0" max="60" required placeholder="Enter total question" value="<?php echo $total_question;
                                                                                                                                                                                    ?>">

                                                <select class="form-control" id="sel1" required name="status">
                                                    <option value="">Select status</option>
                                                    <option value="1" <?php if ($status == 1) {
                                                                            echo 'selected';
                                                                        } ?>>visible</option>
                                                    <option value="0" <?php if ($status == 0) {
                                                                            echo 'selected';
                                                                        } ?>>invisible</option>
                                                </select>
                                                <select class="form-control select" id="dropcourse_title" required name="course_title">
                                                    <option value="">SELECT course title</option>
                                                    <?php
                                                    $course_data = GetDataFromDataBase("SELECT DISTINCT * FROM course");
                                                    while ($data = mysqli_fetch_array($course_data))
                                                        ShowDataToDorpDownlist($data['course_title'], $course_title);
                                                    ?>
                                                </select>
                                                <select class="form-control select" id="dropcourse_title" required name="faculty_title">
                                                    <option value="">SELECT faculty title</option>
                                                    <?php
                                                    $cfaculty_data = GetDataFromDataBase("SELECT DISTINCT * FROM faculty");
                                                    while ($data = mysqli_fetch_array($cfaculty_data))
                                                        ShowDataToDorpDownlist($data['faculty_title'], $faculty_title);
                                                    ?>
                                                </select>
                                                <select class="form-control" id="dropfullname" required name="fullname">
                                                    <option value="">SELECT teacher name</option>
                                                    <?php
                                                    $user_data = GetDataFromDataBase(" SELECT DISTINCT
                                                        CONCAT(user.fname, ' ',user.lname) AS fullname,
                                                        teacher.teacher_id
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
                                                            ON teacher.user_id = user.user_id");
                                                    while ($data = mysqli_fetch_array($user_data))
                                                        ShowDataToDorpDownlist($data['fullname'], $fullname);
                                                    ?>
                                                </select>
                                                <input type="text" name="exam_code" required class="form-control" placeholder="Enter exam code" value="<?php echo $exam_code;
                                                                                                                                                        ?>">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                    </div> -->
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <!-- exam_title	exam_datetime	exam_duration	total_question	created_on	status	course_id	teacher_id	faculty_id	exam_code	 -->
                                            <tr>
                                                <!-- <th></th> -->
                                                <th>Question Title</th>
                                                <th>Opetions</th>
                                                <th>Correct opetion NO.</th>
                                                <th>Question marks</th>
                                                <!-- <th colspan="2">Action</th> -->
                                            </tr>

                                        </thead>

                                        <?php
                                        if (isset($_GET['search'])) {
                                            // $searchValue = $_GET['search'];                                      
                                            // $searchResult = $conn->query("SELECT DISTINCT
                                            //     exam.*,
                                            //     question_opetions.*,
                                            //     question.*
                                            //     FROM question
                                            //     LEFT OUTER JOIN exam
                                            //         ON question.exam_id =   exam.exam_id
                                            //     LEFT OUTER JOIN question_opetions
                                            //         ON question.question_id = question_opetions.question_id 
                                            //     WHERE exam.exam_id = '$searchValue'") or die($conn->error);
                                            //     $count = 0;
                                            // $row2 = mysqli_fetch_array($searchResult);
                                            // $numberOfQs = $row2['total_question'];
                                            $searchValue = $_GET['search'];
                                            $searchResult = $conn->query("SELECT DISTINCT * FROM exam WHERE exam.exam_id = '$searchValue'") or die($conn->error);
                                            $count = 0;
                                            while ($row = $searchResult->fetch_assoc()) {
                                                $numberOfQs = $row['total_question'];

                                                for ($i = 0; $i < $numberOfQs; $i++) {

                                                    //INSERT INTO `question`(`question_id`, `question_title`, `answer_option`, `mark`, `exam_id`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
                                                    //INSERT INTO `question_opetions`(`opetion_id`, `question_id`, `opetion_title`, `opetion_number`) VALUES ([value-1],[value-2],[value-3],[value-4])
                                                    echo
                                                    '<tr><td>  <input type="text" name="question_title' . $i . '" class="form-control"  required placeholder="Enter your question title" value=""></td>';
                                                    echo '<td>';
                                                    for ($option = $i; $option < $i + 4; $option++) {
                                                        $count += 1;
                                                        echo '<input type="text" name="opetion_title' . $option . '" class="form-control" style="margin:10px" required placeholder="Enter the NO.' . $count . ' option title" value="">';
                                                    }
                                                    $count = 0;

                                                    echo '</td>';
                                                    echo '<td>
                                                <label>Select correct opetion NO.&nbsp; <select class="form-control form-control-sm custom-select custom-select-sm" name="answer_option' . $i . '" style="width:fit-content;">
                                                    <option value="1" selected>1</option> 
                                                    <option value="2">2</option>
                                                    <option value="3" >3</option> 
                                                    <option value="4">4</option>
                                                </select>&nbsp;</label>
                                                </td>
                                                ';
                                                    echo '<td>
                                                <input type="text" name="mark' . $i . '" class="form-control" style="margin:10px" required placeholder="Enter the marks" value="">
                                                </td>
                                                ';
                                                    echo '</tr>';
                                                }
                                                echo '</tr>';
                                            }
                                        }
                                        ?>

                                        <tfoot>
                                            <tr>
                                                <!-- <th></th> -->
                                                <th>Question Title</th>
                                                <th>Opetions</th>
                                                <th>Correct opetion NO.</th>
                                                <th>Question marks</th>
                                                <!-- <th colspan="2">Action</th> -->

                                            </tr>
                                        </tfoot>

                                    </table>
                                    <button class="btn btn-primary btn-sm" style="float: right;" type="submit" name="Submitdata">Submit</button>
                                </form>
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