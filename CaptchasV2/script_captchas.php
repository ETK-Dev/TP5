<?php
session_start();
/****************************************************************
* CAPTCHA GENERATEUR IMAGE EN PHP
* /!\ PAS DE RETOUR D'ERREUR SUR LA G�N�RATION
* SCRIPT ALLEG� SANS OPTIMISATION POUR LA COMPR�HENSION
*****************************************************************/
/****************************************************************
* 1. PARAMETRAGE DES ATTRIBUTS VARIABLES
*****************************************************************/
/* CHAINE DE CARACT�RE PARAM�TRABLE

* SUPPRESSION DE 1 & I POUR �VITER LA CONFUSION DE LECTURE */
$chaine = '23456789ABCDEFGHIKLMNOPQRSTUVWXYZ';

/* CREATION de l'image par defaut en background */
$image = imagecreatefrompng('Images/imagecaptcha.png');

/* COULEUR DES CARACTERES */
$color = imagecolorallocate($image, 300, 0, 300);

/* POLICE DES CARACTERES TRUETYPE */
$font = 'Fonts/captcha.ttf';

/****************************************************************
* 2. FONCTIONS ET PROCEDURES
*****************************************************************/
/* NOMBRE DE DIGIT & CHAINE PARAMETRABLES */

function getCode($length, $chars)
{
	$code = null;
	for ($i=0; $i < $length ; $i++) 
	{ 
		$code .= $chars { mt_rand(0 , strlen($chars) - 1)};
	}
	return $code;
};

/****************************************************************
* 3. PROCEDURES DE GENERATION DYNAMIQUE DE L'IMAGE
*****************************************************************/
/* APPEL DE LA FONCTION POUR RECUPERER UNE CHAINE ALEATOIRE */

$code = getCode(5, $chaine);

/* RETOURNE UN A UN LES SEGMENTS DE LA CHAINE */
$char1 = substr($code, 0,1);
$char2 = substr($code, 1,1);
$char3 = substr($code, 2,1);
$char4 = substr($code, 3,1);
$char5 = substr($code, 4,1);

/* DESSINE UN TEXTE AVEC UNE POLICE TRUETYPE
* PARAMS : IMAGE / TAILLE / ANGLE / POSX / POSY / COULEUR/ POLICE / CARACTERE */
imagettftext($image, 60, -20, 40*1.5, 110, $color, $font, $char1);
imagettftext($image, 60, 30, 137*1.5, 110, $color, $font, $char2);
imagettftext($image, 60, -45, 175*1.5, 110, $color, $font, $char3);
imagettftext($image, 60, 35, 270*1.5, 110, $color, $font, $char4);
imagettftext($image, 60, -25, 320*1.5, 110, $color, $font, $char5);

/* On met la variable code dans une session */

$_SESSION['code'] = $code;

/****************************************************************
* 4. PROCEDURES DE GENERATION DYNAMIQUE DE L'IMAGE
*****************************************************************/
/* ENTETE HTTP A RENVOYER POUR LA GENERATION DE L'iMAGE */

header('Content-Type: image/png');

/* ENVOIE DE L'IMAGE PNG GENER�E AU NAVIGATEUR */
imagepng($image);

/* DESTRUCTION DE L'IMAGE LIB�RATION DE M�MOIRE */
imagedestroy($image);
?>