<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\lightbox\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\template\template */
	protected $template;

	/** @var string PHP file extension */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config     $config   Config object
	 * @param \phpbb\language\language $language
	 * @param \phpbb\template\template $template Template object
	 * @param string                   $php_ext
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\language\language $language, \phpbb\template\template $template, $php_ext)
	{
		$this->config = $config;
		$this->language = $language;
		$this->template = $template;
		$this->php_ext = $php_ext;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	public static function getSubscribedEvents()
	{
		return [
			'core.page_header'					=> 'set_lightbox_tpl_data',
			'core.acp_board_config_edit_add'	=> 'add_lightbox_acp_config',
		];
	}

	/**
	 * Set Lightbox template data
	 *
	 * @return void
	 * @access public
	 */
	public function set_lightbox_tpl_data()
	{
		$this->language->add_lang('common', 'vse/lightbox');
		$this->template->assign_vars([
			'LIGHTBOX_RESIZE_WIDTH'	 => (int) $this->config['lightbox_max_width'],
			'LIGHTBOX_RESIZE_HEIGHT' => (int) $this->config['lightbox_max_height'],
			'S_LIGHTBOX_ALL_IMAGES'  => (int) $this->config['lightbox_all_images'],
			'S_LIGHTBOX_GALLERY'	 => (int) $this->config['lightbox_gallery'],
			'S_LIGHTBOX_SIGNATURES'	 => (int) $this->config['lightbox_signatures'],
			'S_LIGHTBOX_IMG_TITLES'	 => (int) $this->config['lightbox_img_titles'],
			'PHP_EXTENSION'			 => $this->php_ext,
		]);
	}

	/**
	 * Add Lightbox settings to the ACP
	 *
	 * @param \phpbb\event\data $event The event object
	 * @return void
	 * @access public
	 */
	public function add_lightbox_acp_config($event)
	{
		if ($event['mode'] === 'post' && array_key_exists('legend3', $event['display_vars']['vars']))
		{
			$this->language->add_lang('lightbox', 'vse/lightbox');

			$max_width = $this->min_not_null($this->config['img_max_width'], (!empty($this->config['img_create_thumbnail']) ? $this->config['img_max_thumb_width'] : 0));
			$l_append = $max_width ? $this->language->lang('LIGHTBOX_MAX_WIDTH_APPEND', $max_width) : '';

			$my_config_vars = [
				'legend_lightbox'		=> 'LIGHTBOX_SETTINGS',
				'lightbox_max_width'	=> ['lang' => 'LIGHTBOX_MAX_WIDTH', 'validate' => 'int:0:99999', 'type' => 'number:0:99999', 'explain' => true, 'append' => ' ' . $this->language->lang('PIXEL') . '<br />' . $l_append],
				'lightbox_max_height'	=> ['lang' => 'LIGHTBOX_MAX_HEIGHT', 'validate' => 'int:0:99999', 'type' => 'number:0:99999', 'explain' => true, 'append' => ' ' . $this->language->lang('PIXEL') . '<br />' . $l_append],
				'lightbox_all_images'	=> ['lang' => 'LIGHTBOX_ALL_IMAGES', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true],
				'lightbox_gallery'		=> ['lang' => 'LIGHTBOX_GALLERY', 'validate' => 'int', 'type' => 'select', 'function' => 'build_select', 'params' => [[0 => 'DISABLED', 1 => 'LIGHTBOX_GALLERY_ALL', 2 => 'LIGHTBOX_GALLERY_POSTS'], '{CONFIG_VALUE}'], 'explain' => true],
				'lightbox_signatures'	=> ['lang' => 'LIGHTBOX_SIGNATURES', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true],
				'lightbox_img_titles'	=> ['lang' => 'LIGHTBOX_IMG_TITLES', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true],
			];

			$event->update_subarray('display_vars', 'vars', phpbb_insert_config_array($event['display_vars']['vars'], $my_config_vars, ['before' => 'legend3']));
		}
	}

	/**
	 * Find lowest value that is not 0
	 * Accepts variable number of comparable parameters
	 *
	 * @return mixed The lowest of the parameter values, false on no result.
	 * @access protected
	 */
	protected function min_not_null()
	{
		$args = func_get_args();
		$args = array_diff(array_map('intval', $args), [0]);

		return count($args) ? min($args) : false;
	}
}
