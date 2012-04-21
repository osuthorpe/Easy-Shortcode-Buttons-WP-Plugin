<?php 
	if($_POST['easy_buttons_hidden'] == 'Y') {
		//Form data sent
		$easy_buttons_css = $_POST['easy_buttons_css'];
		update_option('easy_buttons_css', $easy_buttons_css);
		
		?>
		<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
		<?php
	} else {
		//Normal page display
		$easy_buttons_css = get_option('easy_buttons_css');
	}
	
	
?>

<div class="wrap">
<?php    echo "<h2>" . __( 'Easy Buttons Customizations', 'easy_buttons_trdom' ) . "</h2>"; ?>

<form name="easy_buttons_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="easy_buttons_hidden" value="Y">
	<?php    echo "<h4>" . __( 'Create your own custom buttons by including the css here. Visit <a href="http://www.alexthorpe.com" target="_blank">www.alexthorpe.com</a> for a comprehensive guide for using this feature' ) . "</h4>"; ?>
	<p style="vertical-align:top;">
		<label for="easy_buttons_css" style="vertical-align:top;"><?php _e("Custom Buttons: " ); ?></label>
		<textarea name="easy_buttons_css" cols="60" rows="20"><?php echo $easy_buttons_css; ?></textarea>
	</p>


	<p class="submit">
	<input type="submit" name="Submit" value="<?php _e('Save Code', 'easy_buttons_trdom' ) ?>" />
	</p>
</form>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<p>If you find this plugin useful consider a donation, half of the proceeds go charity and the other half goes to my college tuition, a win win.</p>
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="6C2XMVL58ZS7A">
	<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
</div>