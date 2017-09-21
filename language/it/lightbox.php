<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * Translation by Mauron.
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
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Le immagini di larghezza superiore a quella specificata saranno ridimensionate e potranno essere ingrandite con l’effetto Lightbox.<br /><em>Impostare il valore a 0 per disattivare il ridimensionamento.</em>',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Raccomandazione sulla base di impostazioni per gli allegati di immagini: %spx',
	'LIGHTBOX_GALLERY'				=> 'Attiva modalità galleria',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permette la navigazione fra immagini ridimensionate nella stessa pagina con l’effetto Lightbox.',
	'LIGHTBOX_SIGNATURES'			=> 'Ridimensiona immagini in firma',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permette il ridimensionamento delle immagini inserite nella firma',
	'LIGHTBOX_IMG_TITLES'			=> 'Mostra nomi file immagine',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'I nome delle immagini compariranno in una didascalia nell’effetto Lightbox.',
));
