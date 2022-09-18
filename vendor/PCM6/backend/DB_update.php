<?php
session_start();
require_once("cls_update.php");
if (isset($_POST['change_status'])) {

    $status = $_POST['status'];

    $obj = new update();
    $obj->complaint_id = $_SESSION['complaint_id'];
    $obj->status = $status;

    $result = $obj->ComplaintStatus();


    if ($result == true) {
        unset($_SESSION['complaint_id']);
        header('Location:../pages/view_complaints.php');
    } else {
        header('Location:../error/error-500.php');
    }
}

//change_password
elseif (isset($_POST['change_password'])) {

    $old_pw = $_POST['old_pw'];
    $new_pw = $_POST['new_pw'];
    $rnew_pw = $_POST['rnew_pw'];

    if ($new_pw == $rnew_pw) {

        $obj = new update();
        $obj->old_pw = $old_pw;
        $obj->new_pw = $new_pw;
        $result = $obj->ChangePassword();


        if ($result == true) {
            header('Location:../pages/index.php');
        } else {
            header('Location:../error/error-400.php');
        }
    }
    else {
        header('Location:../error/error-400.php');
    }

} 

else {
    header('Location:../error/error-404.php');
}
