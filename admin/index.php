<?php

	if(isset($_GET['sair']) && $_GET['sair'] == 1){
		session_start();
		session_destroy();
	}
	require_once('../config.php');
	require_once('class/secure.php');
?>

<!doctype html>
<html lang="en" ng-app="app">
	<head>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="../node_modules/angular/angular.min.js"></script>
		<script src="../node_modules/toastr/build/toastr.min.js"></script>
		<script src="../node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
		<script src="../node_modules/ng-file-upload/dist/ng-file-upload.min.js"></script>
		<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
		<script src="js/app.js"></script>
		<script src="js/filtros.js"></script>
		<script src="js/controller.principal.js"></script>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="<?=$Globals["AdminFull"]?>img/fav.png" />
		<!-- Title -->
		<title>Admin</title>
		<!-- ************ ************* Common Css Files ************ ************* -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<!-- Main CSS -->
		<link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css"/>
		<link rel="stylesheet" href="../node_modules/toastr/build/toastr.css"/>
		<link rel="stylesheet" href="fonts/style.css">
		<link rel="stylesheet" href="css/main.css" />

		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="vendor/daterange/daterange.css" />
	</head>
	<body ng-controller="ControllerPrincipal as pc" >

		<!-- Loading starts -->
		<div id="loading-wrapper" ng-show="pc.loading">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->

		<!-- *************
			************ Header section start *************
		************* -->

		<!-- Header start -->
		<header class="header">
			<div class="logo-wrapper">
				<a href="index.html" class="logo">
					<img src="<?=$Globals["AdminFull"]?>img/logo_white_adm.png" alt="Bluemoon Admin Dashboard" />
				</a>
			</div>
			<div class="header-items">
				<!-- Header actions start -->
				<ul class="header-actions">		
					<li>
						<a id="userSettings" class="user-settings">
							<span class="user-name"><strong>Bem vindo!</strong> <?=$_SESSION['nome'] ?> </span>							
						</a>					
					</li>					
					<li>
						<a href="<?=$Globals["AdminFull"]?>index.php?sair=1" id="userSettings" class="user-settings">
							<span class="user-name">Sair</span>							
						</a>					
					</li>					
				</ul>						
				<!-- Header actions end -->
			</div>
		</header>
		<!-- Header end -->

		<!-- Screen overlay start -->
		<div class="screen-overlay"></div>
		<!-- Screen overlay end -->
		<!-- Quick settings end -->
		<!-- *************
			************ Header section end *************
		************* -->
		<!-- Container fluid start -->
		<div class="container-fluid">

			<!-- Navigation start -->
			<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bluemoonNavbar" aria-controls="bluemoonNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="bluemoonNavbar">
					<ul class="navbar-nav">
						<li class="nav-item dropdown" ng-click="pc.funcMenu(1)" style="cursor:pointer;">
							<a class="nav-link " id="dashboardsDropdown" ng-class="pc.classActive == '1' ? 'active-page' : '' ">
								<i class="icon-devices_other nav-icon"></i>
								Meus Pets
							</a>						
						</li>
						<li class="nav-item dropdown" ng-click="pc.funcMenu(3)" style="cursor:pointer;">
							<a  class="nav-link " id="dashboardsDropdown1" ng-class="pc.classActive == '2' ? 'active-page' : '' ">
								<i class="icon-book-open nav-icon"></i>
								Pets Interação
							</a>						
						</li>						
					</ul>
				</div>
			</nav>
			<!-- Navigation end -->

			<!-- *************
				************ Main container start *************
			************* -->
			<div class="main-container">

				<!-- Page header start -->
				<div class="page-header">	
				
				</div>
				<!-- Page header end -->

				<!-- Content wrapper start -->
				<div class="content-wrapper">
					<!-- Fixed body scroll start -->
					<div class="fixedBodyScroll" >

					<div ng-include="pc.url"></div>						

					</div>
					<!-- Fixed body scroll end -->
				</div>
				<!-- Content wrapper end -->
			</div>
			<!-- *************
				************ Main container end *************
			************* -->
			<!-- Footer start -->
			<footer class="main-footer">© iPet 2022</footer>
			<!-- Footer end -->
		</div>
		<!-- Container fluid end -->

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<!-- <script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script> -->

		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Apex Charts -->
		<!-- <script src="vendor/apex/apexcharts.min.js"></script>
		<script src="vendor/apex/custom/apexAllCustomGraphs.js"></script> -->

		<!-- Flot Charts -->
		<!-- <script src="vendor/flot/flot.js"></script> -->
		<!-- <script src="vendor/flot/resize.js"></script> -->
		<!-- <script src="vendor/flot/custom/small-graphs.js"></script> -->

		<!-- Circliful JS -->
		<script src="vendor/circliful/circliful.min.js"></script>
		<script src="vendor/circliful/circliful.custom.js"></script>
		<!-- Main Js Required -->
		<script src="js/main.js"></script>
		<script>
			const urlAdm = '<?=$Globals["AdminFull"]?>';
			
		</script>

	</body>
</html>