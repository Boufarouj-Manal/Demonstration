<?php
	include_once("manager/model.php");
	$model = new Model();

	if ($_POST){
		$model->addUser($_POST['nameUser'],$_POST['emailUser'],$_POST['password'],$_POST['profilelbl']);
	}
?>

<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7" lang="en-US"><![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="en-US"><![endif]-->
<!--[if IE 9 ]><html class="ie9" lang="en-US"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html lang="en-US"><!--<![endif]-->
<head>
	
    <!-- Basic Page Needs -->
	<meta charset="UTF-8">
	
	<title> Programme Formation </title>
	
	<meta name="description" content="HTML5 Theme" /> 
        
    <meta name="robots" content="index, follow" />

	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=EmulateIE8; IE=EDGE" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="js/excanvas.min.js"></script>
	<![endif]-->
    
    
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
    
	<!-- Favicons -->
	
    <link href="images/favicon.ico" rel="shortcut icon" /> 
	
	<!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Marcellus:400,400italic,700,700italic%7CMarcellus:400,400italic,700,700italic%7CMarcellus:400,400italic,700,700italic%7CMarcellus:400,400italic,700,700italic%7CMarcellus:400,400italic,700,700italic%7CMarcellus:400,400italic,700,700italic%7CPT+Sans:400,400italic,700,700italic%7CPT+Sans:400,400italic,700,700italic%7C' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" type="text/css">

	<!-- Stylesheets -->
    <link rel='stylesheet' id='stylesheet-css'  href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='icons-css'  href='css/icons.css' type='text/css' media='all' />
    <link rel='stylesheet' id='animate-css'  href='css/animate.css' type='text/css' media='all' />
	<link rel='stylesheet' id='shortcodes-css'  href='css/shortcodes.css?ver=1.0' type='text/css' media='all' />
    <link rel='stylesheet' id='revslider-css'  href='css/settings.css' type='text/css' media='all' />
	<link rel='stylesheet' id='ms-main-css'  href='css/masterslider.main.css?ver=2.3.0' type='text/css' media='all' />

    <!-- Responsive CSS -->
    <link rel='stylesheet' id='responsive-css'  href='css/responsive.css' type='text/css' media='all' />

	<!-- Custom CSS -->
    <link rel='stylesheet' id='custom-css'  href='css/custom-styles.css' type='text/css' media='all' />
 
