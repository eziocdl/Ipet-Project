<?php
	require_once('config.php');
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
			<form id="formLogin" name="formLogin">				
				<!-- Row start -->
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-12">						
						<!-- Login screen start -->
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo" style="justify-content: center;">
									<img src="<?=$Globals["AdminFull"]?>img/ipet_login_imagem.png" alt="iPet Administração" />
								</a>
								<h5>Seja Bem Vindo(a),<br />Por favor faça seu login aqui!.</h5>
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
										ng-model="vm.formLogin.email"
										ng-attr-placeholder="E-mail" 
										ng-class="formLogin.email.$valid?'is-valid':(formLogin.email.$pristine?'border-warning':'is-invalid')" /> 
								</div>
								<div class="form-group">
									<input 
										autocomplete="off"
										ng-attr-placeholder="Senha"                      
										ng-required="true" 
										ng-minlength="4"     
										ng-maxlength="9"   
										id="password" 
										name="password" 
										class="form-control" 
										ng-class="formLogin.password.$valid?'is-valid':(formLogin.password.$pristine?'border-warning':'is-invalid')" 
										ng-model="vm.formLogin.password"
										type="password" 
										class="form-control"/>
								</div>
								<div class="actions mb-4">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="remember_pwd">									
									</div>
									<button type="button" ng-click="vm.login()" ng-disabled="!formLogin.$valid" class="btn btn-primary">Login</button>
								</div>
								<div class="forgot-pwd">
									<a class="link" href="/ipet/admin/forgot-pwd.php">Esqueci a senha.</a>
								</div>
								<hr>
								<div class="actions align-left">
									<span class="additional-link">Novo por aqui? <a href="<?=$Globals["AdminFull"]?>signup.php">Criar conta</a></span>
								</div>
							</div>
						</div>
						<!-- Logi screen end -->

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