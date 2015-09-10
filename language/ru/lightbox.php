<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Translation info
 *
 * Vasily Batishchev, e-mail: piatachki@gmail.com
 *
 * You can found actual versions of phpBB extensions translation here:
 * http://hooleegan.ru/viewforum.php?f=25
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
	'LIGHTBOX_SETTINGS'				=> 'Настройки Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Максимальная ширина изображения в пикселях',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Изображения, которые выходят за указанный размер будут уменьшены, а полная версия будет доступна по щелчку. Чтобы отключить эту функцию, поставьте 0',
	'LIGHTBOX_GALLERY'				=> 'Включить режим галереи',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Включает простую навигацию по уменьшенным избражениям с использованием Lightbox-эффекта.',
	'LIGHTBOX_SIGNATURES'			=> 'Уменьшать изображения в подписях',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Если опция включена, то изображения в подписях пользователей так же будут уменьшены средствами LightBox.',
));