</head>

    
<body class="home page tt_responsive">
	
    <div id="home" >
	
		<div id="layout" class="full">

			<header id="header" class="header_v1">



				<div class="head">

					<div class="row clearfix center">
						<div class="grid_6" >
							<div class="logo">
								<a href="index.html"><img src="images/logo.png" alt="Official" /></a>
							</div><!-- end logo -->



						</div>

						<div class="grid_4" >
							<div class="info">
								<i class="icon-envelope-alt"></i>
								<a href="mailto:info@yourname.com">info@yourname.com</a>
								<i class="icon-phone"></i> +1 (888) 0000

							</div><!-- end info -->
						</div>

						<div class="grid_2" >
							<?php if(!isset($_SESSION['name']) && empty($_SESSION['name'])){ ?>
								<a class='tbutton medium  tbutton1 color4' style="margin-top: 47px;" href='login.php' target='_self' >
									<span><i class="icon-user"></i> Connecte</span>
								</a>
							<?php }else{?>
								<a class='tbutton medium  tbutton1 color4' style="margin-top: 47px;" href='logout.php' target='_self' >
									<span><i class="icon-user"></i> Déconnecte</span>
								</a>
							<?php }?>
						</div>

					</div><!-- row -->

				</div><!-- head -->


				<div class="headdown my_sticky">

					<div class="row clearfix">

						<!-- Menu -->
						<nav class="main">
							<ul id="menu-main" class="sf-menu">
								<li class="menu-item current-menu-item"><a href="index.php">Accueil</a></li>
								<?php if(!empty($_SESSION['name'])){ ?>
									<li class="menu-item"><a href="#">Programme d'étude</a>
										<ul class="sub-menu">

											<?php
											$resultProgramme = $model->getProgramme();
											while($programme = $resultProgramme->fetch_assoc()){
												?>

												<li class="menu-item">

													<a href="#"><?php echo $programme['Programme'];?> </a>
													<ul class="sub-menu">

														<?php foreach($model->getFilierByProgramme($programme['id_Programme']) as $flr) {
															foreach ($model->getFiliere($flr['code_Filiere']) as $filiere) {?>
																<li class="menu-item">
																	<a href="filiere.php?fl=<?php echo $filiere['code_Filiere']; ?>"><?php echo  $filiere["code_Filiere"] ."-" .$filiere["nom_Filiere"]; ?></a>
																</li>
															<?php
															}
														}?>

													</ul>
												</li>

											<?php } ?>
										</ul>
									</li>
								<?php } ?>
								<?php if(!empty($_SESSION['name'])){ ?>
									<li class="menu-item"><a href="#" style="font-size: 14px;color: green;">Administration</a>
										<ul class="sub-menu">
											<?php if ($_SESSION['type']=="admin"){ ?>
												<li class="menu-item"><a href="gestionutilisateur.php">Gestion d'utilisateur</a></li>
											<?php } ?>

											<?php if ($_SESSION['type']=="prof" || $_SESSION['type']=="secr" || $_SESSION['type']=="admin"){   ?>
												<li class="menu-item"><a href="gestionmatiere.php">Gestion Matière</a></li>
											<?php } ?>
											<?php if ($_SESSION['type']=="admin" || $_SESSION['type']=="secr" ){ ?>
												<li class="menu-item"><a href="gestionfiliere.php">Gestion filière</a></li>
											<?php } ?>
										</ul>
									</li>
								<?php } ?>
							</ul>
						</nav><!-- /Menu -->


					</div><!-- row -->

				</div><!-- headdown -->

			</header><!-- end header -->
        	<!-- SLIDER -->   

            <!-- End SLIDER -->
			<div class="breadcrumb-place ">
				<div class="row clearfix">
					<h1 class="page-title">Gestion des utilisateurs</h1>
				</div><!-- row -->
			</div><!-- breadcrumb -->

			<div class="page-content">
				<div class="row clearfix" >
					<div class="grid_12">
						<div class="clearfix" >
							<ul class="tabs">
								<li><a  class="active"  href="#panel-tt1">Ajouter un utiliseteur</a></li>
								<li><a  href="#panel-tt2">Afficher la liste des utilisateurs</a></li>

							</ul>

							<ul class="tabs-content">
								<li  class="active"  id="panel-tt1">

									<div class="ttcf7" id="ttcf7-f5-p261-o2" lang="en-US" dir="ltr">

										<div class="screen-reader-response" ></div>

										<form name="" action="gestionutilisateur.php" method="post" class="ttcf7-form" novalidate>

											<p>Nom d'utilisateur<br />
												<span class="ttcf7-form-control-wrap"><input type="text" name="nameUser" id="nameUser" value="" size="40" class="ttcf7-form-control ttcf7-text"/></span></p>
											<p>e-mail<br />
												<span class="ttcf7-form-control-wrap"><input type="text" name="emailUser" id="emailUser" value="" size="40" class="ttcf7-form-control ttcf7-text"/></span></p>

											<p>Mot de passe<br />
												<span class="ttcf7-form-control-wrap"><input type="password" name="password" id="password" value="" size="40" class="ttcf7-form-control ttcf7-text"/></span></p>

											<p>Profile<br />
												<select style="font-weight: bold" name="profilelbl">
													<option value="">Choississez un profile</option>
													<option value="prof">Professeur</option>
													<option value="admin">Administrateur</option>
													<option value="secr">Secretaire</option>
												</select>
											</p>

											<p><input type="submit" value="Ajouter" class="ttcf7-form-control ttcf7-submit" /></p>

										</form>

									</div>
								</li>
								<li  id="panel-tt2">

									<div class="page-content">

										<div class="row clearfix" >

											<div class="table">
												<table>
													<thead>
													<tr>

														<th scope="col">nom</th>
														<th scope="col">E-mail</th>
														<th scope="col">password</th>
														<th scope="col">Profile</th>
														<th scope="col">Suppression</th>
														<th scope="col">Modification</th>
													</tr>
													</thead>

													<tbody>

													<?php
													$users = $model->getUser();
													while($user = $users->fetch_assoc()){ ?>
														<tr>
															<td><?php echo $user['nom']; ?></td>
															<td><?php echo $user['login']; ?></td>
															<td><?php echo $user['mp']; ?></td>
															<td><?php echo $user['type']; ?></td>
															<td>supp</td>
															<td>mod</td>
														</tr>

													<?php } ?>
													</tbody>

													<tfoot>
													<tr>
														<td colspan="6"></td>
													</tr>
													</tfoot>

												</table>

											</div>

										</div><!-- end row -->

									</div><!-- end page-content -->

								</li>
							</ul>
						</div>
					</div>
				</div>
			</div><!-- end page-content -->
			<footer id="footer"> 
					<span class="copyright">Copyright © 2016 <a href="#">mundiapolis</a>
			</footer><!-- end footer -->
		</div><!-- end layout -->
	
	</div><!-- end frame -->


	<div id="toTop"><i class="icon-angle-up"></i></div><!-- Back to top -->

	<!-- Javascript -->
	<script type='text/javascript' src='js/jquery/jquery.js?ver=1.11.0'></script>
	<script type='text/javascript' src='js/revslider/jquery.themepunch.tools.min.js?rev=4.6.0&#038;ver=3.9.6'></script>
	<script type='text/javascript' src='js/revslider/jquery.themepunch.revolution.min.js?rev=4.6.0&#038;ver=3.9.6'></script>
	<script type='text/javascript' src='js/themetor.js?ver=1.0'></script>
	<script type='text/javascript' src='js/jquery.flexslider-min.js?ver=2.1'></script>
	<script type='text/javascript' src='js/owl.carousel.min.js?ver=2.0.0'></script>
	<script type='text/javascript' src='js/jquery.prettyPhoto.js?ver=3.1.6'></script>
	<script type='text/javascript' src='js/waypoints.min.js?ver=4.3.2'></script>	
	<script type='text/javascript' src='js/jquery.tt_chart.js?ver=4.3.2'></script>
	<script type='text/javascript' src='js/jquery.nicescroll.min.js?ver=3.5.1'></script>
	<script type='text/javascript' src='js/ProgressCircle.js?ver=1'></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type='text/javascript' src='js/custom.js?ver=1.0'></script>


