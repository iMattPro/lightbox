<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [French] translation by Galixte (http://www.galixte.com)
 *
 * @copyright (c) 2015 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
 * DO NOT CHANGE
 */
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'LIGHTBOX_SETTINGS'				=> 'Paramètres de redimensionnement de la « Lightbox »',
	'LIGHTBOX_MAX_WIDTH'			=> 'Largeur maximale de l’image en pixel',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Permet aux images qui dépassent cette largeur d’être redimensionnées et agrandies en utilisant l’effet « Lightbox ». Définir cette valeur sur 0 désactive le redimensionnement de l’image dans la « Lightbox » suivant sa largeur.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Recommandation en fonction des paramètres des images transférées en pièces jointes : %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Hauteur maximale de l’image en pixels',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Permet aux images qui dépassent cette hauteur d’être redimensionnées et agrandies en utilisant l’effet « Lightbox ». Définir cette valeur sur 0 désactive le redimensionnement de l’image dans la « Lightbox » suivant sa hauteur.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Intégrer toutes les images dans la « Lightbox »',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Permet à toutes les images publiées d’être affichées au moyen de l’effet « Lightbox » même si elles n’ont pas été redimensionnées.',
	'LIGHTBOX_GALLERY'				=> 'Utiliser le mode galerie',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permet de parcourir les images redimensionnées plus facilement en utilisant l’effet de la « Lightbox ».',
	'LIGHTBOX_GALLERY_ALL'			=> 'Pour toutes les images redimensionnées sur la page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Pour toutes les images redimensionnées par message',
	'LIGHTBOX_SIGNATURES'			=> 'Redimensionner les images de la signature',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permet aux images utilisées dans les signatures d’être redimensionnées.',
	'LIGHTBOX_IMG_TITLES'			=> 'Afficher les noms des fichiers des images',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Permet d’afficher le nom du fichier en tant que légende dans la « Lightbox ».',
));
