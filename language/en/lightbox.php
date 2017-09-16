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
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Recommendation based on image attachment settings: %spx',
	'LIGHTBOX_GALLERY'				=> 'Gallery mode',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Allows easy navigation between resized images using the Lightbox effect.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Resize signature images',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Allow images used in signatures to be resized.',
	'LIGHTBOX_IMG_TITLES'			=> 'Show image file names',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Image names will appear as a caption in the Lightbox effect.',
));
