<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox Bildverkleinerung',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maximale Bildbreite in pixel',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Bilder, die diese Breite überschreiten, werden verkleinert und können durch den Lightbox-Effekt vergrößert werden. Setze diesen Wert auf 0, um Lightbox Image Resizing zu deaktivieren.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Empfehlung basierend auf den Bilderanhang-Einstellungen: %spx',
	'LIGHTBOX_GALLERY'				=> 'Erlaube Galeriemodus',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Erlaubt einfach Navigation zwischen allen verkleinerten Bildern auf der Seite, unter Benutzung des Lightbox-Effekts.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Verkleinere Signaturbilder',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Erlaubt die Verkleinerung von Bildern, die in Signaturen benutzt werden.',
	'LIGHTBOX_IMG_TITLES'			=> 'Zeige Bildernamen',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Bildernamen werden als Beschriftung im Lightbox-Effekt erscheinen.',
));
