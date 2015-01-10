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

	/**
	* Constructor
	*
	* @param \phpbb\config\config        $config             Config object
	* @param \phpbb\template\template    $template           Template object
	* @access public
	*/
	public function __construct(\phpbb\config\config $config, \phpbb\template\template $template)
	{
		$this->config = $config;
		$this->template = $template;
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
			'core.page_header'	=> 'lightbox_setup',
		);
	}

	/**
	* Setup Lightbox settings
	*
	* @param object $event The event object
	* @return null
	* @access public
	*/
	public function lightbox_setup($event)
	{
		$this->template->assign_vars(array(
			'S_LIGHTBOX_RESIZE' => $this->config['img_create_thumbnail'],
			'LIGHTBOX_RESIZE_WIDTH' => $this->config['img_max_thumb_width'] ?: 0,
		));
	}
}
