<?php
//session_start();
error_reporting(0);
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
	
	<title>OSRC| Admin Add Requester </title>

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
<script language="javascript">
function isNumberKey(evt)
      {
         
        var charCode = (evt.which) ? evt.which : event.keyCode
                
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
           return false;

         return true;
      }
      </script>
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-sm-3">
					<?php
					// <input type="submit" class="btn btn-info mr-4" name="close" value="Cancel">

                                    $sql="SELECT * FROM requester_data";
                                    $result=$conn->query($sql);
                                    if($result->num_rows>0){
                                        while($row=$result->fetch_assoc()){
                                            echo '
                                            <div class="card border">
                                            <div class="card-body border">
                                                <h5 class="card-title border">Requester ID:'.$row['requester_id'].'</h5>
                                                <p class="card-text border"> Requester Info:'.$row['product_name'].'</p>
                                                <p class="card-text border"> Requester Description:'.$row['p_discription'].'</p>
                                                <p class="card-text border"> Submission Date:'.$row['p_date'].'</p>
                                                
                                                <form action="" method="POST">
                                                <input type="hidden" name="id" value='.$row["requester_id"].'>
                                                <input type="submit" class="btn btn-primary" name="view" value="View">  
												<a href="dashboard.php" class="btn btn-danger">Close</a>
                                                </form>

                                            </div>
                                            </div>
                                            ';  
                                        }
                                    }
                                    ?>
					</div>
									<?php 
                                    if(isset($_POST['view'])){
                                        $sql="SELECT * FROM requester_data WHERE requester_id=
                                    {$_POST['id']}";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
                                    }
									/*
									if(isset($_POST['close'])){
										$sql="DELETE FROM requester_data WHERE requester_id={$_POST['id']}";
										if($conn->query($sql)==TRUE){
											//echo "<script>alert('Assign Data Deleted Successfully! ')</script>";
											echo '<meta http-equiv="refresh" content="0;URL=?closed"/>';
										}else{
											//echo "Unable to Delete!";
											echo "<script>alert('Unable to Delete. Try Again! ')</script>";
										}
									}
									*/
                                    
									if(isset($_POST['assign'])){
										$rid=$_POST['requester_id'];
										$name=$_POST['fullname'];
										$email=$_POST['emailid'];
										$mobile=$_POST['mobileno'];
										$gender=$_POST['gender'];
										$productname=$_POST['productname'];
										$productdescription=$_POST['productdescription'];
										$addressassign=$_POST['address1'];
										$technician_name=$_POST['technician_name'];
										$assign_date=$_POST['assign_date'];
										
										$sql="INSERT INTO assignwork_tbl(requester_id, username, email, assign_date,
										 raddress, c_number, gender, technician_name, productname, productdescription)
										VALUES('$rid','$name','$email','$assign_date','$addressassign','$mobile','$gender','$technician_name'
										,'$productname','$productdescription')";

										if($conn->query($sql)==TRUE){
											$msg="Assign Work to Technician!";
											//echo "<script>alert(' Work Assign Successfully! ')</script>";
										}else{

											$error="Unable to Assign Work!";
										}

									}

                                    ?>
					<div class="col-md-9">
					
						<h2 class="page-title"> </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"><p class="text-info">Assign work to Technician</p></div>
<?php if($error){?><div class="errorWrap text-danger"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap text-info"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label"> Requester ID </label>
<div class="col-sm-4">
<input type="text" name="requester_id" class="form-control" value="<?php if(isset($row['requester_id'])) echo $row['requester_id']; ?>" readonly required>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-4">
<input type="text" name="fullname" class="form-control" value="<?php if(isset($row['c_name'])) echo $row['c_name']; ?>" required>
</div>

</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email id </label>
<div class="col-sm-4">
<input type="email" name="emailid" class="form-control" value="<?php if(isset($row['r_mail'])) echo $row['r_mail']; ?>" required>
</div>
<label class="col-sm-2 control-label">Mobile No</label>
<div class="col-sm-4">
<input type="text" name="mobileno" onKeyPress="return isNumberKey(event)"  maxlength="10" class="form-control" value="<?php if(isset($row['c_number'])) echo $row['c_number']; ?>" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="gender" class="form-control" value="<?php if(isset($row['gender'])) echo $row['gender']; ?>" required>

</div>
<label class="col-sm-2 control-label"> Product Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="productname" class="form-control" value="<?php if(isset($row['product_name'])) echo $row['product_name']; ?>" required>
</div>
</div>


											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Product Description</label>
<div class="col-sm-10">
<input type="text" name="productdescription" class="form-control" value="<?php if(isset($row['p_discription'])) echo $row['p_discription']; ?>" required>
</div>
</div>

<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Addresss With full details <span style="color:red">*</span></label>
<div class="col-sm-10">
<input type="text" name="address1" class="form-control" value="<?php if(isset($row['address1'])) echo $row['address1']; ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Assign Technician <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="technician_name" class="form-control" required>
</div>

<label class="col-sm-2 control-label">date <span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="assign_date" class="form-control" value="" required>
</div>
</div>



											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
												<button class="btn btn-primary" name="assign" type="submit">Assign Data </button>
													<button class="btn btn-default" type="reset">Cancel</button>
													
												</div>
											</div>

										</form>
									</div>
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
<?php  ?>