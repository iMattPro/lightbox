<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Italian] Translation by Mauron and alex75 https://phpbb-store.it
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
	'LIGHTBOX_ALL_IMAGES'			=> 'Includi tutte le immagini nell’effetto Lightbox',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Con questa impostazione attivata, tutte le immagini pubblicate possono essere aperte con l’effetto Lightbox anche se non vengono ridimensionate.',
	'LIGHTBOX_GALLERY'				=> 'Attiva modalità galleria',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permette la navigazione fra immagini ridimensionate nella stessa pagina con l’effetto Lightbox.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Tutte le immagini ridimensionate nellaa pagina',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Tutte le immagini ridimensionate per post',
	'LIGHTBOX_SIGNATURES'			=> 'Ridimensiona immagini in firma',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permette il ridimensionamento delle immagini inserite in firma',
	'LIGHTBOX_IMG_TITLES'			=> 'Mostra nomi file immagine',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'I nomi delle immagini compariranno in una didascalia con l’effetto Lightbox.',
));
