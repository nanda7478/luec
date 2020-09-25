<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->
		<div class="free-trial-section">
			<?php dynamic_sidebar('free-trial-button');?>
		</div>

		<footer role="contentinfo">
			<div class="container">
				<div class="row">
					<div class="col-md-12"><?php dynamic_sidebar('foo-logo');?></div>
				</div>
				<div class="row">
					<div class="footer-box one"><?php dynamic_sidebar('foo-left');?></div>
					<div class="footer-box two">
						<span class="site-title"> <?php echo date(Y); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> 
						<?php dynamic_sidebar('foo-middile');?>
					</div>
					<div class="footer-box three"><?php dynamic_sidebar('foo-right');?></div>
				</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
<script type="text/javascript">

document.addEventListener( 'wpcf7mailsent', function( event ) {
	if ( 143 == event.detail.contactFormId ){
    	location = 'https://www.levelupenglishcoaching.com/congratulations/';
	}
}, false );

$(document).ready(function(){
  $(".menu-toggle").click(function(){
    $("body").toggleClass("main");
  });
});



</script>

<!-- <style type="text/css">
	
.hide {display: none;}
.iti{width: 100% }
.count-valid #error-msg { color: red;}
.count-valid #valid-msg {color: green;}

</style>

<link rel="stylesheet" type="text/css" href="https://www.levelupenglishcoaching.com/wp-content/themes/luec/telinput/build/css/intlTelInput.css">
<script src="https://www.levelupenglishcoaching.com/wp-content/themes/luec/telinput/build/js/intlTelInput.js"></script>
<script type="text/javascript">

var input = document.querySelector("#phone");
var errorMsg = document.querySelector("#error-msg"),
validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti = window.intlTelInput(input, {
  utilsScript: "https://www.levelupenglishcoaching.com/wp-content/themes/luec/telinput/build/js/utils.js"
});

var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
    }
  }
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);

</script>
 -->
</body>
</html>
