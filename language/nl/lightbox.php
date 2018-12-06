<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Dutch] translated by Dutch Translators (https://github.com/dutch-translators)
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox instellingen',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maximale afbeeldingsbreedte in pixels',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'De afbeeldingen die deze breedte overschrijden worden herschaald en kunnen vergroot worden door gebruik te maken van het Lightbox effect. Zet deze waarde op 0 om het herschalen van afbeeldingen op breedte uit te schakelen.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Aanbeveling op basis van afbeelding bijlagen: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maximale beeldhoogte in pixels',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'De afbeeldingen die deze hoogte overschrijden worden herschaald en kunnen vergroot worden door gebruik te maken van het Lightbox effect. Zet deze waarde op 0 om het herschalen van afbeeldingen op hoogte uit te schakelen.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'Galerij mode toestaan',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Hiermee kan makkelijk genavigeerd worden tussen alle herschaalde afbeeldingen op de pagina door gebruik te maken van het Lightbox effect.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Herschaal afbeeldingen in onderschrift',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'De afbeeldingen die in het onderschrift worden gebruikt herschalen.',
	'LIGHTBOX_IMG_TITLES'			=> 'Bestandsnamen weergeven',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'De afbeeldingsnaam zal als bijschrift worden weergegeven in het Lightbox effect.',
));
