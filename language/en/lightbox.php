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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox image resizing',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maximum image width in pixel',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Images that exceed this width will be resized and can be enlarged using the Lightbox effect. Set this value to 0 to disable Lightbox image resizing.',
	'LIGHTBOX_GALLERY'				=> 'Allow gallery mode',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Allows easy navigation between all resized images on the page using the Lightbox effect.',
	'LIGHTBOX_SIGNATURES'			=> 'Resize signature images',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Allow images used in signatures to be resized.',
));
