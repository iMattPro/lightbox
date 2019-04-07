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
	'LIGHTBOX_GALLERY_LABEL'		=> 'Изображение %1 из %2',
));
