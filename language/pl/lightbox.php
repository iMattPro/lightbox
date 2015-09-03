<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * Polish translation by HPK.
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
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Obrazki, które przekraczają podaną szerokość, zostaną zmniejszone, a powiększenie będzie można uzyskać przez efekt Lightbox.<br /> Ustaw wartość na 0, jeżeli chcesz wyłączyć.',
	'LIGHTBOX_GALLERY'				=> 'Zezwól na tryb galerii',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Pozwala na łatwą nawigację pomiędzy wszystkimi obrazkami, które wymagają użycia efektu Lightbox.',
	'LIGHTBOX_SIGNATURES'			=> 'Zmiana rozmiaru obrazków w sygnaturach',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Wykorzustuje Lightbox do zmiany rozmiaru obrazków w sygnaturach.',
));
