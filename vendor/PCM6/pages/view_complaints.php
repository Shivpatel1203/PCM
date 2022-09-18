<!-- INCLUDE HEADER -->
<?php include '../inc/header.php'; ?>

<!-- INCLUDE SIDEBAR -->
<?php include '../inc/sidebar.php'; ?>

<!-- INCLUDE  -->
<?php require_once("../backend/cls_select.php"); ?>

<!-- Student List Complaints -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <?php
            if (isset($_SESSION['student']) == true) :
                $obj = new GetComplaint();
                $obj->id = $_SESSION['student'];
                $result_complaint  = $obj->ComplaintGetStudent();
            ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View Complaint</h4>
                            <p class="card-description">
                                List of <code>Complaints</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_data">
                                    <thead>
                                        <tr>
                                            <th>Complaint ID</th>
                                            <th>PC ID</th>
                                            <th>Lab Number</th>
                                            <th>Complaint Type</th>
                                            <th>Complaint Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($result_complaint->num_rows > 0) :
                                            foreach ($result_complaint as $row) :
                                        ?>
                                                <tr>
                                                    <td><?php echo $row['complaint_id']; ?></td>

                                                    <td><?php echo $row['pc_id']; ?></td>

                                                    <td><?php echo $row['lab_no']; ?></td>

                                                    <td><?php echo $row['complaint_type']; ?></td>

                                                    <td><?php echo $row['complaint_desc']; ?></td>

                                                    <td>
                                                        <?php
                                                        if ($row['status'] == 0) {
                                                            echo '<label class="badge badge-danger">Pending</label>';
                                                        } elseif ($row['status'] == 1) {
                                                            echo '<label class="badge badge-warning">In progress</label>';
                                                        } elseif ($row['status'] == 2) {
                                                            echo '<label class="badge badge-success">Compeleted</label>';
                                                        }

                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
            ?>
        </div>

        <!-- Admin List Complaints -->
        <div class="row">
            <?php
            if (isset($_SESSION['Admin']) == true || isset($_SESSION['manager'])) :
                $obj = new GetComplaint();
                $result_complaint  = $obj->ComplaintGet();
            ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">View Complaint</h4>
                            <p class="card-description">
                                List of <code>Complaints</code>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-hover" id="table_data">
                                    <thead>
                                        <tr>
                                            <th>Complaint ID</th>
                                            <th>User ID</th>
                                            <th>PC ID</th>
                                            <th>Lab Number</th>
                                            <th>Complaint Type</th>
                                            <th>Complaint Description</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if ($result_complaint->num_rows > 0) :
                                            foreach ($result_complaint as $row) :
                                        ?>
                                                <tr>
                                                    <td><?php echo $row['complaint_id']; ?></td>

                                                    <td><?php echo $row['user_id']; ?></td>

                                                    <td><?php echo $row['pc_id']; ?></td>

                                                    <td><?php echo $row['lab_no']; ?></td>

                                                    <td><?php echo $row['complaint_type']; ?></td>

                                                    <td><?php echo $row['complaint_desc']; ?></td>

                                                    <td><?php echo $row['date']; ?></td>

                                                    <td><?php echo $row['time']; ?></td>

                                                    <td>
                                                        <?php
                                                        if (isset($_SESSION['manager']) == true) {
                                                            if ($row['status'] == 0) {
                                                                echo '<a class="badge badge-danger" href="../pages/change_status.php?complaint_id='.$row['complaint_id'].'">Pending</a>';
                                                            } elseif ($row['status'] == 1) {
                                                                echo '<a class="badge badge-warning" href="../pages/change_status.php?complaint_id='.$row['complaint_id'].'">In progress</a>';
                                                            } elseif ($row['status'] == 2) {
                                                                echo '<label class="badge badge-success">Compeleted</label>';
                                                            }
                                                        } 
                                                        elseif (isset($_SESSION['Admin']) == true) {
                                                            if ($row['status'] == 0) {
                                                                echo '<label class="badge badge-danger">Pending</label>';
                                                            } elseif ($row['status'] == 1) {
                                                                echo '<label class="badge badge-warning">In progress</label>';
                                                            } elseif ($row['status'] == 2) {
                                                                echo '<label class="badge badge-success">Compeleted</label>';
                                                            }
                                                        }

                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
            ?>

        </div>
    </div>
</div>
<!-- INCLUDE FOOTER -->
<?php include '../inc/footer.php'; ?>