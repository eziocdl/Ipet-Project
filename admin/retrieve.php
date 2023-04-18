<?php
	require_once('../config.php');
?>
<!doctype html>
<html lang="en" ng-app="app">
	<head>
		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/moment.js"></script>
		<script src="../node_modules/angular/angular.min.js"></script>
		<script src="../node_modules/toastr/build/toastr.min.js"></script>
		<script src="../node_modules/ng-file-upload/dist/ng-file-upload.min.js"></script>
		<script src="<?=$Globals["AdminFull"]?>../node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
		<script src="js/app.js"></script>
		<script src="js/controller_signup.js"></script>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="<?=$Globals["AdminFull"]?>img/fav.png" />
		
		

		<!-- Title -->
		<title>iPet - Admin</title>		
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?=$Globals["AdminFull"]?>css/bootstrap.min.css" />
		<!-- Main CSS -->
		<link rel="stylesheet" href="../node_modules/toastr/build/toastr.css"/>
		<link rel="stylesheet" href="<?=$Globals["AdminFull"]?>css/main.css" />
	</head>
	<body class="authentication" ng-controller="ControllerSignup as vm">

		<!-- Loading starts -->
		<div id="loading-wrapper" ng-show="vm.loading">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>

		<!-- Container start -->
		<div class="container">			
			<!-- Form start -->
			<form id="formRetrieve" name="formRetrieve">
				<!-- Row start -->
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-12">						
						<!-- Login screen start -->
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo" style="justify-content: center;">
									<img src="<?=$Globals["AdminFull"]?>img/ipet_login_imagem.png" alt="iPet Administração" />
								</a>
								<h5><br />Resetar senha</h5>								
								<div class="form-group">
									<div class="input-group">
										<input type="hidden" 
											ng-model="vm.formRetrieve.email" 
											ng-init="vm.formRetrieve.email = <?=$_GET['email']?> " />
										<input type="hidden" 
											ng-model="vm.formRetrieve.key" 
											ng-init="vm.formRetrieve.key = <?=$_GET['k']?> " />											
										<input 
											autocomplete="off"
											ng-attr-placeholder="Sua senha"                      
											ng-required="true" 
											ng-minlength="4"     
											ng-maxlength="9"   
											id="password" 
											name="password" 
											class="form-control" 
											ng-class="formRetrieve.password.$valid?'is-valid':(formRetrieve.password.$pristine?'border-warning':'is-invalid')" 
											ng-model="vm.formRetrieve.password"
											type="password" 
											class="form-control"/>
										<input 
											autocomplete="off"
											ng-attr-placeholder="Confirmar senha"        
											same-as="{{vm.formRetrieve.password}}"              
											ng-required="true" 
											ng-minlength="4"     
											ng-maxlength="9"   
											id="password_conf" 
											name="password_conf" 
											class="form-control" 
											ng-class="formRetrieve.password_conf.$valid?'is-valid':(formRetrieve.password_conf.$pristine?'border-warning':'is-invalid')" 
											ng-model="vm.formRetrieve.password_conf"
											type="password" 
											class="form-control"/>
									</div>
									<small id="passwordHelpInline" class="text-muted">
										Senha de 4-9 caracteres.
									</small>
								</div>
								<div class="actions mb-4">									
									<button type="submit" ng-click="vm.resetSenha()" ng-disabled="!formRetrieve.$valid" class="btn btn-primary">Resetar</button>
								</div>
								<hr>
								<div class="m-0">
									<span class="additional-link">Já tem uma conta? <a href="/ipet/index.php?page=2">Login</a></span>
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

		<!-- Required jQuery first, then Bootstrap Bundle JS -->


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="vendor/slimscroll/slimscroll.min.js"></script>
		<script src="vendor/slimscroll/custom-scrollbar.js"></script>

		<!-- Daterange -->
		<script src="vendor/daterange/daterange.js"></script>
		<script src="vendor/daterange/custom-daterange.js"></script>

		<!-- Main Js Required -->
		<script src="js/main.js"></script>
	</body>
</html>