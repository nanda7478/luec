<?php
   /*
   Display Template Name: Privacy Page
   */
   get_header();
   ?>

<?php
while ( have_posts() ) :
        the_post();
?> 

          <!-- <?php $feat_image //= wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?> -->
          <div class="banner-image"> 
   <div id="particles-js"></div>
          <div class="banner-content">  <h1 class="text-center middle_txt"><?php echo the_title();?></h1>
            <div class="bredcrumb"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home /</a>  <?php the_title();?> </div></div>
          </div>
          <div class="terms-condition">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php the_content(); ?>
              </div>
              
            </div>
          </div>
</div>
   <?php endwhile;?>

   <?php get_footer(); ?>