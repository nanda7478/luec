<?php 
/*
	Plugin Name: Paypal Courses
	Description: List transuctions for courses
	Author: Dinesh Soni

*/


register_activation_hook( __FILE__, 'paypalcourses_install' );	

add_action('admin_menu', 'paypalcourses_plugin_create_menu');

function paypalcourses_plugin_create_menu(){
	//create new top-level menu
	add_menu_page('Courses Settings', 'Courses Settings', 'administrator', __FILE__, 'paypalcourses_settings_page' , '' );

	//call register settings function
	add_action( 'admin_init', 'register_paypalcourses_settings' );
}

function register_paypalcourses_settings() {
	//register our settings
	register_setting( 'paypalcourses-settings-group', 'paypalcourses-options-settings' );
	 
}

function paypalcourses_install(){
	global $wpdb;
	 $table_name = $wpdb->prefix . 'paypalcourses';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		first_name varchar(50) NOT NULL,
		last_name varchar(50) ,
		email varchar(100) NOT NULL,
		phone varchar(50) NOT NULL,
		address varchar(255) ,
		ip_address varchar(50) NOT NULL,
		tnx_id varchar(50) NOT NULL,
		price DECIMAL(5,2) NOT NULL,
		paid_via varchar(50) NOT NULL,
		payment_status varchar(50) NOT NULL,
		tnx_status varchar(50) NOT NULL,
		package_name text NOT NULL,
		payer_id varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
 

}

