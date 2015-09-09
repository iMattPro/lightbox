<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
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
	'LIGHTBOX_SETTINGS'				=> 'Настройки Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Максимальная ширина изображения в пикселях',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Изображения, которые выходят за указанный размер будут уменьшены, а полная версия будет доступна по щелчку. Что бы отключить эту функцию, поставьте 0',
	'LIGHTBOX_GALLERY'				=> 'Включить режим галереи',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Включает простую навигацию между уменьшенными изображениями с использованием Lightbox-эффекта.',
	'LIGHTBOX_SIGNATURES'			=> 'Уменьшать изображения в подписях',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Если включено, то изображеняи в подписях пользователей так же будут уменьшены.',
));
