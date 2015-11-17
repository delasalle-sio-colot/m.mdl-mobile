<?php
// Projet Réservations M2L - version web mobile
// Fonction du contrôleur CtrlConnecter.php : traiter la demande de connexion d'un utilisateur
// Ecrit le 12/10/2015 par Jim

// Ce contrôleur vérifie l'authentification de l'utilisateur
// si l'authentification est bonne, il affiche le menu utilisateur ou administrateur (vue VueMenu.php)
// si l'authentification est incorrecte, il réaffiche la page de connexion (vue VueConnecter.php)

// on teste si le terminal client est sous Android, pour lui proposer de télécharger l'application Android
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if ( $detect->isAndroidOS() ) $OS = "Android"; else $OS = "autre";

// connexion du serveur web à la base MySQL
include_once ('modele/DAO.class.php');
$dao = new DAO();

// mise à jour de la table mrbs_entry_digicode (si besoin) pour créer les digicodes manquants
$dao->creerLesDigicodesManquants();

// récupération des données postées
if ( empty ($_POST ["nom"]) == true)  $nom = "";  else   $nom = $_POST ["nom"];
if ( empty ($_POST ["mail"]) == true)  $mail = "";  else   $mail = $_POST ["mail"];
if ( empty ($_POST ["niveau"]) == true)  $niveau = "off";  else   $niveau = $_POST ["niveau"];

if (empty($nom) || empty($mail) || empty($niveau) || ! Outils::estUneAdrMailValide($mail)) {
	$msgFooter = 'Données incomplètes ou incorrectes !';
	$themeFooter = $themeProbleme;
	include_once ('vues/VueCreerUtilisateur.php');
} elseif($dao->existeUtilisateur($nom)) {
	$msgFooter = 'Nom d\'utilisateur déjà existant !';
	$themeFooter = $themeProbleme;
	include_once ('vues/VueCreerUtilisateur.php');
} else {
	$mdp = Outils::creerMdp();
	$dao->enregistrerUtilisateur($nom, $niveau, $mdp, $mail);
	$msgFooter = 'Enregistrement effectué.<br>Un mail va être envoyé à l\'utilisateur !';
	$themeFooter = $themeNormal;
	include_once ('vues/VueCreerUtilisateur.php');
}
unset($dao);
