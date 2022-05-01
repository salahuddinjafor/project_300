<?php
	include('includes/config.php');

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
							<!-- Work Report --> 
							<div class="col-md-10 mt-5 text-center">
								<form action="" class="d-print-none" method="POST">
									<div class="form-row">
										<div class="form-group col-md-3">
											<input type="date" class="form-control" id="startdate" name="startdate" required>
										</div> 
										<div class="form-group col-md-1"><h3>to </h3> </div>
									 
										<div class="form-group col-md-3">
											<input type="date" class="form-control" id="enddate" name="enddate" required>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-info" name="searchsubmit" value="Search">
										</div>
									</div>
								</form>
								<?php 
									if(isset($_POST['searchsubmit'])){
										$startdate=$_POST['startdate'];
										$enddate=$_POST['enddate'];
										$sql="SELECT * FROM assignwork_tbl WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
										$result=$conn->query($sql);
										if($result->num_rows>0){
											
											echo '
											<table  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								
								<thead class="thead-dark">
								<tr>
									<th scope="col">Requester ID </th>
									<th scope="col"> Customer Name </th>
									<th scope="col"> product Name  </th>
									
									<th scope="col"> Technician   </th>
									
									<th scope="col"> Mobile  </th>
								
								</tr>
								</thead>
								</tbody>
								';
								while($row=$result->fetch_assoc()){
									echo '<tr>';
									echo '<td>'.$row["requester_id"].'</td>';
									echo '<td>'.$row["username"].'</td>';
									echo '<td>'.$row["productname"].'</td>';
									echo '<td>'.$row["technician_name"].'</td>';
									echo '<td>'.$row["c_number"].'</td>';

									
									echo '</tr>';
									}
								   echo  '</tbody>
									
									</table>
									';
							}else{
								echo '
								<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">
								No records Found!</div>
								';
							}
											
										}
									
								?>
							</div>
					
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

