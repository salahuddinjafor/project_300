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
			
					<?php 
					
					$sql="SELECT * FROM technician_tbl";
					$result=$conn->query($sql);
					if($result->num_rows>0){
						echo '
						<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
								
								<thead class="thead-dark">
								<tr>
									<th scope="col">Technician ID </th>
									<th scope="col"> Technician Name </th>
									<th scope="col"> Email  </th>
									<th scope="col"> Address  </th>
									
									<th scope="col"> Mobile  </th>
									
									<th scope="col"> Action  </th>
								</tr>
								</thead>
								</tbody>
								';
								while($row=$result->fetch_assoc()){
									echo '<tr>';
									echo '<td>'.$row["tech_id"].'</td>';
									echo '<td>'.$row["techname"].'</td>';
									echo '<td>'.$row["techemail"].'</td>';
									echo '<td>'.$row["techaddress"].'</td>';
									echo '<td>'.$row["techmobile"].'</td>';

									echo '<td>';
									echo '
									<form action="edittechnician.php" method="POST" class="d-inline">
									<input type="hidden" name="id" value='.$row["tech_id"].'>
									<button type="submit" class="btn btn-info mr-3" name="edit" value="Edit">Edit</button></form>';
									
										
									echo '<td>';
									echo '
									<form action="" method="POST">
									<input type="hidden" name="id" value='.$row["tech_id"].'>
									<button type="submit" class="btn btn-danger" name="delete" value="Delete">Delete</button>
									</form>';
						
									
									echo '</td>';
									
									echo '</tr>';
									}
								   echo  '</tbody>
									
									</table>
									';
							}else{
								echo '0 Results';
							}
							if(isset($_POST['delete'])){
								$sql="DELETE FROM technician_tbl WHERE tech_id={$_POST['id']}";
								if($conn->query($sql)==TRUE){
									//$msg='<div class="alert alert-success ml-5 mt-2 text-center text-black" role="alert">Technician Added Successfully!</div>';
                   
									//$msg= " Delete Successfully done!";
									echo '<meta http-equiv="refresh" content="0;URL=?closed"/>';
								}else{
									//echo "Unable to Delete!";
									echo "<script>alert('Unable to Delete. Try Again! ')</script>";
								}
							}

					?>
							<div class="float-right">
								<a href="add-technician.php" class="btn btn-danger"><i class="fa fa-plus"></i></a>
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

