<?php
   /*
   Display Template Name: Speak batter Payment Page
   */
get_header(); ?>


<div class="banner-image"> 
	<div class="banner-content">  <h1 class="text-center middle_txt"><?php the_title();?></h1>
	 	<div class="bredcrumb"> <!-- <a href="<?php //echo esc_url( home_url( '/' ) ); ?>">Home /</a>  <?php //the_title();?>  --></div> 
	</div>
</div>

<div class="luec_payment">
<div class="container">
	
<?php $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
$msg = explode("&msg=",$url);

$error_msg = str_replace('%20', ' ', $msg[1]);

if($msg[1] != ''){
?>
<div class="alert alert-danger">
	<p>⚠ Dear LUEC client. This transaction could not be processed. Please check that your information details such as, valid credit card number, expiry date and CCV are all correctly entered and try again.</p>
</div>
<?php } ?>

<div class="title_header">
<?php
if ($_GET['type'] == 'old') {
 	$product_list = get_field('purchase', pll_current_language('slug'));
 }else{
 	$product_list = get_field('purchase', 'option');
 }

$id = intval($_GET['package']);

if($id > -1 && $id < 6){ 

	$pname = $product_list[$id]['purchase_content'];
	$pprice = $product_list[$id]['purchase_price'];
	echo "<h5>Step 2 of 3</h5>";
	echo '<h4>'. $pname .'</br> Package Amount = <span> $'.$pprice.'</span></h4>';	
?>
</div>

	<div class="row" >
		<form action="<?php echo site_url() ?>/payment-process/" class="payple_form" method="POST" id="paypalSubmit">
		<h2>Payment Information</h2>
		<div class="row">
			<div class="col-12 form-group">
				<input type="hidden" name="package[id]" value="<?php echo $id ?>">
				<input type="hidden" name="package[name]" value="<?php echo $pname ?>">
				<input type="hidden" name="package[amount]" value="<?php echo $pprice ?>">
				<input type="hidden" name="package[street]" value="21 Fenton Drive">
				<input type="hidden" name="package[city]" value="Tallebudgera">
				<input type="hidden" name="package[state]" value="Queensland">
				<input type="hidden" name="package[zip]" value="4228">
				<input type="hidden" name="package[country_code]" value="AU">	
			</div>
			<div class="col-12 form-group">
				<input type="text" name="package[first_name]"  class="input_fild" placeholder="First Name" required="required">
			</div>
			<div class="col-12 form-group">
				<input type="text" name="package[last_name]"  class="input_fild" placeholder="Last Name" required="required">
			</div>
			<div class="col-12 form-group">
				<input type="email" name="package[email]"  class="input_fild" placeholder="Email" required="required">
			</div>
			<div class="col-12 form-group">
				<input type="tel" name="package[phone]"  class="input_fild" placeholder="Phone Number" required="required">
			</div>

				<div class="col-12 form-group">
					<select name="package[paymentoption]"  class="input_fild" id="payoption_paypal">
						<option value="card" selected="selected">Card</option>
						<option value="paypal" >Paypal</option>
					</select>
				</div>

				<div class="cardInfo row"> 
					<div class="col-md-12 col-12 form-group">
						<h6>Card Details</h6>
					</div>
					<div class="col-md-12 col-12 form-group">
						<input type="text" name="package[card_number]"  class="input_fild" placeholder="Card Number" id="cardNumber" maxlength="16">
					</div>
					<input type="hidden" name="package[card_type]"  class="input_fild" id="cardType" placeholder="Card Type">
					<div class="col-md-4 col-12 form-group">
						<select name="package[expiry_date][month]"  class="input_fild">
						<?php $months = ["01","02","03","04","05","06", "07", "08", "09", "10", "11", "12"]  ?>
						<option value = "">--Month--</option>
						<?php for($i = 0; $i < 12; $i++) { ?>
						<option value="<?php echo $months[$i] ?>"><?php echo $months[$i] ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="col-md-4 col-12 form-group">
						<select name="package[expiry_date][year]"  class="input_fild">
						<?php $year_start = date("Y");  ?>
						<option value = "">--Year--</option>
						<?php for($i = $year_start;  $i < $year_start+7; $i++) { ?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php } ?>
						</select>
					</div>
					<div class="col-md-4 col-12 form-group">
						<input type="text" name="package[cvv2]"  class="input_fild" placeholder="CVV2" maxlength="3">
					</div>
					<div class="col-md-12 col-12 form-group">
						<div class="submit-button">
							<input type="image" src="<?php echo site_url(); ?>/wp-content/uploads/2019/08/paypal_pay.png" class="submin_btn"  name="package[submit]" value="Pay With Card">
						</div>
					</div>	
				</div>

			<div class="col-md-12 col-12 form-group">
				<div class="submit-button">
					<input type="image" name="package[submit]" class="submin_btn" style="display: none;" src="<?php echo site_url(); ?>/wp-content/uploads/2019/08/paypal_pay.png" id="paywithpaypal" value="Pay with PayPal">
				</div>
			</div>
		</div>
		</form>
	</div>

	<?php } ?>

</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
		$('input#cardNumber').change(function() {
		$('input#cardType').val(creditCardTypeFromNumber($(this).val()));
	});


	$('#payoption_paypal').on('change', function() {
		var option = $(this).val();
		if(option == "card"){
			$("#paywithpaypal").hide();
			$(".cardInfo").show();
		}else{
			$("#paywithpaypal").show();
			$(".cardInfo").hide();
		}
	})
})

function creditCardTypeFromNumber(num) {
	// first, sanitize the number by removing all non-digit characters.
	num = num.replace(/[^\d]/g,'');
	// now test the number against some regexes to figure out the card type.
	if (num.match(/^5[1-5]\d{14}$/)) {
	 return 'MasterCard';
	} else if (num.match(/^4\d{15}/) || num.match(/^4\d{12}/)) {
	 return 'Visa';
	} else if (num.match(/^3[47]\d{13}/)) {
	 return 'AmEx';
	} else if (num.match(/^6011\d{12}/)) {
	 return 'Discover';
	}
	return 'UNKNOWN';
}
</script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript">
$(function() {
	$form = $("#paypalSubmit");	
	$form.validate({
		rules: {
		  'package[card_number]': {
		    required: true,
		  },
		  'package[cvv2]': {
		    required: true,
		    maxlength: 3,
		    digits: true
		  },
		  'package[expiry_date][month]': {
		    required: true
		  },
		  'package[expiry_date][year]': {
		    required: true
		  }
		},

		submitHandler: function(form) {
		  form.submit();
		}

	});

});
</script>
<?php get_footer(); ?>