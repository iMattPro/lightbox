<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 * [Brazilian Portuguese]
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
	'LIGHTBOX_SETTINGS'				=> 'Redimensionamento de imagem Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Largura máxima da imagem em pixels',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Imagens que excederem este tamanho serão reduzidas e poderão ser vistas em tamanho maior usando o efeito Lightbox. Deixando em 0 desabilita o redimensionamento.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Recomendação com base nas configurações de anexo da imagem: %spx',
	'LIGHTBOX_MAX_HEIGHT'			=> 'Maximum image height',
	'LIGHTBOX_MAX_HEIGHT_EXPLAIN'	=> 'Images that exceed this height will be resized and can be enlarged using the Lightbox effect. Set this value to 0 to disable Lightbox image resizing by height.',
	'LIGHTBOX_ALL_IMAGES'			=> 'Include all images in Lightbox effect',
	'LIGHTBOX_ALL_IMAGES_EXPLAIN'	=> 'With this setting enabled, all posted images can be opened in the Lightbox effect even if they are not being resized.',
	'LIGHTBOX_GALLERY'				=> 'Permite modo galeria',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permite fácil navegação entre todas as imagens redimensionadas da página usando o efeito Lightbox.',
	'LIGHTBOX_GALLERY_ALL'			=> 'Todas as imagens redimensionadas na página',
	'LIGHTBOX_GALLERY_POSTS'		=> 'Todas as imagens redimensionadas por post',
	'LIGHTBOX_SIGNATURES'			=> 'Redimensiona imagens na assinatura',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permite que imagens usadas em assinaturas sejam redimensionadas.',
	'LIGHTBOX_IMG_TITLES'			=> 'Mostra o nome de arquivo da imagem',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Os nomes das imagens aparecerão como rodapé no efeito Lightbox.',
));