function paypalcourses_settings_page() { ?>
<div class="container">
<h1>Transactions details for courses</h1>

<?php 
// sendEmailForCourse(174); 
// print_r(sendEmailForCourse(75)); 
// echo site_url();
?>

<form method="post" action="options.php">
	<!-- <a href="javascript:void(0)" id="export">Export All </a> -->
    <?php settings_fields( 'paypalcourses-settings-group' ); ?>
    <?php do_settings_sections( 'paypalcourses-settings-group' ); ?>
    <input type="hidden" name="paypalcourses-options-settings" 
    value="<?php echo esc_attr( get_option('paypalcourses-options-settings') ); ?>" />
    <table class="form-table" border="1">
         <tr>
         	<thead>
         		<th>ID</th>
         		<th>Date/Time</th>
         		<th>Email</th>
         		<th>Phone</th>
         		<th>Name</th>
         		<th>Course Name</th>
         		<th>Price</th>
         		<th>Tnx ID</th>
         		<th>Paid Via</th>
         		<th>Payment Status</th>
         		<th>Tnx Status</th>
         	</thead>
         </tr>
         <?php
			if (isset($_GET['pageno'])) {
				$pageno = $_GET['pageno'];
			} else {
				$pageno = 0;
			}

			$url = site_url().'/wp-admin/admin.php?page=paypalcourses%2Fpaypalcourses.php';

			$par_page_record = 20;


         ?>
         <?php $data = paypalcourses_process_tnx("read", array('offset' => $pageno, 'num_record' => $par_page_record), 0) ?>
         	<tbody>
         			 
	         	<?php foreach($data as $key => $record) {   ?>
	         		<tr class="<?php echo $record->paid_via == 'card' ? 'vai-card' : 'vai-PayPal';?>">
	         			<td><input type="checkbox" name="select_data" class="select_data" value="<?php echo $record->id  ?>"></td>
	         			<td><?php echo $record->created_at ?></td>
						<td><?php echo $record->email  ?></td>
						<td><?php echo $record->phone  ?></td>
						<td><?php echo $record->first_name. " ".$record->last_name  ?></td>
						<td title="<?php echo $record->package_name  ?>"><?php echo substr($record->package_name,0,10)  ?></td>
						<td><?php echo $record->price  ?>USD</td>
						<td><?php echo $record->tnx_id  ?></td>
						<td><?php echo $record->paid_via  ?></td>
						<td><?php echo $record->payment_status  ?></td>
						<td><?php echo $record->tnx_status  ?></td>	         			
         			</tr>
         		<?php } ?>
         	</tbody>
    </table>
    <?php 
    $prev = $pageno > 0 ? $url.'&pageno='.($pageno-1) : '#' ;
    $next = sizeof($data) < $par_page_record ? '#' : $url."&pageno=".($pageno+1);
    ?>
	<ul class="pagination">
		<li class="<?php if($pageno == 0){ echo "disable" ;}?>"><a href="<?php echo  $prev; ?>">Prev</a></li>
		<li class="<?php if(sizeof($data) < $par_page_record){ echo "disable"; } ?>"><a href="<?php echo  $next; ?>">Next</a></li>
	</ul>


    </form>
</div>
 <input name="delete" type="button" id="delete" value="Delete">
<style type="text/css">
body{ font-family: sans-serif;font-weight:300; padding-top:30px; color:#666; }
.container{ text-align:center;  }
a{ color:#1C2045; font-weight:350;}
table{ font-weight:300; margin:0px auto; border: 1px solid #b1b1b1; padding:5px; color:#666; width: 100%}
th,td{ border-bottom: 1px solid #dddddd;text-align:center;margin: 10px;padding:0 10px;}
hr{ border:0;border-top: 1px solid #E7C254;margin:20px auto;width:50%;}
.button{background-color:#1C2045;color:#E7C254;padding:5px 20px;max-width: 300px;line-height:1.5em;text-align:center;margin:5px auto;}
.button a{ color:#E7C254;}
.refs{ display:block; margin:auto; text-align:left; max-width:500px; }
.refs .label{  font-size:1.4em;}
.refs > ul{ margin-top:10px; line-height:1.5em;}
#export{color: green;float: right;font-size: 23px;padding: 1% 4%;display: inline-block;margin-top: -4%;}
#delete{color: red;float: right;font-size: 23px;padding: 1% 4%;display: inline-block;margin-top: 8px;}
.form-table th{text-align: center;}
tr.vai-PayPal {color: blue;}
tr.vai-card { color: green;}
ul.pagination li {float: left; padding: 5px}
ul.pagination li a { color: black; font-size: 23px; padding: 10px 20px !important; display: inline-block; margin-top: 8px; text-decoration: none; border: 1px solid #cacaca;}
.disable{display: none;}
</style>

<script type="text/javascript">
jQuery(document).ready(function($) {
		$("#delete").click(function(){
		    var favorite_id = [];
		    $.each($("input[name='select_data']:checked"), function(){            
		        favorite_id.push($(this).val());
		    });
		             
		    $.ajax({
		        url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php',
		        type: 'POST',
		        data:{
		          action: 'delete_ids',
		          favorite_id: favorite_id,		          
		        },
		        success: function(response){
		          console.log(response)
		         if(response="deleted"){
		         	 console.log(favorite_id)
		         	 window.location.reload();
		         }
		        }
	      	})  
		});
});
</script>

<?php } 


function sendEmailForCourse($lid){
	$result = paypalcourses_process_tnx("read-single", array(), $lid);
	// print_r($result);
	if(is_object($result)){
		$id = $result->id;
		$first_name = $result->first_name;
		$last_name = $result->last_name;
		$phone = $result->phone;
		$price = $result->price;
		$paid_via = $result->paid_via;
		$payment_status = $result->payment_status;	
		$package_name = $result->package_name;
		$tnx_status = $result->payment_status;
		$tnx_id = $result->tnx_id;
		$email = $result->email;
		// $email = 'henideepak20@gmail.com';

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: Luec English Speech Coaching <no-reply@levelupenglishcoaching.com>' . "\r\n";
		//user
		$subject = "LUEC Student Payment Information";
		$message = '<html><head>
					<title>Student Mail</title></head><body>
					<p>Hello '.$first_name.' '.$last_name.',</p>
					<p>Your Selected '.$package_name.' </p>
					<p>You are now on your way to attaining the IELTS speaking band you need.</p>
					<p>Your Transactions Id '.$tnx_id.'</p>
					<p>You should receive the first unit of your training package within the next 24 hours.</p> 
					<p>If you have any issues or queries please get in contact.</p>
					<p>LUEC WhatsApp: +61451094375</p>
					</body></html>';

		$dev_email = 'henideepak20@gmail.com';
		wp_mail($dev_email,$subject,$message,$headers);			
		wp_mail($email,$subject,$message,$headers);

		//admin
		$subject = "LUEC Student Payment Information";
		$message = '<html><head>
					<title>Admin Mail</title></head><body>
					<div style="text-align:center;">
					<h1>LUEC Student Payment Information</h1>
					<p><strong>Course Name</strong> '.$package_name.' </p>
					<table style="width: 100%;border-collapse: collapse;margin: auto;text-align: left;" border="1">
					<tbody><tr><td>Name</td><td>'.$first_name.' '.$last_name.'</td></tr>
					<tr><td>Email</td><td>'.$email.'</td></tr>
					<tr><td>Phone</td><td>'.$phone.'</td></tr>
					<tr><td>Price</td><td>'.$price.'</td></tr>
					<tr><td>Tnx ID</td><td>'.$tnx_id.'</td></tr>
					<tr><td>Paid Via</td><td>'.$paid_via.'</td></tr>
					<tr><td>Payment Status</td><td>'.$payment_status.'</td></tr>
					<tr><td>Tnx Status</td><td>'.$tnx_status.'</td></tr>
					</tbody></table></div></body></html>';

		$admin_email = get_option( 'admin_email' );
		wp_mail($admin_email,$subject,$message,$headers);

		$dev_email = 'henideepak20@gmail.com';
		wp_mail($dev_email,$subject,$message,$headers);

	}
	///return $result;
}


function paypalcourses_process_tnx($status, $data = array(), $lid = 0){
	global $wpdb;

	$table_name = $wpdb->prefix . 'paypalcourses';

	// print_r($data);

	switch ($status) {
		case 'init':
			$lid = $wpdb->insert($table_name, $data);
			//echo $wpdb->show_errors();
			//echo $wpdb->print_error();
			//print_r($lid);
			return $wpdb->insert_id;
			break;
		case 'update':
			$where = array("id" => $lid);
			$lid = $wpdb->update($table_name, $data, $where);
			//echo $wpdb->show_errors();
			//echo $wpdb->print_error();
			return $wpdb->insert_id;
			break;
		case 'read-single':
			$where = array("id" => $lid);
			$result = $wpdb->get_row( $wpdb->prepare( "SELECT * from $table_name
				WHERE id=$lid", "OBJECT"));
				
			//echo $wpdb->show_errors();
			//echo $wpdb->print_error();
			return $result;
			break;	
		case 'read':
			$offset = $data['offset'];
			$num_record = $data['num_record'];
			$offset = $offset * $num_record; 
			$result = $wpdb->get_results( $wpdb->prepare( "SELECT * from $table_name
				order by id DESC LIMIT $offset, $num_record", ARRAY_N));
			//echo $wpdb->show_errors();
			//echo $wpdb->print_error();
			return $result;
			# code...
			break;
	}

} 
