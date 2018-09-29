<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Turkish] translation by ESQARE (http://www.phpbbturkey.com)
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox resim yeniden boyutlandırma',
	'LIGHTBOX_MAX_WIDTH'			=> 'Piksel cinsinden en yüksek resim genişliği',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Bu genişliği aşan resimler yeniden boyutlandırılacaktır ve Lightbox efekti kullanarak büyütülecektir. Lightbox resim yeniden boyutlandırmayı kapatmak için bu değeri 0 olarak ayarlayın.',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maximum image height',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Images that exceed this height will be resized and can be enlarged using the Lightbox effect. Set this value to 0 to disable Lightbox image resizing by height.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'Galeri moduna izin ver',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Lightbox efekti kullanarak sayfadaki tüm yeniden boyutlandırılan resimler arasında kolay gezinmeye izin verir.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'İmza resimlerini yeniden boyutlandır',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'İmzalarda kullanılan resimleri yeniden boyutlandırmaya izin verir.',
	'LIGHTBOX_IMG_TITLES'			=> 'Resim dosya adlarını göster',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Lightbox efekti içerisinde resim adları bir başlık olarak gösterilecektir.',
));
