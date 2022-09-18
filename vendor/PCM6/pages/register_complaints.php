<!-- INCLUDE HEADER -->
<?php include '../inc/header.php'; ?>

<!-- INCLUDE SIDEBAR -->
<?php include '../inc/sidebar.php'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $(".box").hide();

        $('#resetbtn').click(function(){
            $(".box").hide();
        })
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".box").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>

<?php
    require_once("../backend/cls_select.php");
    $obj = new Get();
    $result_lab = $obj->GetLab();
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Register Complaint</h4>
                        <p class="card-description">
                            Please fill the form to register a complaint.
                        </p>

                        <form class="forms-sample" method="post" action="../backend/DB_insert.php">

                            <!-- Lab Number -->
                            <div class="form-group">
                                <label for="lab_no">Lab Number</label>
                                <select class="form-control" id="lab_no" name="lab_no" required>
                                    <option default selected disabled>---- SELECT LAB NUMBER ----</option>
                                    <?php
                                        if ($result_lab->num_rows > 0) :
                                            foreach ($result_lab as $row) :
                                        ?>
                                        <option value='<?php echo $row["Lab_id"];?>'><?php echo $row['Lab_id']." - ".$row['Lab_name']; ?></option>

                                    <?php
                                            endforeach;
                                        endif;
                                        ?>
                                </select>
                            </div>

                            <!-- PC Number -->
                            <div class="form-group">
                                <label for="pc_no">PC Number / IP Adress</label>
                                <input type="text" class="form-control" name="pc_no" id="pc_no" placeholder="Enter PC Number OR IP Adress" required>
                            </div>

                            <!-- Complaint Type-->
                            <div class="form-group">
                                <label for="pc_no">Complaint Type</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="cType" id="hardware" value="hardware" required>
                                        Hardware
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="cType" id="software" value="software" required>
                                        Software
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="cType" id="other" value="other" required>
                                        Other
                                    </label>
                                </div>
                            </div>

                              <!-- Hardware -->
                              <div class="form-group hardware box">
                                <label for="lab_no">hardware</label>
                                <select class="form-control" id="lab_no" name="complaint_desc1">
                                    <option default selected disabled>---- SELECT Hardware ----</option>
                                    <option>computer won't turn on.</option>
                                    <option>computer turns on, but still doesn't work.</option>
                                    <option>computer screen freezes.</option>
                                    <option>computer has insufficient memory.</option>
                                    <option>get a CMOS error.</option>
                                    <option>mouse isn't working</option>
                                    <option>keyboard isn't working</option>
                                </select>
                            </div>

                              <!-- software -->
                              <div class="form-group software box">
                                <label for="lab_no">software</label>
                                <select class="form-control" id="lab_no" name="complaint_desc2">
                                    <option default selected disabled>---- SELECT software ----</option>
                                    <option>get the blue screen of death.</option>
                                    <option>operating system is missing or your hard drive isn’t detect</option>
                                    <option>Some software aren't available or working</option>
                                    <option>Too many crashes</option>
                                    <option>Too many virus</option>
                                </select>
                            </div>

                            <!-- Complaint Description-->
                            <div class="form-group other box">
                                <label for="cdesc">Complaint Description</label>
                                <textarea class="form-control" id="cdesc" rows="4" name="complaint_desc3"></textarea>
                            </div>

                            <!-- Submit Button-->
                            <button type="submit" class="btn btn-primary mr-2" name="reg_complaint">Submit</button>
                            <button type="reset" class="btn btn-light" id="resetbtn">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</script>
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