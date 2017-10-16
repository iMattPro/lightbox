<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 * Vietnamese language pack <giaminhteam@gmail.com>
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
	'LIGHTBOX_MAX_WIDTH'			=> 'Bề rộng tối đa của ảnh (px)',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Hình ảnh vượt quá chiều rộng này sẽ được thay đổi kích thước và có thể được mở rộng bằng hiệu ứng Hộp đèn. Đặt giá trị này là 0 để vô hiệu hóa việc thay đổi kích thước hình ảnh của Lightbox.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Dựa trên cài đặt ảnh đính kèm: %spx',
	'LIGHTBOX_GALLERY'				=> 'Bật chế độ Gallery',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Dễ dàng chuyển ảnh qua lại trên trang nhờ sử dụng Lightbox effect.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Bật thu nhỏ hình ảnh trong chữ ký',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Thu nhỏ hình ảnh trong chữ ký.',
	'LIGHTBOX_IMG_TITLES'			=> 'Hiển thị tên file ảnh',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Tên file ảnh được hiển thị là captions khi phóng to ảnh.',
));
