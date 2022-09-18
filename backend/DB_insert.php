<?php
session_start();

if (isset($_POST['reg_complaint'])) {

    $lab_no = $_POST['lab_no'];
    $pc_no = $_POST['pc_no'];
    $cType = $_POST['cType'];

    if ($cType == "hardware") {
        $complaint_desc = $_POST['complaint_desc1'];
        // $lab_no = $_POST['lab_no1'];
    } elseif ($cType == "software") {
        $complaint_desc = $_POST['complaint_desc2'];
        // $lab_no = $_POST['lab_no2'];
    } else {
        $complaint_desc = $_POST['complaint_desc3'];
        // $lab_no = $_POST['lab_no2'];
    }


    date_default_timezone_set("Asia/Calcutta");
    $user_id = $_SESSION["student"];
    $complaint_id = date("d") . date("m") . date("H") . date("i") . date("s");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $status = 0;

    echo $lab_no . " " . $pc_no . " " . $cType . " " . $complaint_desc . " " . $complaint_id . " " . $user_id . " " . $date . " " . $time;



    require_once("cls_insert.php");

    $obj = new ComplaintRegi();
    $obj->user_id = $user_id;
    $obj->complaint_id = $complaint_id;
    $obj->pc_id = $pc_no;
    $obj->lab_no = $lab_no;
    $obj->complaint_type = $cType;
    $obj->complaint_desc = $complaint_desc;
    $obj->date = $date;
    $obj->time = $time;
    $obj->status = $status;
    $result = $obj->RegiComplaint();


    if ($result == true) {
        header('Location:../pages/view_complaints.php');
    } else {
        header('Location:../error/error-400.php');
    }
} elseif (isset($_POST['add_student']) || isset($_POST['add_technician'])) {

    require '../vendors/autoload.php';

    $document = $_FILES['document'];

    $fileName = $_FILES['document']['name'];
    $fileTmpname = $_FILES['document']['tmp_name'];
    $fileSize = $_FILES['document']['size'];
    $fileError = $_FILES['document']['error'];
    $fileType = $_FILES['document']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('xlsx');

    // echo "<pre>";
    //     print_r($document);
    //     echo "</pre>";

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $count = 0;
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fileTmpname);
                $data = $spreadsheet->getActiveSheet()->toArray();
                foreach ($data as $row) {
                    if ($count > 0) {
                        $user_id = $row['0'];
                        $name = $row['1'];
                        $mobile_no = $row['2'];
                        $password = $user_id;
                        $email = $row['3'];

                        if ($_GET['role'] == 1) {
                            $role = 1;
                        } elseif ($_GET['role'] == 2) {
                            $role = 2;
                        }

                        
                        require_once("cls_insert.php");
                        $obj = new AddUser();
                        $obj->user_id = $user_id;
                        $obj->password = $password;
                        $obj->name = $name;
                        $obj->mobile_number = $mobile_no;
                        $obj->role = $role;
                        $obj->email = $email;
                        $result = $obj->UserAdd();
                    } else {
                        $count = "1";
                    }
                }

                if ($result == TRUE) {

                    if ($_GET['role'] == 1) {
                        header('Location:../pages/view_technician.php?role=1');
                    } elseif ($_GET['role'] == 2) {
                        header('Location:../pages/view_student.php?role=2');
                    }
                } else {
                    if ($_GET['role'] == 1) {
                        header('Location:../pages/view_technician.php?role=1');
                    } elseif ($_GET['role'] == 2) {
                        header('Location:../pages/view_student.php?role=2');
                    }
                }
            }
            else{
                echo 'too large';
            }
        }
    } else {
        header('Location:../error/error-400.php');
    }
}


//Insert Lab
elseif (isset($_POST['add_lab'])) {

    $lab_id = $_POST['lab_id'];
    $lab_name = $_POST['lab_name'];


    require_once("cls_insert.php");

    $obj = new AddLab();
    $obj->Lab_id = $lab_id;
    $obj->Lab_name = $lab_name;
    $result = $obj->LabAdd();


    if ($result == true) {
        header('Location:../pages/view_lab.php');
    } else {
        echo "&#128533";
    }
} else {
    header('Location:../error/error-404.php');
}
