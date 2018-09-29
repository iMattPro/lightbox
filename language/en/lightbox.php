<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [English]
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
	'LIGHTBOX_MAX_WIDTH'			=> 'Maximum image width',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Images that exceed this width will be resized and can be enlarged using the Lightbox effect. Set this value to 0 to disable Lightbox image resizing by width.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Recommendation based on image attachment settings: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maximum image height',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Images that exceed this height will be resized and can be enlarged using the Lightbox effect. Set this value to 0 to disable Lightbox image resizing by height.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'Gallery mode',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Allows easy navigation between resized images using the Lightbox effect.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Resize signature images',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Allow images used in signatures to be resized.',
	'LIGHTBOX_IMG_TITLES'			=> 'Show image file names',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Image names will appear as a caption in the Lightbox effect.',
));
