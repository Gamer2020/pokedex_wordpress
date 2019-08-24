<?php	
	/** Options Page.*/
	function dex_plugin_options() {
		if ( !current_user_can( 'administrator' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		echo '<div class="wrap">';
		echo '<form method="post" action="options.php">';
		settings_fields( 'dex_options_group' );
		$es_cardpage_options = get_option( 'dex_pokepage_options' );
		$es_searchpage_options = get_option( 'dex_searchpage_options' );
		
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
		
		echo '<tr valign="top"><th scope="row">Search page:</th>';
		echo '<td>';
		echo '<select name="dex_searchpage_options[page_id]">';
		if( $pages = get_pages() ){
			foreach( $pages as $page ){
				echo '<option value="' . $page->ID . '" ' . selected( $page->ID, $dex_searchpage_options['page_id'] ) . '>' . $page->post_title . '</option>';
			}
		}
		echo '</select>';
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