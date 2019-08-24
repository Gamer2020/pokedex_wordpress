<?php
	/*
		Plugin Name:  Dexter
		Plugin URI:	https://www.Dexter.Gamer2020.net
		Description:  A PGL like plugin for wordpress.
		Version:      0.1
		Author:       Gamer2020
		Author URI:   https://www.Gamer2020.net
		License:      GPL2
		License URI:  https://www.gnu.org/licenses/gpl-2.0.html
	*/
?>
<?php

    use PokeAPI\Client;
    require __DIR__ . '/vendor/autoload.php';

    require 'dex-settings.php';
    require 'dex-pokemon.php';

    /** Hooks go here*/
    /** Hook for options page.*/
    add_action( 'admin_menu', 'dex_plugin_menu' );
    add_action( 'admin_init', 'dex_options_init' );
    
    /** Other hooks */

 	/** Shortcodes!*/
    add_shortcode('dex_poke_page', 'dex_poke_page');
    
    /** Link for options page.*/
	function dex_plugin_menu() {
		add_options_page( 'Dexter Settings', 'Dexter', 'administrator', 'dexter-settings', 'dex_plugin_options' );
	}

	function dex_options_init(){
		register_setting('dex_options_group','dex_pokepage_options','dex_options_validate');
		register_setting('dex_options_group','dex_searchpage_options','dex_options_validate');
	}

	function dex_options_validate($input) {
		// do some validation here if necessary
		//return sanitize_text_field($input);
		return $input;
    }
    
	function dex_options_text_validate($input) {
		// do some validation here if necessary
		return sanitize_text_field($input);
	}

?>
