<?php
   /*
   Display Template Name: Contact Page
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
      <h1 class="text-center middle_txt"><?php echo the_title();?></h1>
      <div class="bredcrumb"> <!-- <a href="<?php //echo esc_url( home_url( '/' ) ); ?>">Home /</a>  <?php //the_title();?> --> </div>
   </div>
</div>
<!--Main-Header-Banner Part-->
<!--Address Section-Start-->        
<div class="contact-us-sec">
   <div class="container">
      <div class="contact-head-sec">
         <div class="contact-main-tittle">
            <h2 class="text-center main-text"><?php the_field('getting_in_touch');?></h2>
         </div>
         <p><?php the_field('head_sub_content');?></p>
      </div>
      <div class="contact-details">
         <div class="row get-tuch">
            <?php
               if( have_rows('head_content') ):
                  $i = 0; 
                 while ( have_rows('head_content') ) : the_row();
                 ?>
            <div class="col-lg-4 col-md-4">
               <div class="get-in-touch">
                  <div class="get-in-touch-img">   <img src="<?php echo the_sub_field('icon');?>">
                     <?php if(get_sub_field('link')){ ?>
                  </div>
                  <a href="<?php the_sub_field('link');?>"><?php echo the_sub_field('content');?></a>
                  <?php } else { ?>
                  <p><?php echo the_sub_field('content');?></p>
                  <?php } ?>
               </div>
            </div>
            <?php
               $i++;
               endwhile; ?>
            <?php
               else :
                   // no rows found
               endif;
               ?>
         </div>
      </div>
   </div>
</div>
</div>
<!--Address Section-End--> 
<!--Touch-With-Us-Sec-Start-->
<div class="contact-us">
   <div class="container">
      <div class="touch-head-sec">
         <div class="theme-title">
            <h2><?php echo get_field('touch_with_us');?></h2>
         </div>
         
      </div>
      <div class="row">
         <div class="col-lg-6 col-md-6">
            <div class="contact-form">
               <?php echo do_shortcode('[contact-form-7 id="162" title="Contact Us"]');?>
            </div>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="contact-map">
               <?php echo get_field('map');?>
            </div>
         </div>
      </div>
   </div>
</div>

<!--Touch-With-Us-Sec-End-->
<?php endwhile;?>
<?php get_footer(); ?>