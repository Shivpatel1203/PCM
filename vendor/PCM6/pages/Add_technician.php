<!-- INCLUDE HEADER -->
<?php include '../inc/header.php'; ?>

<!-- INCLUDE SIDEBAR -->
<?php include '../inc/sidebar.php'; ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Technician</h4>
                        <p class="card-description">
                            Upload the excel file to insert the data
                        </p>

                        <form class="forms-sample" method="post" action="../backend/DB_insert.php?role=1" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="document" class="file-upload-default" required>
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Document">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>


                            <!-- Submit Button-->
                            <button type="submit" class="btn btn-primary mr-2" name="add_technician">Submit</button>
                            <button type="reset" class="btn btn-light">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INCLUDE FOOTER -->
<?php include '../inc/footer.php'; ?>


<!-- 

lab no - dropdown 2 value LAB11,LAB13
pc id
complain type
subtype - dropdown
desc
datetime auto
status default 0 

 -->