<script type="text/javascript">

	/******************************************
		-	PREPARE PLACEHOLDER FOR SLIDER	-
	******************************************/
	

	var setREVStartSize = function() {
		var	tpopt = new Object();
			tpopt.startwidth = 1040;
			tpopt.startheight = 430;
			tpopt.container = jQuery('#rev_slider_2_1');
			tpopt.fullScreen = "off";
			tpopt.forceFullWidth="off";

		tpopt.container.closest(".rev_slider_wrapper").css({height:tpopt.container.height()});tpopt.width=parseInt(tpopt.container.width(),0);tpopt.height=parseInt(tpopt.container.height(),0);tpopt.bw=tpopt.width/tpopt.startwidth;tpopt.bh=tpopt.height/tpopt.startheight;if(tpopt.bh>tpopt.bw)tpopt.bh=tpopt.bw;if(tpopt.bh<tpopt.bw)tpopt.bw=tpopt.bh;if(tpopt.bw<tpopt.bh)tpopt.bh=tpopt.bw;if(tpopt.bh>1){tpopt.bw=1;tpopt.bh=1}if(tpopt.bw>1){tpopt.bw=1;tpopt.bh=1}tpopt.height=Math.round(tpopt.startheight*(tpopt.width/tpopt.startwidth));if(tpopt.height>tpopt.startheight&&tpopt.autoHeight!="on")tpopt.height=tpopt.startheight;if(tpopt.fullScreen=="on"){tpopt.height=tpopt.bw*tpopt.startheight;var cow=tpopt.container.parent().width();var coh=jQuery(window).height();if(tpopt.fullScreenOffsetContainer!=undefined){try{var offcontainers=tpopt.fullScreenOffsetContainer.split(",");jQuery.each(offcontainers,function(e,t){coh=coh-jQuery(t).outerHeight(true);if(coh<tpopt.minFullScreenHeight)coh=tpopt.minFullScreenHeight})}catch(e){}}tpopt.container.parent().height(coh);tpopt.container.height(coh);tpopt.container.closest(".rev_slider_wrapper").height(coh);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);tpopt.container.css({height:"100%"});tpopt.height=coh;}else{tpopt.container.height(tpopt.height);tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);}
	};

	/* CALL PLACEHOLDER */
	setREVStartSize();


	var tpj=jQuery;
	tpj.noConflict();
	var revapi2;

	tpj(document).ready(function() {

	if(tpj('#rev_slider_2_1').revolution == undefined)
		revslider_showDoubleJqueryError('#rev_slider_2_1');
	else
	   revapi2 = tpj('#rev_slider_2_1').show().revolution(
		{
			dottedOverlay:"none",
			delay:9000,
			startwidth:1040,
			startheight:430,
			hideThumbs:200,

			thumbWidth:100,
			thumbHeight:50,
			thumbAmount:2,
			
									
			simplifyAll:"off",

			navigationType:"bullet",
			navigationArrows:"solo",
			navigationStyle:"navbar-old",

			touchenabled:"on",
			onHoverStop:"on",
			nextSlideOnWindowFocus:"off",

			swipe_threshold: 0.7,
			swipe_min_touches: 1,
			drag_block_vertical: false,
			
									
									
			keyboardNavigation:"off",

			navigationHAlign:"center",
			navigationVAlign:"bottom",
			navigationHOffset:0,
			navigationVOffset:20,

			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,

			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,

			shadow:0,
			fullWidth:"on",
			fullScreen:"off",

			spinner:"spinner3",
			
			stopLoop:"off",
			stopAfterLoops:-1,
			stopAtSlide:-1,

			shuffle:"off",

			autoHeight:"off",
			forceFullWidth:"off",
			
			
			hideTimerBar:"on",
			hideThumbsOnMobile:"off",
			hideNavDelayOnMobile:1500,
			hideBulletsOnMobile:"off",
			hideArrowsOnMobile:"off",
			hideThumbsUnderResolution:0,
            hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			startWithSlide:0					});



		
	});	/*ready*/

