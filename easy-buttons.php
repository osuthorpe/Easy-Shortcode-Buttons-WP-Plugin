<?php 
	/*
	Plugin Name: Easy Shortcode Buttons
	Plugin URI: http://alexthorpe.com/coding/easy-buttons-plugin/262/
	Description: The easiest way to add buttons to your wordpress site. Using the shortcodes you can have CSS3 buttons anywhere on your site
	Version: 1.2
	Author: Alex Thorpe
	Author URI: http://www.alexthorpe.com/
	License: GPL2
	*/
	
	/*  
		Copyright 2011  Alex Thorpe  (email : osuthorpe@gmail.com)
	
	    This program is free software; you can redistribute it and/or modify
	    it under the terms of the GNU General Public License, version 2, as 
	    published by the Free Software Foundation.
	
	    This program is distributed in the hope that it will be useful,
	    but WITHOUT ANY WARRANTY; without even the implied warranty of
	    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	    GNU General Public License for more details.
	
	    You should have received a copy of the GNU General Public License
	    along with this program; if not, write to the Free Software
	    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/
	
	//Add CSS
	add_action("wp_print_styles", "add_button_css");
	
	function add_button_css() {
		wp_enqueue_style( 'button-shortcode-styles', WP_PLUGIN_URL . '/easy-shortcode-buttons/buttons-style.css' );
	}
	
	
	//Add Buttons to Posts/Pages
	add_shortcode('button','bk_button');
	
	function bk_button($att, $content = null) {
		extract(shortcode_atts(array(
			'link' => '#',
			'target' => '_blank',
			'color' => '',
			'align' => '',
			'size' => '',
			'shape' => '',
		), $att));
		
		$my_button = '<span class="bk-button-wrapper"><a href="'.$link.'" target="'.$target.'" class="bk-button '.$color.' '.$align.' '.$shape.' '.$size.'">'.do_shortcode($content).'</a></span>';
		
		return $my_button; 
		
	}
	
	
	// Add Buttons to MCE
	add_filter('mce_external_plugins', "tinyplugin_register");
	add_filter('mce_buttons', 'tinyplugin_add_button', 0);
	
	function tinyplugin_add_button($buttons)
	{
	    array_push($buttons, "separator", "tinyplugin");
	    return $buttons;
	}
	
	function tinyplugin_register($plugin_array)
	{
	    $url = trim(get_bloginfo('url'), "/")."/wp-content/plugins/easy-shortcode-buttons/button.js";
	
	    $plugin_array['tinyplugin'] = $url;
	    return $plugin_array;
	}
		
	@ini_set('pcre.backtrack_limit', 500000);
	
	
	function easy_buttons_admin() {
		include('buttons-admin.php');
	}
	
	function easy_buttons_actions() {
	    add_options_page('Easy Buttons Custom', 'Easy Buttons Custom', 'manage_options', 'bk-easy-buttons', 'easy_buttons_admin');
	}
	
	add_action('admin_menu', 'easy_buttons_actions');
	
	function buttons_custom_style() {
		if (get_option('easy_buttons_css') != '') {
			$bk_button_style = get_option('easy_buttons_css');
			echo '<style>';
			echo $bk_button_style;
			echo '</style>';
		}
	}
	
	add_action('wp_head','buttons_custom_style')
?>