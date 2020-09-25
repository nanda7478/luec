<?php
   /*
   Display Template Name: Trial Page
   */
   get_header();

   while ( have_posts() ) :
          the_post();
   ?> 

<?php $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
<div class="banner-image"> 
  <!-- <div id="particles-js"></div> -->
<div class="banner-content">   
 
 <div class="banner_text text-center">
     <div class="container">
        <div class="row">
            <div class="col-12">
                    <h1><!--Get the IELTS speaking band you need 10 X faster-->FREE TRIAL-LUEC SPEECH COACHING FOR IELTS</h1>
<!--                     <p class="f-36"> <i style="display:block; clear:both;">   LUEC Free Trial </i>   -->
<!--                     Skyrocket Your IELTS Speaking Band Level!</p> -->
                </div>
</div></div></div>

</div>
</div>
<!-- 
<div class="free-contents">
  <div class="container">
<div class="row">  
<div class="col-12">

 <p><i class="red"> Failing to get the IELTS speaking band you need feels awful. </i> </p>
<p>LUEC is the online speech coaching you need to quickly get your  <br/>
 IELTS speaking band and move forward with your life. </p>
</div>
</div>
</div>
</div>

 -->
<!--Main-Header-Banner Part-->
<?php $pannel_1 = get_field('panal_1');  ?>

<div class="Get-in-touch-sec get-free">
  <div class="Get-in-staps">
    <div class="container">
      <div class="free-tirl-box">
        <div class="text">
  
<h2>Sign Up For Your Free Trial  </h2>
<h3>Fill in your details using the form below and receive <br /> 
  <i class="blues" style="font-weight:bold;"> 3 x LUEC Speech Coaching Lessons </i>  <br />
   free of charge</h3>

       <!--    <h4>   <?php echo $pannel_1['get_in_touch_title']; ?></h4>
          <p> <?php echo $pannel_1['get_in_tuch_subtitle']; ?></p>
     -->   


      </div>
      </div>
    <div class=" luce-form">
      <?php echo $pannel_1['get_in_tuch_form']; ?>
      
      <!-- <p class="f-36">Most students raise their speaking band by <i class="greens"> 1 point </i> in less than<br /> <i class="blues"> 10 hours </i> of LUEC coaching <br/>
 (40 - 60 LUEC speech coaching modules). </p> -->
    </div>
    </div>
  </div>
</div>
<?php endwhile;?>


<!-- <div class="sec-3">
  <div class="container">
<div class="row">
 

<div class="col-sm-6">
<div class="m-img">
<img class="d" src="https://www.levelupenglishcoaching.com/wp-content/themes/luec/image/fklshgdh.jpg">
<img class="m" src="https://www.levelupenglishcoaching.com/wp-content/themes/luec/image/sharpe.png">
</div>
<h4 class="safaf"> Complete your free <br /> <i class="blues">  LUEC speech 
coaching modules </i> on your smart device 
anytime and anywhere </h4>
</div>
<div class="col-sm-6">
<img src="https://www.levelupenglishcoaching.com/wp-content/themes/luec/image/target-img.jpg">
<h4> Sign up for your free trial <br />
 below and receive  <br /> <i class="blues"> 3 
 LUEC speech coaching modules </i> <br /> so you 
 can experience the improvement </h4>
</div>


</div>
</div>
</div> -->



<?php get_footer(); ?>