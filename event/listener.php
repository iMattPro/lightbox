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

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config        $config             Config object
	 * @param \phpbb\template\template    $template           Template object
	 * @param \phpbb\user                 $user               User object
	 * @access public
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->template = $template;
		$this->user = $user;
	}

	/**
	 * Assign functions defined in this class to event listeners in the core
	 *
	 * @return array
	 * @static
	 * @access public
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header'					=> 'set_lightbox_tpl_data',
			'core.acp_board_config_edit_add'	=> 'add_lightbox_acp_config',
		);
	}

	/**
	 * Set Lightbox template data
	 *
	 * @return null
	 * @access public
	 */
	public function set_lightbox_tpl_data()
	{
		$this->template->assign_vars(array(
			'LIGHTBOX_RESIZE_WIDTH'	=> (int) $this->config['lightbox_max_width'],
			'S_LIGHTBOX_GALLERY'	=> (int) $this->config['lightbox_gallery'],
			'S_LIGHTBOX_SIGNATURES'	=> (int) $this->config['lightbox_signatures'],
		));
	}

	/**
	 * Add Lightbox settings to the ACP
	 *
	 * @param object $event The event object
	 * @return null
	 * @access public
	 */
	public function add_lightbox_acp_config($event)
	{
		if ($event['mode'] == 'post' && isset($event['display_vars']['vars']['legend3']))
		{
			$this->user->add_lang_ext('vse/lightbox', 'lightbox');
			$display_vars = $event['display_vars'];

			$my_config_vars = array(
				'legend_lightbox'		=> 'LIGHTBOX_SETTINGS',
				'lightbox_max_width'	=> array('lang' => 'LIGHTBOX_MAX_WIDTH', 'validate' => 'int:0:99999', 'type' => 'number:0:99999', 'explain' => true, 'append' => ' ' . $this->user->lang('PIXEL')),
				'lightbox_gallery'		=> array('lang' => 'LIGHTBOX_GALLERY', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
				'lightbox_signatures'	=> array('lang' => 'LIGHTBOX_SIGNATURES', 'validate' => 'bool', 'type' => 'radio:yes_no', 'explain' => true),
			);

			$display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $my_config_vars, array('before' => 'legend3'));

			$event['display_vars'] = $display_vars;
		}
	}
}
