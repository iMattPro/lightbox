<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Turkish] translation by ESQARE (http://www.phpbbturkey.com) and pikachuturkey
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox görsel yeniden boyutlandırma',
	'LIGHTBOX_MAX_WIDTH'			=> 'Maksimum görsel genişliği',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Bu genişliği geçen görseller yeniden boyutlandırılacak ve Lightbox efekti kullanılarak genişletilebilecek. Genişliğe göre Lightbox görsel yeniden boyutlandırmasını kapatmak için bu değeri 0 girin',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Görsel eklenti ayarlarına dayalı öneri: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maksimum görsel yüksekliği',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Bu yüksekliği geçen görseller yeniden boyutlandırılacak ve Lightbox efekti kullanılarak genişletilebilecek. Yüksekliğe göre Lightbox görsel yeniden boyutlandırmasını kapatmak için bu değeri 0 girin.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Tüm görselleri Lightbox efektine dahil et',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'Bu ayar etkinleştirildiğinde, gönderilen tüm görseller yeniden boyutlandırılmasa bile Lightbox efektinde açılabilir.',
	'LIGHTBOX_GALLERY'				=> 'Galeri modu',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Lightbox efekti kullanılarak yeniden boyutlandrılmış görseller arasında kolay gezintiye izin verir.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Sayfadaki tüm yeniden boyutlandırılmış görseller',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Her gönderideki tüm yeniden boyutlandırılmış görseller',
	'LIGHTBOX_SIGNATURES'			=> 'İmza görsellerini yeniden boyutlandır',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'İmzalarda kullanılan görsellerin yeniden boyutlandırılmasına izin ver.',
	'LIGHTBOX_IMG_TITLES'			=> 'Görsel dosya isimlerini göster',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Görsel isimleri Lightbox efektinde başlık olarak görünecek.',
));
