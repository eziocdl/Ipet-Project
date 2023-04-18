<?php
	require_once('../config.php');
?>
<!doctype html>
<html lang="en" ng-app="app">
	<head>

		<script src="<?=$Globals["AdminFull"]?>js/jquery.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>js/bootstrap.bundle.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>js/moment.js"></script>
		<script src="<?=$Globals["AdminFull"]?>../node_modules/angular/angular.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>../node_modules/toastr/build/toastr.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>../node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>../node_modules/ng-file-upload/dist/ng-file-upload.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>js/app.js"></script>
		<script src="<?=$Globals["AdminFull"]?>js/controller_login.js"></script>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="<?=$Globals["AdminFull"]?>img/fav.png" />

		<!-- Title -->
		<title>iPet - Admin</title>
		
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=$Globals["AdminFull"]?>css/bootstrap.min.css" />
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?=$Globals["AdminFull"]?>../node_modules/toastr/build/toastr.css"/>
		<link rel="stylesheet" href="<?=$Globals["AdminFull"]?>css/main.css" />

	</head>
	<body class="authentication" ng-controller="ControllerLogin as vm">

		<!-- Loading starts -->
		<div id="loading-wrapper" ng-show="vm.loading">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>

		<!-- Container start -->
		<div class="container">			
			<!-- Form start -->
			<form id="formForgot" name="formForgot">
				<!-- Row start -->
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-12">						
						<!-- Login screen start -->
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo" style="justify-content: center;">
									<img src="<?=$Globals["AdminFull"]?>img/ipet_login_imagem.png" alt="iPet Administração" />
								</a>
								<h5>Para acessar seu painel, insira seu e-mail fornecido durante o processo de registro.</h5>
								<div class="form-group">
									<input 
										autocomplete="off"
										type="email" 
										id="email" 
										name="email" 
										ng-required="true" 
										ng-minlength="4"   
										ng-maxlength="255"   
										class="form-control" 
										ng-model="vm.formForgot.email"
										ng-attr-placeholder="E-mail" 
										ng-class="formForgot.email.$valid?'is-valid':(formForgot.email.$pristine?'border-warning':'is-invalid')"
										type="text" class="form-control" placeholder="Seu e-mail" />
								</div>
								<div class="actions">
									<button ng-disabled="!formForgot.$valid" type="button" ng-click="vm.redefinirSenha()" class="btn btn-primary">Enviar</button>
								</div>
							</div>
						</div>
						<!-- Login screen end -->

					</div>
				</div>
				<!-- Row end -->
				
			</form>
			<!-- Form end -->

		</div>
		<!-- Container end -->
			<!-- Container end -->

		<!-- Required jQuery first, then Bootstrap Bundle JS -->


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="<?=$Globals["AdminFull"]?>vendor/slimscroll/slimscroll.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="<?=$Globals["AdminFull"]?>vendor/daterange/daterange.js"></script>
		<script src="<?=$Globals["AdminFull"]?>vendor/daterange/custom-daterange.js"></script>

		<!-- Main Js Required -->
		<script src="<?=$Globals["AdminFull"]?>js/main.js"></script>

	</body>
</html>