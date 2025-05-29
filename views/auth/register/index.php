<?php
$college_drop = $controllers->getAllCollege();
$course_drop = $controllers->getAllCourse();
$office_drop = $controllers->getAllOffice();

?>

<section>
    <div class="page-header min-vh-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-5 col-md-6 d-flex flex-column mx-auto mb-7 mt-9">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= isset($_COOKIE['regPosition']) ? ($_COOKIE['regPosition'] == 'student' ? 'active' : '') : 'active' ?>" id="home-tab" onclick="studentCookie()" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Student</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= isset($_COOKIE['regPosition']) ? ($_COOKIE['regPosition'] == 'faculty' ? 'active' : '') : '' ?>" id="profile-tab " onclick="facultyCookie()" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Faculty</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= isset($_COOKIE['regPosition']) ? ($_COOKIE['regPosition'] == 'employee' ? 'active' : '') : '' ?>" id="contact-tab " onclick="employeeCookie()" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Employee</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade  <?= isset($_COOKIE['regPosition']) ? ($_COOKIE['regPosition'] == 'student' ? 'show active' : '') : 'show active' ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <?php include 'student/index.php'; ?>
                        </div>
                        <div class="tab-pane fade <?= isset($_COOKIE['regPosition']) ? ($_COOKIE['regPosition'] == 'faculty' ? 'show active' : '') : ' ' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?php include 'faculty/index.php'; ?>
                        </div>
                        <div class="tab-pane fade <?= isset($_COOKIE['regPosition']) ? ($_COOKIE['regPosition'] == 'employee' ? 'show active' : '') : ' ' ?>" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <?php include 'employee/index.php'; ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>