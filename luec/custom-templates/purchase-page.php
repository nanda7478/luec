<?php
   /*
   Display Template Name: Purchase Page
   */
   get_header();
   ?>
<?php
while ( have_posts() ) :
        the_post();
?>
<?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
<div class="banner-image">
  <!-- <div id="particles-js"></div> -->
  <div class="banner-content">
    <h1 class="text-center middle_txt">
      <?php the_title();?>
    </h1>
    <div class="bredcrumb">
      <!-- <a href="
      <?php //echo esc_url( home_url( '/' ) ); ?>">Home /</a><?php //the_title();?> -->
    </div>
  </div>
</div>
<!--Start-Price-Purchase-Section-->
<div class="purchase-training">
  <div class="container">
    <div class="touch-head-sec">
      <div class="theme-title">
        <?php if ($_GET['option_type'] == 'cancel') { ?>
        <p style="color: #c6151d;text-align: center;">Your Payment process has been cancel. please try again.</p>
        <?php } ?>
        <h2 class="text-center main-text">
          <?php the_field('training_tittle');?>
        </h2>
      </div>
      <p>
        <?php the_field('training_content');?>
      </p>
    </div>
    <div class="training-block">
      <div class="trainee">
        <?php
         if( have_rows('purchase', pll_current_language('slug')) ):
           $i = 0;
           while ( have_rows('purchase', pll_current_language('slug')) ) : the_row();
           ?>
        <div class="row">
          <div class="col-lg-10 col-md-9 col-12">
            <div class="purchase-inner">
              <div class="purchase-data-inner">
                <p>
                  <?php the_sub_field('purchase_content', pll_current_language('slug'));?>
                </p>
              </div>  
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-12">
            <div class="purchase-inner">
              <div class="purchase-price-inner">
                <p>
                  <span>US</span>$
                  <?php the_sub_field('purchase_price', pll_current_language('slug'));?>
                </p>
              </div>
              <div class="paypal-price">
                <form action="<?php echo site_url(); ?>/payment/" method="get">
					<input type="hidden" name="package" value="<?php echo $i; ?>">
          <input type="hidden" name="type" value="old">
					<?php if(pll_current_language('slug') == 'en'){ ?>
					<input type="submit" class="submit" value="Buy Now">
					<?php } else { ?>
					<input type="submit" class="submit" value="Compre">
					<?php } ?>
                </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
         $i++;
         endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php
endwhile;
?>
<?php get_footer(); ?>