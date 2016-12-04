	<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>test</title>

		<!-- Bootstrap -->
		
		
	</head>
	<body>





		<p>
			<?php 

			if (isset($_GET['nom']) AND isset($_GET['prenom'])AND isset($_GET['repeat'])) {

				$nbrepet = (int) $_GET['repeat'];

				if (($nbrepet < 100) AND ($nbrepet > 0)){

					for ($repetition = 0 ; $repetition <= $nbrepet ; $repetition++ ) {

						echo '<p>Bonjour ' . $_GET['nom'] . ' ' . $_GET['prenom'] . '</p>';				
					}
				}
				else {
					echo "ce nombre n'est pas autotisé";
				}
			}
			else 
			{
				echo "Pas de nom defini";
			}	

			?>

		</p>


	</body>

	</html>

