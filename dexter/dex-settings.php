<?php	
	/** Options Page.*/
	function dex_plugin_options() {
		if ( !current_user_can( 'administrator' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		echo '<div class="wrap">';
		echo '<form method="post" action="options.php">';
		settings_fields( 'dex_options_group' );
		$dex_pokepage_options = get_option( 'dex_pokepage_options' );
		$dex_pokedex_options = get_option( 'dex_pokedex_options' );
		
		echo '<h2>Selected Pages</h2>';
		
		echo '<table class="form-table">';
		
		echo '<tr valign="top"><th scope="row">Pokemon page:</th>';
		echo '<td>';
		echo '<select name="dex_pokepage_options[page_id]">';
		if( $pages = get_pages() ){
			foreach( $pages as $page ){
				echo '<option value="' . $page->ID . '" ' . selected( $page->ID, $dex_pokepage_options['page_id'] ) . '>' . $page->post_title . '</option>';
			}
		}
		echo '</select>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr valign="top"><th scope="row">Pokedex page:</th>';
		echo '<td>';
		echo '<select name="dex_pokedex_options[page_id]">';
		if( $pages = get_pages() ){
			foreach( $pages as $page ){
				echo '<option value="' . $page->ID . '" ' . selected( $page->ID, $dex_pokedex_options['page_id'] ) . '>' . $page->post_title . '</option>';
			}
		}
		echo '</select>';
		echo '</td>';
		echo '</tr>';
        
        echo '<tr valign="top"><th scope="row">Pokedex Count:</th>';
		echo '<td>';
		echo '<input type="text" name="dex_pokedexcount_options" value="' . sanitize_text_field(get_option('dex_pokedexcount_options')) . '">';
		echo '</td>';
        echo '</tr>';
        
        echo '<tr valign="top"><th scope="row">Page Limit:</th>';
		echo '<td>';
		echo '<input type="text" name="dex_pagelimit_options" value="' . sanitize_text_field(get_option('dex_pagelimit_options')) . '">';
		echo '</td>';
		echo '</tr>';

		echo '</table>';
		echo '<p class="submit">';
		echo '<input type="submit" class="button-primary" value="Save Changes" />';
		echo '</p>';
		echo '</form>';
		echo '</div>';
	}
?>