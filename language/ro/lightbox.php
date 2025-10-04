<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Romanian]
 *
 * @copyright (c) 2015 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

/**
 * Romanian translation by Georgian Iordache (iorGian) https://iorgian.wordpress.com/
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
	'LIGHTBOX_SETTINGS'				=> 'Redimensionare imagine Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Lățime maximă a imaginii',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Imaginile care depășesc această lățime vor fi redimensionate și pot fi mărite folosind efectul Lightbox. Setați această valoare la 0 pentru a dezactiva redimensionarea imaginii Lightbox după lățime.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Recomandare bazată pe setările de atașare a imaginii: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Înălțime maximă a imaginii',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Imaginile care depășesc această înălțime vor fi redimensionate și pot fi mărite folosind efectul Lightbox. Setați această valoare la 0 pentru a dezactiva redimensionarea imaginii Lightbox după înălțime.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include toate imaginile în efectul Lightbox',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Cu această setare activată, toate imaginile postate pot fi deschise în efectul Lightbox chiar dacă nu sunt redimensionate.',
	'LIGHTBOX_GALLERY'				=> 'Mod Galerie',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permite navigarea ușoară între imaginile redimensionate folosind efectul Lightbox.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Toate imaginile redimensionate de pe pagină',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Toate imaginile redimensionate per mesaj',
	'LIGHTBOX_SIGNATURES'			=> 'Redimensionare imagini semnătură',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permite redimensionarea imaginilor folosite în semnături.',
	'LIGHTBOX_IMG_TITLES'			=> 'Afișați numele fișierelor de imagine',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Numele imaginilor vor apărea ca o legendă în efectul Lightbox.',
));
