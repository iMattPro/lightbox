<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Arabic] Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'LIGHTBOX_SETTINGS'				=> 'إعدادات تصغير الصور',
	'LIGHTBOX_MAX_WIDTH'			=> 'الحد الأقصى لعرض الصورة بالبكسل ',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'سيتم تصغير الصور التي تتجاوز هذه القيمة ويمكن تكبيرها بإستخدام تقنية النافذة المضيئة Lightbox. القيمة صفر يعني تعطيل هذا الخيار.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'التوصية تعتمد على إعدادات الصورة المُرفقة : %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maximum image height',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Images that exceed this height will be resized and can be enlarged using the Lightbox effect. Set this value to 0 to disable Lightbox image resizing by height.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'السماح بالتنقل بين الصور ',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'السماح بسهولة التنقل بين جميع الصور المُصغرة في الصفحة بإستخدام تقنية النافذة المضيئة.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'تصغير صور التواقيع ',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'السماح بتصغير الصور الموجودة في تواقيع الأعضاء.',
	'LIGHTBOX_IMG_TITLES'			=> 'إظهار أسماء الصور  ',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'سيتم عرض أسماء الصور كعنوان في خانة التفاصيل للصورة.',
));
