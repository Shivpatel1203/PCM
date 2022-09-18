<?php
require_once("DB_connect.php");
// Login Check for all user 
class login
{
    public $userid;
    public $password;
    public function DBlogin()
    {
        $conn = dbconnection();
        $sql = "SELECT `user_id`, `password`, `role`, `name` FROM `user` WHERE user_id='$this->userid' and password='$this->password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['role'] == 0) {
                    $_SESSION['Admin'] = $row['user_id'];
                    $_SESSION['Admin_name'] = $row['name'];
                } elseif ($row['role'] == 1) {
                    $_SESSION['manager'] = $row['user_id'];
                    $_SESSION['manager_name'] = $row['name'];
                } elseif ($row['role'] == 2) {
                    $_SESSION['student'] = $row['user_id'];
                    $_SESSION['student_name'] = $row['name'];
                }
            }
            return true;
        } else {
            return false;
        }
    }
}

// Getting information about the complaints
class GetComplaint
{
    public $id;
    public function ComplaintGetStudent()
    {
        $conn = dbconnection();

        $sql = "SELECT `complaint_id`, `pc_id`, `lab_no`, `complaint_type`, `complaint_desc`, `status` FROM `complaint` WHERE user_id='$this->id'";
        $result = $conn->query($sql);
        return $result;
    }
    public function ComplaintGet()
    {
        $conn = dbconnection();

        $sql = "SELECT `complaint_id`, `user_id`, `pc_id`, `lab_no`, `complaint_type`, `complaint_desc`, `date`, `time`, `status` FROM `complaint`";
        $result = $conn->query($sql);
        return $result;
    }

    public $sDate;
    public $eDate;
    public function ComplaintGetByDate()
    {
        $conn = dbconnection();

        $sql = "SELECT `complaint_id`, `user_id`, `pc_id`, `lab_no`, `complaint_type`, `complaint_desc`, `date`, `time`, `status` FROM `complaint` WHERE `date` BETWEEN '$this->sDate' AND '$this->eDate'";
        
        $result = $conn->query($sql);
        return $result;
    }

    public function ComplaintGetByYear()
    {
        $conn = dbconnection();

        $sql = "SELECT COUNT(*) as 'complaint', YEAR(date) as year FROM complaint WHERE YEAR(date) BETWEEN YEAR(CURDATE())- 5 and YEAR(CURDATE()) GROUP BY YEAR(date);";

        $result = $conn->query($sql);
        return $result;
    }

    public function ComplaintGetByMonth()
    {
        $conn = dbconnection();
        $sDate = date("Y-m", strtotime("-1 year"));

        $sql = "SELECT COUNT(*) as 'complaint', MONTHNAME(date) as 'month' FROM complaint WHERE DATE_FORMAT(date, '%Y-%m') BETWEEN '$sDate' and DATE_FORMAT(CURDATE(), '%Y-%m') GROUP BY DATE_FORMAT(date, '%Y-%m')";

        $result = $conn->query($sql);
        return $result;
    }
}


// Getting information about the users
class Get
{
    public $role;
    public function GetUser()
    {
        $conn = dbconnection();

        $sql = "SELECT `user_id`, `password`, `name`, `mobile_number`, `email` FROM `user` WHERE role='$this->role'";
        $result = $conn->query($sql);
        return $result;
    }

    public function GetLab()
    {
        $conn = dbconnection();

        $sql = "SELECT `Lab_id`, `Lab_name` FROM `lab` WHERE 1";
        $result = $conn->query($sql);
        return $result;
    }

    public function GetAllUser()
    {
        $conn = dbconnection();

        $sql = "SELECT `user_id`, `password`, `name`, `mobile_number`, `email`, `role` FROM `user` WHERE 1";
        $result = $conn->query($sql);
        return $result;
    }

}
