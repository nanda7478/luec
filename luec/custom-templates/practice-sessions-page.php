<?php
/*
 Display Template Name: Practice Sessions
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
      Improve Faster
    </h1>
  </div>
</div>
<!--Start-Price-Purchase-Section-->


<!-- stap 1 of 3 -->

<?php if( have_rows('sessions_purchase', 'option')): 
	$i = 0; 
	$latter = 1;
	?>
<div class="luec_payment">
	<div class="container">
		<div class="title_header">
			<h2>Purchase your one-on-one LUEC “Deep Practice” training sessions.</h2>
			<h5>Step 1 of 3</h5>
			<h4>Choose your package</h4>
		</div>
		<div class="row">
			<?php   while ( have_rows('sessions_purchase', 'option') ) : the_row();  ?>
				<div class="col-md-4">
					<div class="price_block">
						<span class="package"> Package <?php echo $latter; ?> </span>
						<p><?php the_sub_field('purchase_content', 'option');?></p>						
						<span class="price"><span>US</span> $<?php the_sub_field('purchase_price', 'option');?> </span>

						<form action="<?php echo site_url(); ?>/payment/" method="get">
							<input type="hidden" name="session_package" value="<?php echo $i; ?>">
							<input type="submit" class="submit btn" value="Buy Now">
						</form>
					</div>
				</div>
			<?php 
			$latter++;
			$i++;
			endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>


    <?php
endwhile;
?>

<?php
get_footer();
?>