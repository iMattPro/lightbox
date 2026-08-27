<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Russian] Vasily Batishchev, e-mail: piatachki@gmail.com
 *
 * You can found actual versions of phpBB extensions translation here:
 * http://hooleegan.ru/viewforum.php?f=25
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
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Изображения, которые выходят за указанный размер будут уменьшены, а полная версия будет доступна по щелчку. Чтобы отключить эту функцию, поставьте 0',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Рекомендация основана на настройках вложения изображения: %sпикс.',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Максимальная высота изображения',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Изображения выше указанного значения будут уменьшены, после чего их можно будет увеличить с помощью эффекта Lightbox. Установите 0, чтобы отключить уменьшение по высоте.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Включать все изображения в эффект Lightbox',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Если параметр включён, все опубликованные изображения можно открыть с помощью эффекта Lightbox, даже если их размер не изменяется.',
	'LIGHTBOX_GALLERY'				=> 'Включить режим галереи',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Включает простую навигацию по уменьшенным избражениям с использованием Lightbox-эффекта.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Все уменьшенные изображения на странице',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Все уменьшенные изображения в каждом сообщении',
	'LIGHTBOX_SIGNATURES'			=> 'Уменьшать изображения в подписях',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Если опция включена, то изображения в подписях пользователей так же будут уменьшены средствами LightBox.',
	'LIGHTBOX_IMG_TITLES'			=> 'Показывать имена файлов изображений',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Названия файлов изображений будут отображены в качестве заголовков в Lightbox.',
));
