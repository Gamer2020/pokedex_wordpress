<?php	
    use PokeAPI\Client;

	/** Pokedex Page.*/
	function dex_pokedex_page() {

        $dex_pokedexcount_options = get_option( 'dex_pokedexcount_options' );

        $dex_pagelimit_options = get_option( 'dex_pagelimit_options' );

        $dex_pokepage_options = get_option( 'dex_pokepage_options' );

        if(isset($_GET['PAGE'])){

            $pagenum = sanitize_text_field($_GET['PAGE']);

            if($pagenum < 1){

                $pagenum = 1;

            }

        }else{
			
			$pagenum = 1;
		
        }
        
        $pagestart = (($pagenum * $dex_pagelimit_options) - $dex_pagelimit_options) + 1;

        $pageend = ($pagestart + $dex_pagelimit_options) - 1;

        $client = new Client();

        for ($x = $pagestart; $x <= $pageend; $x++) {

        if ($x < ($dex_pokedexcount_options + 1)) {

            $species = $client->species($x);

            echo "<a href='" . get_permalink($dex_pokepage_options['page_id']) . "?ID=" . $x . "'>" . '<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $x. '.png">' . '</a>';
        
        }

        }


        echo "<br>";

        echo "<div style='text-align: center'>";

        if ($pagenum != 1) {
            echo "<a href='?&PAGE=" . ($pagenum - 1) . "'>Previous Page</a> | ";
        }

        echo "<a href='?&PAGE=" . ($pagenum + 1) . "'>Next Page</a>";

        echo "</div>";
		
	}
?>