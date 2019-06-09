<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Arabic] Translated By : Bassel Taha Alhitary <https://www.alhitary.net>
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
	'LIGHTBOX_SETTINGS'				=> 'إعدادات تصغير الصور Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'الحد الأقصى لعرض الصورة',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'سيتم تصغير الصور التي تتجاوز هذه القيمة ويمكن تكبيرها بإستخدام تقنية النافذة المضيئة Lightbox. القيمة صفر يعني تعطيل هذا الخيار.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'التوصية تعتمد على إعدادات الصورة المُرفقة : %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'الحد الأقصى لارتفاع الصورة',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'سيتم تصغير الصور التي تتجاوز هذه القيمة ويمكن تكبيرها بإستخدام تقنية النافذة المضيئة Lightbox. القيمة صفر تعني تعطيل هذا الخيار.',
	'LIGHTBOX_ALL_IMAGES'			=> 'التطبيق على جميع الصور ',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'عند اختيارك “نعم”, سيكون بالامكان فتح جميع صور المشاركات بواسطة تقنية النافذة المضيئة Lightbox حتى إذا لم يتم تصغير حجمها.',
	'LIGHTBOX_GALLERY'				=> 'السماح بالتنقل بين الصور',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'السماح بسهولة التنقل بين جميع الصور المُصغرة في الصفحة بإستخدام تقنية النافذة المضيئة.',
	'LIGHTBOX_GALLERY_ALL'			=> 'جميع الصور المُصغرة في الصفحة',
	'LIGHTBOX_GALLERY_POSTS'		=> 'جميع الصور المُصغرة بكل مشاركة',
	'LIGHTBOX_SIGNATURES'			=> 'تصغير صور التواقيع',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'السماح بتصغير الصور الموجودة في تواقيع الأعضاء.',
	'LIGHTBOX_IMG_TITLES'			=> 'إظهار أسماء الصور',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'سيتم عرض أسماء الصور كعنوان في خانة التفاصيل للصورة.',
));
