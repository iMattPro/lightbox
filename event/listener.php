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

	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string PHP file extension */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config     $config   Config object
	 * @param \phpbb\template\template $template Template object
	 * @param \phpbb\user              $user     User object
	 * @param string                   $php_ext
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user, $php_ext)
	{
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
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
		return array(
			'core.page_header'					=> 'set_lightbox_tpl_data',
			'core.acp_board_config_edit_add'	=> 'add_lightbox_acp_config',
		);
	}

	/**
	 * Set Lightbox template data
	 *
	 * @return void
	 * @access public
	 */
	public function set_lightbox_tpl_data()
	{
		$this->template->assign_vars(array(
			'LIGHTBOX_RESIZE_WIDTH'	=> (int) $this->config['lightbox_max_width'],
			'S_LIGHTBOX_GALLERY'	=> (int) $this->config['lightbox_gallery'],
			'S_LIGHTBOX_SIGNATURES'	=> (int) $this->config['lightbox_signatures'],
			'S_LIGHTBOX_IMG_TITLES'	=> (int) $this->config['lightbox_img_titles'],
			'PHP_EXTENSION'			=> $this->php_ext,
		));
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
			$this->user->add_lang_ext('vse/lightbox', 'lightbox');
			$display_vars = $event['display_vars'];

			$max_width = $this->min_not_null($this->config['img_max_width'], (!empty($this->config['img_create_thumbnail']) ? $this->config['img_max_thumb_width'] : 0));
			$l_append = $max_width ? $this->user->lang('LIGHTBOX_MAX_WIDTH_APPEND', $max_width) : '';

			$my_config_vars = array(
				'legend_lightbox'		=> 'LIGHTBOX_SETTINGS',
				'lightbox_max_width'	=> array('lang' => 'LIGHTBOX_MAX_WIDTH', 'validate' => 'int:0:99999', 'type' => 'number:0:99999', 'explain' => true, 'append' => ' ' . $this->user->lang('PIXEL') . '<br />' . $l_append),
				'lightbox_gallery'		=> array('lang' => 'LIGHTBOX_GALLERY', 'validate' => 'int', 'type' => 'select', 'function' => array($this, 'select_gallery_mode'), 'explain' => true),
				'lightbox_signatures'	=> array('lang' => 'LIGHTBOX_SIGNATURES', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'lightbox_img_titles'	=> array('lang' => 'LIGHTBOX_IMG_TITLES', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
			);

			$display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $my_config_vars, array('before' => 'legend3'));

			$event['display_vars'] = $display_vars;
		}
	}

	/**
	 * Create options for the gallery mode select setting
	 *
	 * @param int    $selected The current value of the config setting
	 * @param string $cfg_key  The name of the config key
	 * @return string The HTML option tags
	 * @access public
	 */
	public function select_gallery_mode($selected, $cfg_key = '')
	{
		$options = '';
		$opt_ary = array(
			0 => 'DISABLED',
			1 => 'LIGHTBOX_GALLERY_ALL',
			2 => 'LIGHTBOX_GALLERY_POSTS',
		);

		foreach ($opt_ary as $opt_key => $opt_value)
		{
			$options .= '<option value="' . $opt_key . '"' . ($selected == $opt_key ? ' selected="selected"' : '') . '>' . $this->user->lang($opt_value) . '</option>';
		}

		return $options;
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
		$args = array_diff(array_map('intval', $args), array(0));

		return count($args) ? min($args) : false;
	}
}
