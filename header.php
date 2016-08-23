<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<title>Prototipo</title>
		<link rel="icon" type="image/x-icon" href="<?php echo get_bloginfo('template_directory');?>/img/favicon/favicon.ico" />
		<link rel="icon" type="image/png" href="<?php echo get_bloginfo('template_directory');?>/img/favicon/favicon.png" />
		<link rel="icon" type="image/gif" href="<?php echo get_bloginfo('template_directory');?>/img/favicon/favicon.gif" />
		<?php wp_head(); ?>
	</head>
	<?php include (TEMPLATEPATH . '/funciones/logged.php'); $pagename = get_the_title(); ?>
	<body>
		<?php if( $pagename=='Login' ){ ?>
			<div class="indigo sishadow paddingtop75 paddingbot25">
				<div class="container">
					<div class="row paddingbot10 center-align">
						<img src="<?php echo get_bloginfo('template_directory');?>/img/logo150x150.png" class="responsive-img">	
					</div>
				</div>
			</div>
		<?php } else { ?>
			<header>
				<nav id="site-navigation" class="main-navigation indigo darken-3 noshadow" role="navigation">
					<div class="container-fluid">
   						<a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars" aria-hidden="true"></i></a>
   						<ul id="nav-mobile" class="left hide-on-med-and-down">
					        <li>
					        	<a class="text-white"><i class="material-icons left">bookmark</i> <?php echo $pagename; ?></a>
							</li>
					    </ul>
   						<ul id="nav-mobile" class="right">
					        <li class="hide-on-large-only">
					        	<h5 class="text-white"><i class="material-icons left">bookmark</i> <?php echo $pagename; ?></h5>
							</li>
					        <li>
						        <a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons">more_vert</i></a>
								<ul id='dropdown1' class='dropdown-content'>
									<li><a href="#!">one</a></li>
									<li><a href="#!">two</a></li>
									<li class="divider"></li>
									<li><a href="#!">three</a></li>
								</ul>
							</li>
					    </ul>
					</div>
				</nav>
				<?php 
				$accountlink = get_permalink( get_page_by_title( 'Perfil' ) );
				wp_nav_menu( 
					array( 'theme_location' => 'admin', 
					'menu_id' => 'slide-out', 
					'menu_class' => 'side-nav grey lighten-4 fixed', 
					'walker' => new Materialize_Walker_Desktop_Nav_Menu(), 
					'items_wrap' => ' <ul id="%1$s" class="%2$s">
											<li class=" indigo darken-3 center-align">
												<img src="'.get_bloginfo('template_directory').'/img/logo75x75.png" class="responsive-img">
											</li>
											<li class=" indigo darken-3 paddingtop10 paddingbot10">
												<a href="'.$accountlink.'" class="left-align paddingleft15 paddingright15">
													<p class="white-text avatarsidemenu">'. $avatarlogged.' '. $nombrelogged.' '.$apellidologged.'</p>
												</a>
											</li>
											%3$s
										</ul>
										<div class="clear"></div>' ) 
					); ?> 
				</header>  
		<?php }  ?>
		<main>