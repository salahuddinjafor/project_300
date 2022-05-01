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
                if(isset($_POST['techsubmit'])){
                    $rname=$_POST['t_name'];
                    $address=$_POST['t_address1'];
                    $remail=$_POST['t_email'];
                    $mobile=$_POST['t_mobile'];

                    $sql="INSERT INTO technician_tbl(techname,techaddress,techemail,techmobile) VALUES ('$rname','$address','$remail','$mobile')";

                     if($conn->query($sql)==TRUE){
                        $msg='<div class="alert alert-success ml-5 mt-2 text-center text-black" role="alert">Technician Added Successfully!</div>';
                    }else{
                        $msg='<div class="alert alert-danger ml-5 mt-2 text-center text-black" role="alert">Unable to Add Technician data!Please Try again.</div>';
                    
                    }
                    
                }
            
            ?>
                                <div class="jumbotron">
                                <?php if(isset($msg)){echo $msg;} ?>

                                    <h3 class="text-center">Add New Technician </h3>

                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label for="r_name">Technician Name </label>
                                            <input type="text" class="form-control" id="r_name" name="t_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="r_email">Email  </label>
                                            <input type="email" class="form-control" id="r_email" name="t_email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">address  </label>
                                            <input type="text" class="form-control" id="address" name="t_address1" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile">Mobile   </label>
                                            <input type="number" class="form-control" id="mobile" name="t_mobile" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-danger mb-4" id="reqsubmit" name="techsubmit">Submit </button>
                                            <a href="technician.php" class="btn btn-info mb-4">Close</a>
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

