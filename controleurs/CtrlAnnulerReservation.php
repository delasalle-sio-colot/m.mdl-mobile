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
$annulerReservation = $_POST ["annulerReservation"];

$annulationReservation = $dao->existeReservation($annulerReservation);
$createurReservation = $dao->estLeCreateur($_SESSION['nom'] ,$annulerReservation);

if (empty($annulerReservation)) {
	$msgFooter = 'Données incomplètes ou incorrectes !';
	$themeFooter = $themeProbleme;
	include_once ('vues/VueAnnulerReservation.php');
} elseif($annulationReservation == false) {
	$msgFooter = 'Numéro de réservation inexistant !';
	$themeFooter = $themeProbleme;
	include_once ('vues/VueAnnulerReservation.php');
} elseif($createurReservation == false) {
	$msgFooter = 'Vous n\'êtes pas l\'auteur de cette réservation !';
	$themeFooter = $themeProbleme;
	include_once ('vues/VueAnnulerReservation.php');
} else {
	$dao->annulerReservation($annulerReservation);
	$msgFooter = 'Enregistrement effectué.<br>Vous allez recevoir un mail de confirmation.';
	$themeFooter = $themeNormal;
	include_once ('vues/VueAnnulerReservation.php');
}
unset($dao);
