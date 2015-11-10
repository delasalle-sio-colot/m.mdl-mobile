<?php
	// Projet Réservations M2L - version web mobile
	// Fonction de la vue VueConnecter.php : visualiser la vue de connexion
	// Ecrit le 12/10/2015 par Jim
?>  
<!doctype html>
<html>
	<head>	
		<?php include_once ('vues/head.php'); ?>
	</head> 
	<body>
		<div data-role="page">
			<div data-role="header" data-theme="<?php echo $themeNormal; ?>">
				<h4>M2L-GRR</h4>
			</div>
			<div data-role="content">
				<div data-role="fieldcontain" class="ui-hide-label">
				<h4 style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Consulter mes réservations</h4>
				</div>
					<?php
					if($nbReponses == 0) {
						echo 'Vous n\'avez pas de réservations';
					} else {
						foreach ($lesReservations as $uneReservation) {
							echo '<div data-role="fieldcontain" data-type="horizontal" data-mini="true" class="ui-hide-label">';
							echo '<h4>Réserv. n° '.$uneReservation->getId().'<br>';
							echo 'Réserv. n° '.$uneReservation->getDigicode().'</h4><br>';
							echo 'Passée le '.Outils::convertirEnDateFR($uneReservation->getTimestamp()).'<br>';
							echo 'Début : '.$uneReservation->getStart_time().'<br>';
							echo 'Fin : '.$uneReservation->getEnd_time().'<br>';
							echo 'Salle : '.$uneReservation->getRoom_name().'<br>';
							echo ($uneReservation->getStatus() == 0) ? 'Etat : Confirmée' : 'Etat : Provisoire';
							echo '</div>';
						}
					}?>
			</div>
			<div data-role="footer" data-position="fixed" data-theme="<?php echo $themeFooter; ?>">
				<h4><?php echo $msgFooter; ?></h4>
			</div>
		</div>
	</body>
</html>