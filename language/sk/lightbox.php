<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Slovak]
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox prehliadač obrázkov',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maximálna šírka obrázku v pixeloch',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Obrázky, ktoré prekročia tento limit šírky budú zmenšené. Zväčšené budú môcť byť pomocou lightbox efektu. Nastavením tejto hodnoty na 0 vypnete funkciu lightbox prezeranie obrázkov podľa šírky.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Odporúčania založené na nastavenie obrázkových príloh: %s px',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maximálna výška obrázka v pixeloch',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Obrázky, ktoré prekročia tento limit výšku budú zmenšené. Zväčšené budú môcť byť pomocou lightbox efektu. Nastavením tejto hodnoty na 0 vypnete funkciu lightbox prezeranie obrázkov podľa výšky',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'Povoliť režim galérie',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Umožňuje jednoduchú navigáciu medzi obrázkami na stránke prostredníctvom lightbox efektu.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Všetky veľkosti obrázkov na stránke',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Všetky veľkosti obrázkov v príspevku',
	'LIGHTBOX_SIGNATURES'			=> 'Meniť veľkosť obrázkov v podpisoch',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Umožňuje zmenu veľkosti obrázkov v podpisoch.',
	'LIGHTBOX_IMG_TITLES'			=> 'Zobrazovať názvy obrázkov',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Názvy obrázkov sa zobrazí ako titulok v lightboxe.',
));