</script>
<script>

	jQuery(document).ready(function($) {
		
		// portfolio Carousel /////////////////////////////
		try {

				$("#pc_tt1").owlCarousel({
					items:4,
					loop: true,
					margin:12,
					nav:true,
					navSpeed:700,
					navText:['<i class="icon-angle-right"></i>','<i class="icon-angle-left"></i>'],
					dots:false,
					autoplay:true,
					rtl:false,
					autoplayTimeout:4000,
					autoplaySpeed:700,
					autoplayHoverPause:true,
					responsive : {0 : {items : 1,nav : false}, 480 : {items : 2}, 768 : {items : 4}}
					
				});
				
				
		} catch(e){}
			
	//End Document.ready//
	});	
</script>

<script>
	jQuery(document).ready(function($) {
		
		// Testimonial Javascript /////////////////////////////
		try {

			if ($("#tst_tt1")[0]) {
				jQuery('#tst_tt1').flexslider({
					animation: "slide",
					slideshowSpeed: 8000,
					animationSpeed: 800,
					directionNav: true,
					controlNav: false,
					pauseOnHover: true,
					initDelay: 0,
					randomize: false,
					smoothHeight: true,
					keyboardNav: false
				});
			}
		} catch(e){}

	});	
</script>

<script>
	jQuery(document).ready(function($) {
		
		// Clients Carousel /////////////////////////////
		try {
			
			$("#cc_tt1").owlCarousel({
					items:5,
					loop: true,
					margin:12,
					nav:true,
					navSpeed:700,
					navText:['<i class="icon-angle-right"></i>','<i class="icon-angle-left"></i>'],
					dots:false,
					autoplay:true,
					rtl:false,
					autoplayTimeout:4000,
					autoplaySpeed:700,
					autoplayHoverPause:true,
					responsive : {0 : {items : 1,nav : false}, 480 : {items : 2}, 768 : {items : 5}}
					
				});
	
		} catch(e){}

	});	
</script>

<script>
	jQuery(document).ready(function($) {
		
		// posts Carousel /////////////////////////////
		try {
				
				$("#poc_tt1").owlCarousel({
					items:2,
					loop: true,
					margin:12,
					nav:true,
					navSpeed:700,
					navText:['<i class="icon-angle-right"></i>','<i class="icon-angle-left"></i>'],
					dots:false,
					autoplay:true,
					rtl:false,
					autoplayTimeout:4000,
					autoplaySpeed:700,
					fallbackEasing:'easeInOutExpo',
					autoplayHoverPause:true,
					responsive : {0 : {items : 1,nav : false}, 480 : {items : 2}, 768 : {items : 2}}
					
				});

			
		} catch(e){}
			
	//End Document.ready//
	});	
</script>


</body>
</html>
