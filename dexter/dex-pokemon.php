<?php
	use PokeAPI\Client;
	
	function dex_poke_page(){
		
		if(isset($_GET['ID'])){
			
			try {
                
                $client = new Client();

                $species = $client->species(sanitize_text_field($_GET['ID']));

                echo '<table cellspacing="0" border="1">';
                echo '<tbody>';
                
				echo '<tr>';
				echo '<th style="font-size: 1.5em; line-height: 1.5em; color:: #000000;" colspan="3">' .  ucfirst($species->getName());
				echo '</th></tr>';

                echo '</tbody></table>';

                //echo $species->getName();

                //echo '<img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . sanitize_text_field($_GET['ID']) . '.png">';
				
                //catch exception
			}catch(Exception $e) {
				echo 'Message: ' .$e->getMessage();
			}
			
			}else{
			
			echo "No Pokemon specified!";
		
		}
		
        }

		?>