<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/all.css">

	<script src="<?php bloginfo('template_url');?>/js/jquery.min.js"></script> 

	<script src="<?php bloginfo('template_url');?>/js/bootstrap.min.js"></script>
	
	<style type="text/css">


.sgpb-theme-1-overlay { background: #000 !important;  }

  

.sgpb-popup-dialog-main-div-wrapper .sgpb-theme-1-content { background: none !important; border: none !important; 
	box-shadow: none !important;   display: block; width:600px !important; color: #fff; border: none; padding: 0px; margin: 0px; }

.sgpb-popup-dialog-main-div-wrapper .sgpb-theme-1-content h3{  color: #fff; font-size:28px; line-height: 1.4;  margin-bottom: 20px;  } 

.sgpb-popup-dialog-main-div-wrapper .sgpb-theme-1-content .form-group { max-width:380px; }

.sgpb-popup-dialog-main-div-wrapper .form-group input.wpcf7-submit { width: 100%;  background-color: #147bcd;
    background: -webkit-gradient(linear, left top, left bottom, from(#51a9ee), to(#147bcd));
    background: -webkit-linear-gradient(#51a9ee, #147bcd);
    background: linear-gradient(#51a9ee, #147bcd);
    border-color: #1482d0;
    text-decoration: none; border-radius: 8px;
    color:#fff; font-size:18px; padding:7px; outline: none; cursor: pointer; }

    .sgpb-popup-dialog-main-div-theme-wrapper-1 .sgpb-popup-close-button-1 { top:0px; right:-15px !important; bottom: auto; }


.page-template-sharing-friend .banner-image { display: none; } 

.shared_section { background: #fafafa; padding: 40px 0; margin: 0px;  font-size:16px;  } 



.shared_section h4 { font-size:40px; margin-bottom: 20px; }

.page-template-thank-you-sharing .content_section,
.shared_section .content_section { max-width: 600px; margin: auto; text-align: center; }

.shared_section .content_section label { width: 100%; text-align: left; text-transform: uppercase; }

.shared_section .content_section span { width: 100%; display: block; margin-top:5px; }

.shared_section input.wpcf7-text  { padding: 10px; border:1px solid #ccc; width: 100%; border-radius: 8px; background: none;  }

.shared_section .wpcf7-submit { background: #107cd2; color: #fff; cursor: pointer; text-transform: uppercase; font-size: 20px;  padding: 10px; border-radius: 8px; outline: none; border: none; width: 100%;  }

.shared_section .ajax-loader {  margin: -70px auto auto !important; }    

.shared_section .wpcf7-not-valid-tip { font-size: 13px; font-weight: normal; }

.page-template-thank-you-sharing .banner-image{ display: none; }

.page-template-thank-you-sharing .content_section h2 { font-size: 40px; margin-bottom: 15px;  }

.page-template-thank-you-sharing .content_section { font-size:20px; padding: 50px 0; }

.thanks_message_show { text-align: center; font-size: 18px;  }

.thanks_message_show p { line-height: 1.5 !important; }

.thanks_message_show strong { font-size: 36px; }
.thanks_message_show p { margin: 10px 0!important; }
.thanks_message_show .button_section { padding-top: 15px; }

.sgpb-popup-dialog-main-div-theme-wrapper-1  { max-width:600px !important;  }

.sgpb-popup-dialog-main-div-wrapper .sgpb-theme-1-content .form-group { position: relative; }

.sgpb-popup-dialog-main-div-wrapper div.wpcf7 .ajax-loader { position: absolute; top: 10px; left: 50%; margin-left: -10px; }


@media(max-width:767px) {

.shared_section h4 { font-size: 28px; }


.sgpb-popup-dialog-main-div-wrapper .sgpb-theme-1-content h3 { font-size:20px; }

.page-template-thank-you-sharing .content_section,
.shared_section{ font-size: 16px; }


}


</style>
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WTQQ77M');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WTQQ77M"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-4">
						<?php twentysixteen_the_custom_logo(); ?>
					</div>
					<div class="col-md-8 col-8">
						<?php dynamic_sidebar('free-trial-button-mobile'); ?>
						<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
							<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'twentysixteen' ); ?>
								 <i class="fas fa-bars"></i>
								</button>

							<div id="site-header-menu" class="site-header-menu">
								<?php if ( has_nav_menu( 'primary' ) ) : ?>
									<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
									<?php
										wp_nav_menu(
											array(
											'theme_location' => 'primary',
											'menu_class' => 'primary-menu',
											)
										);
										// pll_the_languages( array( 'dropdown' => 1 ) );
									?>
									<!-- <script type="text/javascript">
									$('#lang_choice_1 option, #lang_choice_polylang-2 option').each(function(){
										$(this).text($(this).val());
									});
									</script> -->
									</nav><!-- .main-navigation -->
								<?php endif; ?>
							</div><!-- .site-header-menu -->
						<?php endif; ?>
					</div>
				</div>
			</div>
		</header><!-- .site-header -->
	</div>
</div>

<!-- <?php// if ( is_front_page() ): ?>
	

<?php// while ( have_posts() ) : the_post();?>

<div class="attain">
	<div class="container">
		<img src="<?php// the_field('banner_ima', 'option'); ?>" alt=""  usemap="#Map" />
<div class="home_btn">
          <a href="https://www.levelupenglishcoaching.com/speak-better-english/" class="free-trial-button" shape="poly" coords="542,467,380,643,975,641,802,471,547,467">  Speak Better English - Start Now </a>


	</div>
</div>
<div class="attain-description">
	<div class="container">
		<?php //the_field('attain_description', 'option'); ?>
	</div>
</div>

<?php// endwhile; ?>

<?php// endif; ?> -->

		<div id="content" class="site-content">
<script type="text/javascript">
  jQuery(window).scroll(function(){
  var sticky = jQuery('.site-header'),
      scroll = jQuery(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
</script>