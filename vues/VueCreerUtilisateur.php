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
				<h4 style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Créer un compte utilisateur</h4>
				</div>
				<form name="form1" id="form1" action="index.php?action=CreerUtilisateur" method="post">
				<input type="text" name="nom" id="nom" data-mini="true" placeholder=" Entrez le nom de l'utilisateur " >
				<input type="text" name="mail" id="mail" data-mini="true" placeholder=" Entrez l'adresse mail " >		
				<div data-role="fieldcontain">
				    <fieldset data-role="controlgroup">
				    	<legend>Niveau :</legend>
				         	<input type="radio" name="niveau" id="0" value="0" checked="checked" />
				         	<label for="0">Invité</label>
				
				         	<input type="radio" name="niveau" id="1" value="1"  />
				         	<label for="1">Utilisateur</label>
				
				         	<input type="radio" name="niveau" id="2" value="2"  />
				         	<label for="2">Administrateur</label>
				    </fieldset>
				</div>
				<input type="submit" name="valider" id="valider" data-mini="true" value="Créer l'utilisateur">
				</form>
			</div>
			
			<div data-role="footer" data-position="fixed" data-theme="<?php echo $themeFooter; ?>">
				<h4><?php echo $msgFooter; ?></h4>
			</div>
		</div>
	</body>
</html>