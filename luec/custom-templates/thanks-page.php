<?php
   /*
   Display Template Name: Thanks
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
      <h1 class="text-center middle_txt">Thank You</h1>
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
   <div class="button_section">
      <a class="free-trial-button" href="#" data-toggle="modal" data-target="#exampleModal">Share with a friend</a>
   </div>
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Know someone who needs to improve their English speaking band level?</h4>
        <p>Send them the "Old Way - New Way" speaking exercise so that they can improve their speaking band level in the fastest (free) way possible. Send your friend the exercise by filling in the form below.</p>
        <div class="share_form">
        	<?php echo do_shortcode('[contact-form-7 id="1226" title="Share Friend form"]');?>
        </div>
      </div>
      
    </div>
  </div>
</div>
</div>
</div>


<!--Touch-With-Us-Sec-End-->
<?php endwhile;?>
<?php get_footer(); ?>