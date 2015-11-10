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
				<a href="index.php?action=Menu">Retour menu</a>
			</div>
			<div data-role="content">
				<div data-role="fieldcontain" class="ui-hide-label">
				<h4 style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Confirmer une réservation</h4>
				</div>
				<form name="form1" id="form1" action="index.php?action=ConfirmerReservation" method="post">
					<div data-role="fieldcontain" class="ui-hide-label">
						<input type="text" name="num_reserv" id="num_reserv" data-mini="true" placeholder="Entrez le numéro de réservation">
					</div>
					<div data-role="fieldcontain" data-mini="true" style="margin-top: 0px; margin-bottom: 0px;">
						<p style="margin-top: 0px; margin-bottom: 0px;">
							<input type="submit" name="confirmer" id="confirmer" data-mini="true" value="Confirmer la réservation">
						</p>
					</div>
				</form>
			</div>
			<div data-role="footer" data-position="fixed" data-theme="<?php echo $themeFooter; ?>">
				<h4><?php echo $msgFooter; ?></h4>
			</div>
		</div>
	</body>
</html>