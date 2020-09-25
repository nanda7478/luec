<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="banner-image"> 
   <div id="particles-js"></div>
          <div class="banner-content">  <h1 class="text-center middle_txt"><?php echo the_title();?></h1>
            <div class="bredcrumb"> <!-- <a href="<?php //echo esc_url( home_url( '/' ) ); ?>">Home /</a>  <?php //the_title();?> --> </div></div>
          </div>
          <div class="container">
          	<div class="row">
          		<div class="col-md-12">
          			<?php the_content(); ?>
          		</div>
          		
          	</div>
          </div>
    </article>      


