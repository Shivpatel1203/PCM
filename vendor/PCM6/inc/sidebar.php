<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="index.php">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <!-- View Complaint -->
        <li class="nav-item">
            <a class="nav-link" href="../pages/view_complaints.php">
                <i class="mdi mdi-eye menu-icon"></i>
                <span class="menu-title">View Complaint</span>
            </a>
        </li>


        <!-- Admin Sidebar -->
        <?php
        if (isset($_SESSION['Admin']) == true) :
        ?>
            <!-- Technician -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-technician" aria-expanded="false" aria-controls="ui-technician">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Technician</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-technician">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../pages/Add_technician.php">Add Technician</a></li>
                        <li class="nav-item"> <a class="nav-link" href="../pages/view_technician.php?role=1">View Technician</a></li>
                    </ul>
                </div>
            </li>



            <!-- Student -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-student" aria-expanded="false" aria-controls="ui-student">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Student</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-student">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../pages/Add_student.php">Add Student</a></li>
                        <li class="nav-item"> <a class="nav-link" href="../pages/view_student.php?role=2">View Student</a></li>
                    </ul>
                </div>
            </li>

            <!-- Lab -->
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-lab" aria-expanded="false" aria-controls="ui-lab">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Lab</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-lab">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="../pages/Add_lab.php">Add Lab</a></li>
                        <li class="nav-item"> <a class="nav-link" href="../pages/view_lab.php">View Lab</a></li>
                    </ul>
                </div>
            </li>


            <!-- Report -->
            <li class="nav-item">
                <a class="nav-link" href="../pages/report.php">
                    <i class="mdi mdi-file-document menu-icon"></i>
                    <span class="menu-title">Report</span>
                </a>
            </li>


        <?php
        endif;
        ?>

        <!-- Manager Sidebar -->
        <?php
        if (isset($_SESSION['manager']) == true) :
        ?>

             <li class="nav-item">
                <a class="nav-link" href="../pages/report.php">
                    <i class="icon-search menu-icon"></i>
                    <span class="menu-title">Search by</span>
                </a>
            </li>

        <?php
        endif;
        ?>

        <!-- Student Sidebar -->
        <?php
        if (isset($_SESSION['student']) == true) :
        ?>
            <!-- Register Complaint -->
            <li class="nav-item">
                <a class="nav-link" href="../pages/register_complaints.php">
                    <i class="mdi mdi-comment-alert-outline menu-icon"></i>
                    <span class="menu-title">Register Complaint</span>
                </a>
            </li>
        <?php
        endif;
        ?>

    </ul>
</nav>