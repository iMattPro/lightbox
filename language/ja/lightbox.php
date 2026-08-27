<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Japanese] Translation by momo-i.
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
	'LIGHTBOX_SETTINGS'				=> 'Lightbox 設定',
	'LIGHTBOX_MAX_WIDTH'			=> '最大画像幅(ピクセル)',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'この幅を超える画像はリサイズされLightboxエフェクトを使用して引き伸ばすことが出来ます。この値を0に設定すると画像のリサイズを無効にします。',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> '添付ファイルの設定に基づいて勧告: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> '画像の最大高さ',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'この高さを超える画像はリサイズされ、Lightboxエフェクトで拡大できます。高さによるリサイズを無効にするには0に設定します。',
	'LIGHTBOX_ALL_IMAGES'			=> 'すべての画像をLightboxエフェクトに含める',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> '有効にすると、リサイズされていない投稿画像もすべてLightboxエフェクトで開けます。',
	'LIGHTBOX_GALLERY'				=> 'ギャラリーモードを許可',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Lightboxエフェクトを使用するページの全てのリサイズされた画像の間で簡単なナビゲーションを許可します。',
	'LIGHTBOX_GALLERY_ALL'			=> 'ページ内のすべてのリサイズ画像',
	'LIGHTBOX_GALLERY_POSTS'		=> '投稿ごとのすべてのリサイズ画像',
	'LIGHTBOX_SIGNATURES'			=> '署名画像のリサイズ',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> '署名でリサイズされた画像の使用を許可します。',
	'LIGHTBOX_IMG_TITLES'			=> '画像のファイル名を表示',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> '画像名はLightboxエフェクトの見出しとして表示されます。',
));
