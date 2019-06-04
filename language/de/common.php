<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Gernman]
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
	'LIGHTBOX_GALLERY_LABEL'		=> 'Bild %1 von %2',
));
