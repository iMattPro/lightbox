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
	'LIGHTBOX_ALL_IMAGES'			=> 'Zahrnout do efektu Lightbox všechny obrázky',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Je-li tato možnost povolena, lze v efektu Lightbox otevřít všechny vložené obrázky, i když se jejich velikost nemění.',
	'LIGHTBOX_GALLERY'				=> 'Povolit režim galerie',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Umožňuje snadnou navigaci mezi obrázky na stránce prostřednictvím lightbox efektu.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Všechny zmenšené obrázky na stránce',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Všechny zmenšené obrázky v jednotlivém příspěvku',
	'LIGHTBOX_SIGNATURES'			=> 'Měnit velikost obrázků v podpisech',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Umožňuje změnu velikosti obrázků v podpisech.',
	'LIGHTBOX_IMG_TITLES'			=> 'Zobrazovat názvy obrázků',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Názvy obrázků se zobrazí jako titulek v lightboxu.',
));
