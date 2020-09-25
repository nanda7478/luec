<?php
   /*
   Display Template Name: Home Page
   */
   get_header();
   ?>
<?php while ( have_posts() ) : the_post(); ?> 
<!--Start Full_banner Section-->

         
<div class="full-banner-sec">
  <div class="container">
    <div class="banner-inner-content-center">
      <?php echo get_field('banner_content');?>
    </div>
  </div>
</div>
<!--End Full_banner Section-->
<!--Start-What-Does-LUEC-Do Section-->
<div class="what-does-luec-sec">
  <div class="container">
    <div class="luec-inner-sec">
      <h2 class="main-head-top">
        <?php echo get_field('service_tittle');?>
      </h2>
      <p>
        <?php echo get_field('service_content');?>
      </p>
    </div>
  </div>
</div>
<!--End-What-Does-LUEC-Do Section-->
<!--Start-Take-Your-Section-->
<div class="take-your-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <div class="service-section-2-left">
          <h2 class="main-head-top">
            <?php echo get_field('service_section_2');?>
          </h2>
          <p>
            <?php echo get_field('service_sec_2_content');?>
          </p>
        </div>
      </div>
      <!--Service Section Part Start-->
      <div class="col-sm-5">
        <div class="service-section-2-left-right">
          <div class="remov-error">
            <?php if( have_rows('service_img_right') ):
                while ( have_rows('service_img_right') ) : the_row();?>
            <div class="dt-sc-image">
              <div class="slick-item">
                <img src="
                  <?php echo get_sub_field('slide_1');?>">
                </div>
              </div>
              <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="mobile-view">
          <div class="btn-sec col-lg-12">
            <a class="free-trial-button" href="
              <?php the_field('spoken_button_url');?>">
              <?php the_field('spoken_button_title');?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End-Take-Your-Section-->
  <!--Start Your-Spoken-English Part-->
  <div class="spoken-english-sec">
    <div class="container">
      <div class="spoken-head-sec">
        <h2 class="main-head-top">
          <?php the_field('spoken_tittle');?>
        </h2>
        <p>
          <?php the_field('spoken_content');?>
        </p>
      </div>
      <div class="row speak">
        <?php
            if( have_rows('your_spoken') ):
               $i = 0; 
              while ( have_rows('your_spoken') ) : the_row();
              ?>
        <div class="col-lg-4 col-md-4">
          <div class="avoidance-coaching">
            <h3>
              <?php the_sub_field('title');?>
            </h3>
            <?php the_sub_field('content');?>
          </div>
        </div>
        <?php
            $i++;
            endwhile; ?>
        <?php endif; ?>
        <div class="btn-sec col-lg-12">
          <a class="free-trial-button" href="
            <?php the_field('spoken_button_url');?>">
            <?php the_field('spoken_button_title');?>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="testimonial-slider">
    <div class="container">
      <div class="theme-title">
        <h2><?php the_field('testimonial_tittle') ?></h2>
      </div>
      <div class="dt-sc-special-testimonial  custom-style">
        <?php $args = array('post_type' => 'testimonial', 'posts_per_page' => -1, 'order' => 'DESC',);
      $query = new WP_Query($args); ?>
        <div class="dt-sc-special-testimonial-images-holder testimonial-details-nav">
          <?php while($query->have_posts()): $query->the_post();
         $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
          <div class="dt-sc-testimonial-image">
            <img src="
              <?php echo $image[0]; ?>" alt="" />
              <div class="dt-sc-testimonial-author">
                <span class="name">
                  <?php the_title(); ?>
                </span>
                <span>
                  <?php the_field('sub_content');?>
                </span>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
          <div class="dt-sc-special-testimonial-details-holder testimonial-details-for">
            <?php while($query->have_posts()): $query->the_post(); ?>
            <div class="dt-sc-testimonial-description">
              <?php the_content(); ?>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>

<?php endwhile;?>
<?php get_footer(); ?>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
   jQuery('.testimonial-details-nav').slick({
     slidesToShow: 3,
     slidesToScroll: 1,
     asNavFor: '.testimonial-details-for',
     dots: true,
     arrows: true,
     centerMode: true,
     focusOnSelect: true,
responsive: [
    
    
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
		 centerMode: true,
      }
    }
  ]

   });
   
   jQuery('.testimonial-details-for').slick({
     slidesToShow: 1,
     slidesToScroll: 1,
     arrows: false,
     fade: true,
     asNavFor: '.testimonial-details-nav'
   });

   jQuery('.remov-error').slick({
     arrows: true,
     fade: true,
     dots: false,
     autoplay: true,
    autoplaySpeed: 2000,
   });
   
</script>
