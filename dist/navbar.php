<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="admin/index.php">Student Reg. System</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">

        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="login.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Administrator</div>
                    <a class="nav-link" href="admin/index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <div class="sb-sidenav-menu-heading">Teacher</div>
                    <a class="nav-link" href="teacher/index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Portal
                    </a>
                    <a class="nav-link" href="teacher/students_registered.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Students Registered
                    </a>
                   <a class="nav-link" href="teacher/lesson_register.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Lesson Register
                    </a>
                    <a class="nav-link" href="teacher/subject_report.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Subjects Reports
                    </a>

                    <div class="sb-sidenav-menu-heading">Student</div>
                    <a class="nav-link" href="student/index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Student Portal
                    </a>
                    <a class="nav-link" href="student/unit_marks_attendance.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>
                        Attendance
                    </a>
                    <a class="nav-link" href="student/unit_registration.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                        Unit Registration
                    </a>
                </div>
            </div>

        </nav>
    </div>