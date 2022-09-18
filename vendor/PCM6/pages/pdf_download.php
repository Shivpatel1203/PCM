<?php
session_start();
require_once("../backend/cls_select.php");


if (isset($_SESSION['Admin']) == true) {
	if (isset($_GET['sDate']) == true && isset($_GET['eDate']) == true) {


		$obj = new GetComplaint();
		$obj->sDate = $_GET['sDate'];
		$obj->eDate = $_GET['eDate'];

		$result_complaint  = $obj->ComplaintGetByDate();


		if ($result_complaint->num_rows > 0) {

			$data='<html>
					<head>
					<style>
					table {
						width: 100%;        
						font-family: arial, sans-serif;
						border-collapse: collapse;
					}
					th, td {
						padding: 8px;
						text-align: left;
						border-top: 1px solid #dee2e6;
					}
					tbody tr:nth-child(odd) {
						background-color: #f2f2f2;
					}
					</style>
					</head>
					<body>
						<table class="zui-table">
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
							</thead><tbody>';

			foreach ($result_complaint as $row) {

				if ($row['status'] == 0) {
	                $status_type="Pending";
	            } elseif ($row['status'] == 1) {
	                $status_type="In progress";
	            } elseif ($row['status'] == 2) {
	                $status_type="Compeleted";
	            }

				$data.='<tr><td>'.$row['complaint_id'].'</td><td>'.$row['user_id'].'</td><td>'.$row['pc_id'].'</td><td>'.$row['lab_no'].'</td><td>'.$row['complaint_type'].'</td><td>'.$row['complaint_desc'].'</td><td>'.$row['date'].'</td><td>'.$row['time'].'</td><td>'.$status_type.'</td></tr>';
			}
			$data.='</table>
					</body>
					</html>';
		}
		else{
			header('Location:../error/error-500.php');
		}


		require_once("../vendor/autoload.php");
		$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

	
		$mpdf->WriteHTML($data);

		$file_name=date("d-m-y").".pdf";

		$mpdf->output($file_name,'D');
	}
}

