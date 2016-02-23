<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * Translation by phpbb-es
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
	'LIGHTBOX_SETTINGS'				=> 'Ajustes de Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Ancho máximo de imagen en píxeles',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Las imágenes que excedan este ancho serán redimensionadas y se pueden ampliar mediante el efecto de Lightbox. Establezca este valor en 0 para desactivar el cambio de tamaño de la imagen.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Recomendación sobre la base de la configuración de la imagen adjunta: %spx',
	'LIGHTBOX_GALLERY'				=> 'Permitir el modo de galería',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permite una fácil navegación entre todas las imágenes redimensionadas en la página utilizando el efecto de Lightbox.',
	'LIGHTBOX_SIGNATURES'			=> 'Redimensionar imágenes de las firmas',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permitir que las imágenes usadas en las firmas seán redimensionadas.',
	'LIGHTBOX_IMG_TITLES'			=> 'Mostrar los nombres de archivo de las imágenes',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Nombres de imagen aparecerá en una leyenda en el efecto Lightbox.',
));
