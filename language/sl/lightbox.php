<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Slovenian]
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox spreminjanje velikosti slike',
	'LIGHTBOX_MAX_WIDTH'			=> 'Največja širina slike',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Slike, ki presegajo to širino, bodo spremenjene velikosti in jih je mogoče povečati z učinkom Lightbox. To vrednost nastavite na 0, če želite onemogočiti spreminjanje velikosti slike Lightbox po širini.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Priporočilo, ki temelji na nastavitvah priloge slike: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Največja višina slike',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Slike, ki presegajo to višino, bodo spremenjene velikosti in jih lahko povečate z učinkom Lightbox. To vrednost nastavite na 0, če želite onemogočiti spreminjanje velikosti slike Lightbox po višini.',
	'LIGHTBOX_ALL_IMAGES'			=> 'V učinek Lightbox vključi vse slike',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Če je omogočena ta nastavitev, se lahko vse objavljene slike odprejo v učinku Lightbox, tudi če jih ne spremenite v velikost.',
	'LIGHTBOX_GALLERY'				=> 'Način galerije',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Omogoča enostavno navigacijo med spremenjenimi slikami z učinkom Lightbox.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Vse spremenjene slike na strani',
	'LIGHTBOX_GALLERY_POSTS'		=> 'se spremenjene slike na objavo',
	'LIGHTBOX_SIGNATURES'			=> 'Spremeni velikost slik v podpisu',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Slikam v podpisu dovoli spremembo velikosti.',
	'LIGHTBOX_IMG_TITLES'			=> 'Prikaži imena slikovnih datotek',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Imena slik bodo prikazana kot napis v učinku Lightbox.',
));
