<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * French translation by Galixte (http://www.galixte.com)
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
	'LIGHTBOX_SETTINGS'				=> 'Paramètres de redimensionnement de la Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Largeur maximale de l’image en pixel',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Les images qui dépassent cette largeur seront redimensionnées et peuvent être agrandies en utilisant l’effet de la Lightbox. Paramétrer cette valeur à 0 désactive le redimensionnement de l’image dans la Lightbox.',
	'LIGHTBOX_GALLERY'				=> 'Autoriser le mode galerie',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permet une navigation aisée parmi toutes les images redimensionnées de la page en utilisant l’effet de la Lightbox.',
	'LIGHTBOX_SIGNATURES'			=> 'Redimensionner les images de la signature',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permet aux images utilisées dans les signatures d’être redimensionnées.',
));
