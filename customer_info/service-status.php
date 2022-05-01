<?php
include('includes/config.php');
/*
session_start();
if($_SESSION['is_login']){
	$r_mail=$_SESSION['rmail'];
}else{
	echo "<script>location.href='login.php';</script>";
}
*/

?>


<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title> </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

					
					<form action="" method="post" class="form-inline">

							<div class="form-group">
								<label for="checkid">Enter Requester ID: </label>
								<input type="number" class="form-control" name="checkid" id="checkid" required>
							</div>
							<button type="submit" name="searchid" class="btn btn-danger">Search</button>
							</form>

							<?php 
								if(isset($_POST['searchid'])){
									//if(isset($_POST['checkid']=="")){
										//$msg1="Input Fields are Empty!";
										
									//}else{
										
										$sql="SELECT * FROM assignwork_tbl WHERE requester_id={$_POST['checkid']}";
									$result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
									
									if(($row['requester_id']==$_POST['checkid'])){ ?>
							<h3 class="text-danger mt-5">Assigned Work Details </h3>
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td>Customer ID</td>
												<td><?php if(isset($row['requester_id'])){echo $row['requester_id'];} ?></td>
											</tr>
											<tr>
												<td>Customer Name </td>
												<td><?php if(isset($row['username'])){echo $row['username'];} ?></td>
											</tr>
											<tr>
												<td>Product Description  </td>
												<td><?php if(isset($row['productdescription'])){echo $row['productdescription'];} ?></td>
											</tr>
											<tr>
												<td>Product Name  </td>
												<td><?php if(isset($row['productname'])){echo $row['productname'];} ?></td>
											</tr>
											<tr>
												<td>Product Description  </td>
												<td><?php if(isset($row['productdescription'])){echo $row['productdescription'];} ?></td>
											</tr>
											<tr>
												<td>Customer Address   </td>
												<td><?php if(isset($row['raddress'])){echo $row['raddress'];} ?></td>
											</tr>
											<tr>
												<td>Customer Phone Number    </td>
												<td><?php if(isset($row['c_number'])){echo $row['c_number'];} ?></td>
											</tr>
											<tr>
												<td>Customer Submission Date    </td>
												<td><?php if(isset($row['rdate'])){echo $row['rdate'];} ?></td>
											</tr>
											<tr>
												<td>Customer Gender    </td>
												<td><?php if(isset($row['gender'])){echo $row['gender'];} ?></td>
											</tr>
											<tr>
												<td>Assign Technician Name </td>
												<td><?php if(isset($row['technician_name'])){echo $row['technician_name'];} ?></td>
											</tr>
											<tr>
												<td> Technician Signature  </td>
												<td></td>
											</tr>
											<tr>
												<td>Customer Signature   </td>
												<td> </td>
											</tr>
											
										</tbody>
									</table>
									<div class="text-center">
										<form action="" class="mb-6 display-print-none">
											<input type="submit" class="btn btn-danger" value="Print" onClick="window.print()">
											<input type="submit" value="Close" class="btn btn-dark">
										</form>

									</div>
									<?php } else{
										echo '<div class="alert alert-info mt-4"> Your Request is Still Pending</div>';
										//echo "$msg1";
									}
									
									
								} 
									?>
									<?php //if(isset($msg1)){echo $msg1;} ?>
							</div>
							</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

