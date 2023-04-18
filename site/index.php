<?php
	require_once('config.php');
?>
<!DOCTYPE html>

<html ng-app="app">

	<head>
		<!-- Morenizr -->
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/jquery.bxslider/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/jquery.isotope.js"></script>
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/jquery.parallax-1.1.3.js"></script>
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/knob/js/jquery.knob.js"></script>	
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/modernizr.min.js"></script>
		<script src="<?=$Globals["SiteFull"]?>../node_modules/angular/angular.min.js"></script>		
		<script src="<?=$Globals["SiteFull"]?>../node_modules/toastr/build/toastr.min.js"></script>
	
	

		<meta charset="utf-8" />
		<title>iPet</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="Author" content="" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

		<!-- WEB FONTS -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="<?=$Globals["SiteFull"]?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- <link rel="stylesheet" href="../node_modules/"> -->
		<link href="<?=$Globals["SiteFull"]?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
		<link href="<?=$Globals["SiteFull"]?>assets/plugins/owl-carousel/owl.pack.css" rel="stylesheet" type="text/css" />
		<link href="<?=$Globals["SiteFull"]?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
		<link href="<?=$Globals["SiteFull"]?>assets/plugins/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="<?=$Globals["SiteFull"]?>assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="<?=$Globals["SiteFull"]?>assets/css/layout.css" rel="stylesheet" type="text/css" />
		<link href="<?=$Globals["SiteFull"]?>../node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css" />
		<link href="<?=$Globals["SiteFull"]?>../node_modules/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		
		<!--<link href="assets/css/color_scheme/orange.css" rel="stylesheet" type="text/css" />-->		
		<link href="<?=$Globals["SiteFull"]?>assets/plugins/styleswitcher/styleswitcher.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?=$Globals["SiteFull"]?>assets/css/main.css" />			
		<!-- /STYLESWITCHER - REMOVE ON PRODUCTION/DEVELOPMENT -->	
		
	</head>
	<body data-spy="scroll" data-offset="20" data-target="#navbar-collapse" ng-controller="ControllerSite as st" >

	
		<!-- Loading starts -->
		<div id="loading-wrapper" ng-show="st.loading">
			<div class="spinner-border" role="status">
				Carregando...
			</div>
		</div>


		<div id="showSwitcher" class="styleSecondColor"><i class="fa fa-angle-double-right"></i></div>
		<!-- /STYLESWITCHER -->
		<!-- HOME -->
		<section id="home" class="parallax">
			<span class="overlay"><!-- black - 0.2% transparent --></span>

			<!-- background slider images -->
			<div class="slider" style="background:url('<?=$Globals["SiteFull"]?>assets/images/demo/slider/flickr_12.jpg')"></div>
			<div class="slider" style="background:url('<?=$Globals["SiteFull"]?>assets/images/demo/slider/flickr_20.jpg')"></div>
			<div class="slider" style="background:url('<?=$Globals["SiteFull"]?>assets/images/demo/slider/flickr_11.jpg')"></div>

			<div class="table">
				<div class="table-cell">

					<!-- home text slider -->
					<ul class="text-slider">
						<li>
							<h1>Bem vindo(a) ao <span>iPet</span></h1>
						</li>
						<!-- <li>
							<h1>Seu Pet em um Clique<span>Pet</span></h1>
						</li> -->
					</ul>

					<!-- home text slogan / static -->
					<h6>Dê o primero passo para encontrar seu Pet.</h6>
					<a href="#about" class="scrollTo btn btn-default">Início</a>
				</div>
			</div>
		</section>
		<!-- /HOME -->

		<!-- TOP NAV -->
		<section id="header">

			<nav class="navbar navbar-inverse" role="navigation"><!-- add "white" class for white nav bar -->
				<div class="container">

					<!-- Mobile Menu Button -->
					<button id="mobileMenu" class="fa fa-bars" type="button" data-toggle="collapse" data-target=".navbar-collapse"></button>

					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a href="#home" class="scrollTo navbar-brand" title="Amunra One Page Template">
							<img alt="Bootstrap Templates &amp; Themes" src="<?=$Globals["SiteFull"]?>assets/images/ipet_145x45.png" width="145" height="40"> 
						</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div id="navbar-collapse" class="collapse navbar-collapse">

						<ul class="nav navbar-nav navbar-right"><!-- remove scrollTo class for external/real link -->
							<li><a class="scrollTo" href="#home">INÍCIO</a></li>
							<li><a class="scrollTo" href="#about">SOBRE NÓS</a></li>						
							<li><a class="scrollTo" href="#work">PETS DESAPARECIDOS</a></li>												
							<li><a href="?page=2">ADMIN</a></li>
						</ul>

					</div><!-- /.navbar-collapse -->

				</div>
			</nav>

		</section>
		<!-- /TOP NAV -->

		
		<!-- /FEATURED -->

		<!-- WELCOME -->
		<section id="about">
			<div class="container">

				<header>
					<h1>Bem vindo a plataforma <span>iPet</span></h1>
					<p>O principal <span>desafio</span> para as pessoas que <span>perdem seus pets</span> é a falta de informação centralizada,
						 pois elas
						acabam colocando vários anúncios em
						plataformas diferentes, com isso, vem a
						<span>insegurança e muito informação
						descentralizada.</span></p>
					<p>
						Pensando nisso, o iPet foi desenvolvido
						para suprir essa demanda de pessoas
						que perderam seus pets e de pessoas
						que encontraram pets, de <span>forma
						centralizada e segura </span> tudo em uma única plataforma. 
					</p>
				</header>
				<div class="text-center">
					<img class="img-responsive" src="<?=$Globals["SiteFull"]?>assets/images/demo/devices.png" alt="" />
				</div>
				
			</div>
		</section>
		<!-- /WELCOME -->	

		<!-- PORTFOLIO -->
		<section id="work" class="alternate">
			<div class="container">
				<a href="#" class="toTop up fa fa-chevron-up"><!-- arrow up - go home --></a>

				<header>
					<h1>Pets Desaparecidos</h1>
					<p><span>iPet é uma comunidade de pessoas apaixonadas pelos seus PETs.</span> </p>
					<p>E nós da iPet valorizamos isso, e também prezamos pela segurança dos nossos usuários, por isso, recomendamos <span>muito cuidado</span> ao responder contatos de pessoas que não estão cadastradas na plataforma.</p>
				</header>

				<!-- PORTFOLIO ITEMS -->
				<div id="portfolio">

					<div class="text-center">

						<ul class="nav nav-pills isotope-filter isotope-filter" data-sort-id="isotope-list" data-option-key="filter">
							<li data-option-value="*" class="active"><a href="#">Pets</a></li>
							<!-- <li data-option-value=".development"><a href="#">Cachorro</a></li>
							<li data-option-value=".photography"><a href="#">Gatos</a></li>
							<li data-option-value=".design"><a href="#">Outros</a></li> -->
						</ul>

						<hr class="menu-lines" /><!-- lines -->

					</div>

					<div class="row portfolio-items">
						<ul class="sort-destination isotope" data-sort-id="isotope-list">
							<li class="isotope-item col-sm-6 col-md-4 development" ng-repeat="pet in st.listaDePets" ><!-- item 8 -->
								<div class="item-box">
									<figure>										
										<img class="img-responsive" src="<?=$Globals["internetFiles"]?>profilePet_{{pet.iduser}}{{pet.idpets}}.jpg" style="max-width: 356px;">
									</figure>
									<div class="item-box-desc">										
										<small class="styleColor"><strong>Nome:</strong> {{pet.nome}}</small>
										<small class="styleColor"><strong>Especíe:</strong> {{pet.especie}}</small>
										<small class="styleColor"><strong>Raça:</strong> {{pet.raca}}</small>
										<small class="styleColor"><strong>Idade:</strong> {{pet.idade}}</small>
										<small class="styleColor"><strong>Sexo:</strong> {{pet.sexo}}</small>
										<small class="styleColor"><strong>Cor Predominante:</strong> {{pet.predominante}}</small>
										<small class="styleColor"><strong>Data Desaparecimento:</strong> {{pet.data | date:'dd/MM/yyyy'}} </small>									
										<small class="styleColor"><strong>Cidade:</strong> {{pet.cidade}} </small>
										<small class="styleColor"><strong>Bairro:</strong> {{pet.bairro}}</small>
										<small><iframe width="310" height="150"  style="border:0" loading="lazy" allowfullscreen  referrerpolicy="no-referrer-when-downgrade" ng-src="{{pet.location}}"></iframe></small>
										<small><button ng-click="st.openModalEncontrei(pet)" class="btn btn-success btn-block btn-sm">Encontrei</button></small>
									</div>
								</div>
							</li>
							<li ng-if="st.listaDePets.length == 0" class="text-center"><p><strong>Ótima notícia!</strong></p> Nenhum PET dos nossos usuários se encontra perdido no momento.</li>
						</ul>
					</div><!-- /.masonry-container -->
				</div>
				<!-- PORTFOLIO ITEMS -->
			</div>
		</section>
		<!-- /PORTFOLIO -->		
	
		<!-- FOOTER -->
		<footer>
			<p><!-- class="alternate" -->
				MBA FULL STACK &bull; 2022 &bull; All Rights Reserved
			</p>
			<div class="socials">
				<a href="#" class="social fa fa-facebook"></a>
				<a href="#" class="social fa fa-twitter"></a>
				<a href="#" class="social fa fa-google-plus"></a>
				<a href="#" class="social fa fa-linkedin"></a>
			</div>
		</footer>
		<div class="modal fade" id="openModalEncontrei" tabindex="-1" role="dialog" aria-labelledby="openModalEncontreiLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="openModalEncontreiLabel">Enviar mensagem:</h4>
				</div>
				<div class="modal-body">
					<form id="formEncontrei" name="formEncontrei"  >
						<div class="form-group">
							<label for="email" class="control-label">Email:</label>
							<input 
								type="email" 
								class="form-control" 
								id="email" 
								name="email"
								autocomplete="off"
								ng-attr-placeholder="Digite seu e-mail"                      
								ng-required="true"
								ng-model="st.modelEncontrei.email"
								ng-class="formEncontrei.email.$valid?'is-valid':(formEncontrei.email.$pristine?'border-warning':'is-invalid')">
						</div>
						<div class="form-group">
							<label for="tel" class="control-label">Telefone:</label>
							<input 
								type="tel" 
								ng-attr-placeholder="Digite seu telefone" 
								class="form-control" 
								id="tel" 
								name="tel"
								autocomplete="off"
								ng-required="true"
								ng-model="st.modelEncontrei.tel"
								ng-class="formEncontrei.tel.$valid?'is-valid':(formEncontrei.tel.$pristine?'border-warning':'is-invalid')">
						</div>					
						<div class="form-group">
							<label for="msn" class="control-label">Mensagem:</label>
							<textarea 
								autocomplete="off"
								ng-attr-placeholder="Digite uma mensagem" 
								cols="4" 
								ng-required="true"
								rows="4" 
								class="form-control" 
								id="msn" 
								name="msn" 
								ng-model="st.modelEncontrei.msn"
								ng-class="formEncontrei.msn.$valid?'is-valid':(formEncontrei.msn.$pristine?'border-warning':'is-invalid')">
							</textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
					<button ng-disabled="formEncontrei.$invalid" ng-click="st.enviar()" type="button" class="btn btn-primary btn-sm">Enviar</button>
				</div>
				</div>
			</div>
		</div>
		<!-- /FOOTER -->
		<!-- JAVASCRIPT FILES -->		
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/owl-carousel/owl.carousel.min.js"></script>
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/js/scripts.js"></script>		
		<!-- STYLESWITCHER - REMOVE ON PRODUCTION/DEVELOPMENT -->
		<script type="text/javascript" src="<?=$Globals["SiteFull"]?>assets/plugins/styleswitcher/styleswitcher.js"></script>		
		<script src="<?=$Globals["SiteFull"]?>../node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>		
		<script src="<?=$Globals["SiteFull"]?>../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
		<script src="<?=$Globals["SiteFull"]?>js/app.js"></script>
		<script>
			const tel = $('input[name=tel]');
		</script>
		<script src="<?=$Globals["SiteFull"]?>js/controller_site.js"></script>
	</body>
</html>