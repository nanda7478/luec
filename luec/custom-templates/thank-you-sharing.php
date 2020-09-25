<?php
   /*
   Display Template Name: Thank You Sharing
   */
   get_header();?>
<?php
   while ( have_posts() ) :
          the_post();
   ?> 
<!--Main-Header-Banner Part-->
<!-- <?php $feat_image //= wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?> -->
<div class="banner-image">
   <!-- <div id="particles-js"></div> -->
   <div class="banner-content">
      <h1 class="text-center middle_txt">Thank You Sharing</h1>
      <div class="bredcrumb"> <!-- <a href="<?php //echo esc_url( home_url( '/' ) ); ?>">Home /</a>  <?php //the_title();?> --> </div>
   </div>
</div>
<!--Main-Header-Banner Part-->
<!--Address Section-Start-->        
<div class="thanks_section">
   <div class="container">
   <div class="content_section">
      <?php the_content();?>
   </div>
</div>
</div>


<!--Touch-With-Us-Sec-End-->
<?php endwhile;?>
<?php get_footer(); ?>