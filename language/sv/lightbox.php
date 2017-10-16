<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * Swedish translation by Holger (www.maskinisten.net)
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox inställningar',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maximal bredd i pixel',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Bilder som överskrider denna bredd kommer att förminskas och kan sedan förstoras med hjälp av Lightbox-effekten. Ställ in till 0 för att deaktivera bildförminskningen.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Rekommendation baserad på bildbilagor: %spx',
	'LIGHTBOX_GALLERY'				=> 'Tillåt galleriläge',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Gör det enkelt att navigera mellan alla förminskade bilder på sidan.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Förminska signaturbilder',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Tillåt att bilder som används i signaturer blir föminskande.',
	'LIGHTBOX_IMG_TITLES'			=> 'Visa bildernas filnamn',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Bildernas filnamn visas i Lightbox-effekten.',
));
