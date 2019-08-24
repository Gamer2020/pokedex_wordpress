<?php
	use PokeAPI\Client;
	
	function dex_poke_page(){
		
		if(isset($_GET['ID'])){
			
			try {
                
                $client = new Client();

                $species = $client->species(sanitize_text_field($_GET['ID']));

                echo $species->getName();
				
                //catch exception
			}catch(Exception $e) {
				echo 'Message: ' .$e->getMessage();
			}
			
			}else{
			
			echo "No Pokemon specified!";
		
		}
		
        }

		?>