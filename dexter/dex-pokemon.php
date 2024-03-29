<?php
	use PokeAPI\Client;
	
	function dex_poke_page(){
		
		if(isset($_GET['ID'])){
			
			try {
                
                $client = new Client();

                $species = $client->species(sanitize_text_field($_GET['ID']));
                $pokemon = $client->Pokemon(sanitize_text_field($_GET['ID']));

                echo '<table cellspacing="0" border="1">';
                echo '<tbody>';
                
                //Name
				echo '<tr>';
				echo '<th style="font-size: 1.5em; line-height: 1.5em; color:: #000000;" colspan="3">' .  ucfirst($species->getName());
                echo '</th></tr>';
                
                //Images
                echo '<tr>';
                echo '<td rowspan="90">';
                //Front Sprite
				echo '<a href="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . sanitize_text_field($_GET['ID']) . '.png">' . '<img width="250" height="350" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . sanitize_text_field($_GET['ID']) . '.png" alt=' . '"' . ucfirst($species->getName()) . '"' . ">" . "</a>";
                //Back Sprite
                echo '<a href="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/' . sanitize_text_field($_GET['ID']) . '.png">' . '<img width="250" height="350" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/' . sanitize_text_field($_GET['ID']) . '.png" alt=' . '"' . ucfirst($species->getName()) . '"' . ">" . "</a>";
                echo '<br>';
                //Shiny Front Sprite
                echo '<a href="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/' . sanitize_text_field($_GET['ID']) . '.png">' . '<img width="250" height="350" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/' . sanitize_text_field($_GET['ID']) . '.png" alt=' . '"' . ucfirst($species->getName()) . '"' . ">" . "</a>";
                //Shiny Back Sprite
                echo '<a href="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/shiny/' . sanitize_text_field($_GET['ID']) . '.png">' . '<img width="250" height="350" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/shiny/' . sanitize_text_field($_GET['ID']) . '.png" alt=' . '"' . ucfirst($species->getName()) . '"' . ">" . "</a>";
                echo '</td>';
                echo '</tr>';

                //Types

                $Types = $pokemon->getTypes()->toArray();

                $Type1 = $Types[0]->getType();

                $Type1Name = ucfirst($Type1->getName());

                $Type2Name = "";

                if (count($Types) > 1)
                {
                    $Type2 = $Types[1]->getType();
                    $Type2Name = ucfirst($Type2->getName()) . "/";
                }

				echo '<tr>';
				echo '<td> <b>Types:</b>';
				echo '</td><td>' . $Type2Name . $Type1Name;
				echo '</td></tr>';

                //Capture Rate
				echo '<tr>';
				echo '<td> <b>Capture Rate:</b>';
				echo '</td><td>' . $species->getCaptureRate();
				echo '</td></tr>';

                echo '</tbody></table>';
				
                //catch exception
			}catch(Exception $e) {
				echo 'Message: ' .$e->getMessage();
			}
			
			}else{
			
			echo "No Pokemon specified!";
		
		}
		
        }

		?>