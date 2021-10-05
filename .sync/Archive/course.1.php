<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>

    <?php
    $page = 3;
    include("cssLinks.php");

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
                    <h3 class="text-dark mb-4">Courses</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Courses</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form class="user" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="col-md-6">
                                        <div class="text-md-right dataTables_filter" id="dataTable_filter">
                                            <label>
                                                <input name="txtSearch" type="text" class="form-control form-control-sm"
                                                    aria-controls="dataTable" placeholder="Search">
                                            </label>
                                            <button class="btn btn-primary btn-sm" type="submit"
                                                name="btnSearch">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid"
                                aria-describedby="dataTable_info">


                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Course ID</th>
                                            <th>Course title</th>
                                            <th>Faculty </th>
                                            <th>Teacher name</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (isset($_POST['btnSearch'])) {


                                            $searchTarget = $_POST['txtSearch'];
                                            $courseData = mysqli_query($conn, "SELECT DISTINCT `course`.`course_id`, `course`.`course_title`, `faculty`.`faculty_title`, `user`.`fname`, `user`.`lname` FROM `course`  LEFT JOIN `faculty` ON `course`.`faculty_id` = `faculty`.`faculty_id`, `user` where `course`.`course_title` LIKE '$searchTarget';") or die(mysqli_error($conn));
                                            // while (mysqli_num_rows($courseData)) {
                                            // }    
                                            while ($row = mysqli_fetch_array($courseData)) {
                                                //$data[$index] = $row;
                                                //   $index++;
                                                echo '<tr>
                                                <td>' . $row['course_id'] . '</td>
                                                <td>' . $row['course_title'] . '</td>
                                                <td>' . $row['faculty_title'] . '</td>
                                                <td>' . $row['fname'] . ' ' . $row['lname'] . '</td>
                                            </tr>';
                                            }
                                        } else {
                                            $courseData = mysqli_query($conn, "SELECT `course`.`course_id`, `course`.`course_title`, `faculty`.`faculty_title`, `user`.`fname`, `user`.`lname` FROM `course` LEFT JOIN `faculty` ON `course`.`faculty_id` = `faculty`.`faculty_id`, `user`;");
                                            // while (mysqli_num_rows($courseData)) {
                                            // }
                                            while ($row = mysqli_fetch_array($courseData)) {
                                                //$data[$index] = $row;
                                                //   $index++;
                                                echo '<tr>
                                                <td>' . $row['course_id'] . '</td>
                                                <td>' . $row['course_title'] . '</td>
                                                <td>' . $row['faculty_title'] . '</td>
                                                <td>' . $row['fname'] . ' ' . $row['lname'] . '</td>
                                            </tr>';
                                            }
                                        }



                                        /*
                                        for ($index = 0; $index < count($data); $index++) {
                                        }
                                    echo '<tr>
                                        <td><img class="rounded-circle mr-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">' . $data[$index]['course_id'] . '</td>
                                        <td>' . $data[$index]['course_title'] . '</td>
                                        <td>' . $data[$index]['fname'] . ' ' . $data[$index]['lname'] . '</td>
                                        <td>33</td>
                                    </tr>';

*/
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Course ID</th>
                                            <th>Course title</th>
                                            <th>Faculty </th>
                                            <th>Teacher name</th>>
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
                                    <nav
                                        class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#"
                                                    aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                        aria-hidden="true">»</span></a></li>
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
                ?> </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i
                        class="fas fa-angle-up"></i></a>
        </div>
        <?php

        include('jsLinks.php');
        ?>
</body>

</html>