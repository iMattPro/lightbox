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

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” …
//

$lang = array_merge($lang, array(
	'LIGHTBOX_SETTINGS'				=> 'Paramètres de la Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Largeur maximale de l’image en pixel',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Les images qui dépassent cette largeur seront redimensionnées et peuvent être agrandies en utilisant l’effet de la Lightbox. Paramétrer cette valeur à 0 désactive le redimensionnement de l’image.',
	'LIGHTBOX_GALLERY'				=> 'Autoriser le mode galerie',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permet une navigation aisée parmi toutes les images redimensionnées de la page en utilisant l’effet de la Lightbox.',
	'LIGHTBOX_SIGNATURES'			=> 'Redimensionner les images de la signature',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permet aux images utilisées dans les signatures d’être redimensionnées.',
));
