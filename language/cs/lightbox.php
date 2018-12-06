<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Czech]
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox prohlížení obrázků',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maximální šířka obrázku v pixelech',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Obrázky, které překročí tento limit šířky budou zmenšeny. Zvětšeny budou moci být pomocí lightbox efektu. Nastavením této hodnoty na 0 vypnete funkci lightbox prohlížení obrázků podle šířky.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Doporučení založené na nastavení obrázkových příloh: %s px',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maximální výška obrazu v pixelech',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Obrázky, které překročí tento limit výšky budou zmenšeny. Zvětšeny budou moci být pomocí lightbox efektu. Nastavením této hodnoty na 0 vypnete funkci lightbox prohlížení obrázků podle výšky.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'Povolit režim galerie',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Umožňuje snadnou navigaci mezi obrázky na stránce prostřednictvím lightbox efektu.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Měnit velikost obrázků v podpisech',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Umožňuje změnu velikosti obrázků v podpisech.',
	'LIGHTBOX_IMG_TITLES'			=> 'Zobrazovat názvy obrázků',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Názvy obrázků se zobrazí jako titulek v lightboxu.',
));
