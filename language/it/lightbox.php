<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Italian] Translation by Mauron.
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
	'LIGHTBOX_SETTINGS'				=> 'Impostazioni Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Larghezza massima immagine in pixel',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Le immagini di larghezza superiore a quella specificata saranno ridimensionate e potranno essere ingrandite con l’effetto Lightbox. Impostare il valore a 0 per disattivare il ridimensionamento delle immagini in base all’larghezza.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Raccomandazione sulla base di impostazioni per gli allegati di immagini: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Altezza massima immagine in pixel',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Le immagini di altezza superiore a quella specificata saranno ridimensionate e potranno essere ingrandite con l’effetto Lightbox. Impostare il valore a 0 per disattivare il ridimensionamento delle immagini in base all’altezza.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'Attiva modalità galleria',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permette la navigazione fra immagini ridimensionate nella stessa pagina con l’effetto Lightbox.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Ridimensiona immagini in firma',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permette il ridimensionamento delle immagini inserite nella firma',
	'LIGHTBOX_IMG_TITLES'			=> 'Mostra nomi file immagine',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'I nome delle immagini compariranno in una didascalia nell’effetto Lightbox.',
));
