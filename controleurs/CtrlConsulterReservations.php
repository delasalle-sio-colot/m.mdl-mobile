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

// récupération des réservations à venir créées par l'utilisateur
$lesReservations = $dao->listeReservations($nom);
$nbReponses = sizeof($lesReservations);

if ($nbReponses == 0) {
	$msgFooter = 'Vous n\'avez aucune réservation !';
	$themeFooter = $themeProbleme;
	include_once ('vues/VueConsulterReservations.php');
} else {
	// footer
	$msgFooter = 'Vous avez '.$nbReponses.' réservation(s) !';
	$themeFooter = $themeNormal;
	
	//liste consultations
	$digicode = $lesReservations->getDigicode();
	
	include_once ('vues/VueConsulterReservations.php');
}
