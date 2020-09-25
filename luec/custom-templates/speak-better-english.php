<?php
   /*
   Display Template Name: Speak Better English
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
  </div>
</div>
<!--Start-Price-Purchase-Section-->


<!-- stap 1 of 3 -->

<?php if( have_rows('purchase', 'option')): 
	$i = 0; 
	$latter = 'a';
	?>
<div class="luec_payment">
	<div class="container">
		<div class="title_header">
			<h2>Purchase LUEC speech coaching lessons.</h2>
			<h5>Step 1 of 3</h5>
			<h4>Choose your package</h4>
		</div>
		<div class="row">
			<?php   while ( have_rows('purchase', 'option') ) : the_row();  ?>
				<div class="col-md-4">
					<div class="price_block">
						<span class="package"> <?php echo $latter; ?> </span>
						<p><?php the_sub_field('purchase_content', 'option');?></p>						
						<span class="price"><span>US</span> $<?php the_sub_field('purchase_price', 'option');?> </span>

						<form action="<?php echo site_url(); ?>/payment/" method="get">
							<input type="hidden" name="package" value="<?php echo $i; ?>">
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


<!-- <div class="luec_payment">
<div class="container">
<div class="title_header">
<h2>Purchase LUEC speech coaching modules and obtain the IELTS speaking band you need faster.</h2>
<h5>Step 1 of 3</h5>
<h4>Choose you package</h4>
</div>

<div class="row">
<div class="col-md-4">
<div class="price_block">
	<span class="package">Package 1 </span>
<p><span> 10 x speech coaching modules</span>
(Average 0.3 - 0.6 IELTS band level increase)</p>

<span class="price"><span>US</span> $10.00 </span>

<form action="https://www.levelupenglishcoaching.com/payment/" method="get">
<input type="hidden" name="package" value="0">
<input type="submit" class="submit btn" value="Buy Now">
</form>
 </div>
 </div>
 <div class="col-md-4">
<div class="price_block">
	<span class="package">Package 1 </span>
<p><span> 10 x speech coaching modules</span>

(Average 0.3 - 0.6 IELTS band level increase)</p>

<span class="price"><span>US</span> $10.00 </span>

<form action="https://www.levelupenglishcoaching.com/payment/" method="get">
<input type="hidden" name="package" value="0">
<input type="submit" class="submit btn" value="Buy Now">
</form>
 </div>
 </div>
 <div class="col-md-4">
<div class="price_block">
	<span class="package">Package 1 </span>
<p><span> 10 x speech coaching modules</span>

(Average 0.3 - 0.6 IELTS band level increase)</p>

<span class="price"><span>US</span> $10.00 </span>

<form action="https://www.levelupenglishcoaching.com/payment/" method="get">
<input type="hidden" name="package" value="0">
<input type="submit" class="submit btn" value="Buy Now">
</form>
 </div>
 </div>
</div>
</div>
 </div> -->


<!-- stap 2 of 3 -->
<!-- 
 <div class="luec_payment">
<div class="container">
<div class="title_header">
	<h2>Purchase LUEC speech coaching modules and obtain the IELTS speaking band you need faster.</h2>
	<h5>Step 2 of 3</h5>
	<h4>You have selected Package 1-7 LUEC Speech Coaching Modules</br> Package Amount = <span>$30.00.</span></h4>
</div>

<div class="row">

<form action="https://www.levelupenglishcoaching.com/payment-process/" method="POST" class="payple_form" id="paypalSubmit" novalidate="novalidate">
		<h2>Payment Information</h2>
		<div class="row">
			<div class="col-12 form-group">
				<input type="hidden" name="package[id]" value="0">
				<input type="hidden" name="package[name]" value="<span>Package 1</span> - 7 LUEC Speech Coaching Modules">
				<input type="hidden" name="package[amount]" value="10.00">
				<input type="hidden" name="package[street]" value="21 Fenton Drive">
				<input type="hidden" name="package[city]" value="Tallebudgera">
				<input type="hidden" name="package[state]" value="Queensland">
				<input type="hidden" name="package[zip]" value="4228">
				<input type="hidden" name="package[country_code]" value="AU">	
			</div>
			<div class="col-12 form-group">
				<input type="text" name="package[first_name]" class="input_fild" placeholder="First Name" required="required" aria-required="true">
			</div>
			<div class="col-12 form-group">
				<input type="text" name="package[last_name]" class="input_fild" placeholder="Last Name" required="required" aria-required="true">
			</div>
			<div class="col-12 form-group">
				<input type="email" name="package[email]" class="input_fild" placeholder="Email" required="required" aria-required="true">
			</div>
			<div class="col-12 form-group">
				<input type="tel" name="package[phone]" class="input_fild" placeholder="Phone Number" required="required" aria-required="true">
			</div>

				<div class="col-12 form-group">
					<select name="package[paymentoption]" class="input_fild" id="payoption_paypal">
						<option value="card" selected="selected">Card</option>
						<option value="paypal">Paypal</option>
					</select>
				</div>

				<div class="cardInfo row"> 
					<div class="col-md-12 col-12 form-group">
					<h6>Card Details</h6>
				</div>
					<div class="col-md-12 col-12 form-group">
						<input type="text" name="package[card_number]" class="input_fild" placeholder="Card Number" id="cardNumber">
					</div>
					<input type="hidden" name="package[card_type]"  class="input_fild"id="cardType" placeholder="Card Type">
					<div class="col-md-4 col-12 form-group">
						<select name="package[expiry_date][month]" class="input_fild">
												<option value="">--Month--</option>
												<option value="01">01</option>
												<option value="02">02</option>
												<option value="03">03</option>
												<option value="04">04</option>
												<option value="05">05</option>
												<option value="06">06</option>
												<option value="07">07</option>
												<option value="08">08</option>
												<option value="09">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												</select>
					</div>
					<div class="col-md-4 col-12 form-group">
						<select name="package[expiry_date][year]" class="input_fild">
												<option value="">--Year--</option>
												<option value="2020">2020</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
												<option value="2026">2026</option>
												</select>
					</div>
					<div class="col-md-4 col-12 form-group" >
						<input type="text" name="package[cvv2]"  class="input_fild" placeholder="CVV2">
					</div>
					<div class="col-md-12 col-12 form-group">
						<div class="submit-button">
							<input type="image" src="https://www.levelupenglishcoaching.com/wp-content/uploads/2019/08/paypal_pay.png"  class="submin_btn" name="package[submit]" value="Pay With Card">
						</div>
					</div>	
				</div>

			<div class="col-md-12 col-12 form-group">
				<div class="submit-button">
					<input type="image" name="package[submit]" class="submin_btn" style="display: none;" src="https://www.levelupenglishcoaching.com/wp-content/uploads/2019/08/paypal_pay.png" id="paywithpaypal" value="Pay with PayPal">
				</div>
			</div>
		</div>
		</form>



 </div>
 </div>
 </div>







<div class="luec_payment">
<div class="container">
<div class="title_header">
<h5>Step 3 of 3</h5>

<h2>Payment Received!</h2>

<h2>Your Payment wes successful.</h2>
</div>
<div class="row">
<div class="col-12 conformation_text">



<p>We have sent you email confiming your purchase and you should receive your first <br>speech coaching module within 24 hours.</p>

<p>If you have any queries or if you do not receive you first speech coaching module then please contact us using one of the following channels:</p>

<div class="contact_text">
<p>LUEC Whatsapp: +5511977704618</p>
<p>Phone : +61451094375</p>
<p>Email: luecenglish@gmail.com</p>
</div>
</div>
</div>
</div>
</div>  -->


    <?php
endwhile;
?>
<?php get_footer(); ?>