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
	'LIGHTBOX_SETTINGS'				=> 'Redimensionamento de imagem Lightbox',
	'LIGHTBOX_MAX_WIDTH'			=> 'Largura máxima da imagem em pixels',
	'LIGHTBOX_MAX_WIDTH_EXPLAIN'	=> 'Imagens que excederem este tamanho serão reduzidas e poderão ser vistas em tamanho maior usando o efeito Lightbox. Deixando em 0 desabilita o redimensionamento.',
	'LIGHTBOX_MAX_WIDTH_APPEND'		=> 'Recommendation based on image attachment settings: %spx',
	'LIGHTBOX_GALLERY'				=> 'Permite modo galeria',
	'LIGHTBOX_GALLERY_EXPLAIN'		=> 'Permite fácil navegação entre todas as imagens redimensionadas da página usando o efeito Lightbox.',
	'LIGHTBOX_GALLERY_ALL'			=> 'All resized images on page',
	'LIGHTBOX_GALLERY_POSTS'		=> 'All resized images per post',
	'LIGHTBOX_SIGNATURES'			=> 'Redimensiona imagens na assinatura',
	'LIGHTBOX_SIGNATURES_EXPLAIN'	=> 'Permite que imagens usadas em assinaturas sejam redimensionadas.',
	'LIGHTBOX_IMG_TITLES'			=> 'Mostra o nome de arquivo da imagem',
	'LIGHTBOX_IMG_TITLES_EXPLAIN'	=> 'Os nomes das imagens aparecerão como rodapé no efeito Lightbox.',
));
