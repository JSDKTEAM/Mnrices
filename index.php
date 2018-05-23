<?php 
ob_start();
if(isset($_REQUEST['controller'])&&isset($_REQUEST['action']))
{
	$controller = $_REQUEST['controller'];
	$action = $_REQUEST['action'];
}
else
{
	$controller = 'rice';
	$action = 'index_riceVariety';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rice-Disease</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/validator.css" rel="stylesheet">


	 <!-- sweetalert -->
	 <script src="sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sweetalert-master/dist/sweetalert.css">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet"> 
	<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
</head>
<header >
		<?php include('views/header/nav.php') ?>
		<?php include('views/header/sidebar.php')?>
</header>
<body id="<?php echo $controller ?>">
	<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/jquery.form.validator.min.js"></script>
	<script src="js/security.js"></script>
	<script src="js/file.js"></script>
	<!-- dataTablefunc -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

	

	<script src="js/dataTable.js"></script>
	<script>
    $(document).ready(function() {
		$("#rice a:contains('จัดการข้าว')").parent().addClass('active');
		$("#dep a:contains('จัดการหน่วยงาน')").parent().addClass('active');
		$("#district a:contains('จัดการที่อยู่')").parent().addClass('active');
		$("#user a:contains('จัดการผู้ใช้')").parent().addClass('active');
        
	}); //jQuery is loaded
	dataTable('.tabledata');
    </script>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<?php require_once("routes.php"); ?>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
</body>
</html>