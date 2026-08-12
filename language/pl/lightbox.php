<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Polish] translation by HPK.
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
	'LIGHTBOX_SETTINGS'				=> 'Ustawienia Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maksymalna szerokość obrazka w pikselach',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Obrazy, które przekraczają podaną szerokość, zostaną zmniejszone, a powiększenie będzie można uzyskać przez efekt Lightbox.<br> Ustaw wartość na 0, aby wyłączyć zmianę rozmiaru obrazu według szerokości.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Zalecenie podstawie ustawień załączanego obrazka: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maksymalna wysokość obrazu w pikselach',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Obrazy, które przekraczają podaną wysokość, zostaną zmniejszone, a powiększenie będzie można uzyskać przez efekt Lightbox.<br> Ustaw wartość na 0, aby wyłączyć zmianę rozmiaru obrazu według wysokości.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Zastosuj efekt Lightbox do wszystkich obrazów',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Po włączeniu tej opcji wszystkie opublikowane zdjęcia można otwierać w trybie Lightbox, nawet jeśli nie zostały one przeskalowane.',
	'LIGHTBOX_GALLERY'				=> 'Zezwól na tryb galerii',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Pozwala na łatwą nawigację pomiędzy wszystkimi obrazami, które wymagają użycia efektu Lightbox.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Wszystkie obrazy na stronie',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Wszystkie obrazy w poście',
	'LIGHTBOX_SIGNATURES'			=> 'Zmiana rozmiaru obrazów w sygnaturach',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Wykorzustuje Lightbox do zmiany rozmiaru obrazów w sygnaturach.',
	'LIGHTBOX_IMG_TITLES'			=> 'Pokaż nazwy obrazów',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Wyświetla w nagłówku nazwy obrazów.',
));
