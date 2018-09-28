<?php
/**
*
* Lightbox extension for the phpBB Forum Software package.
*
* @copyright (c) 2014 Matt Friedman
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace vse\lightbox\tests\event;

require_once __DIR__ . '/../../../../../includes/functions_acp.php';

class listener_test extends \phpbb_test_case
{
	/** @var \vse\lightbox\event\listener */
	protected $listener;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \phpbb\template\template|\PHPUnit_Framework_MockObject_MockObject */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var string PHP file extension */
	protected $php_ext;

	public function setUp()
	{
		parent::setUp();

		global $phpbb_root_path, $phpEx;

		$this->config = new \phpbb\config\config(array());
		$this->user = new \phpbb\user(
			new \phpbb\language\language(new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx)),
			'\phpbb\datetime'
		);
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();
		$this->php_ext = $phpEx;
	}

	protected function set_listener()
	{
		$this->listener = new \vse\lightbox\event\listener(
			$this->config,
			$this->template,
			$this->user,
			$this->php_ext
		);
	}

	public function test_construct()
	{
		$this->set_listener();
		$this->assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	public function test_getSubscribedEvents()
	{
		$this->assertEquals(array(
			'core.page_header',
			'core.acp_board_config_edit_add',
		), array_keys(\vse\lightbox\event\listener::getSubscribedEvents()));
	}

	/**
	 * Data set for test_set_lightbox_tpl_data
	 *
	 * @return array Array of test data
	 */
	public function set_lightbox_tpl_data_test_data()
	{
		return array(
			array(400, 500, 0, 2, 1, 1),
			array(400, 500, 0, 1, 1, 1),
			array(400, 500, 0, 0, 1, 1),
			array(0, 500, 0, 0, 1, 1),
			array(400, 0, 0, 0, 1, 1),
			array(0, 0, 0, 1, 1, 1),
			array(0, 0, 0, 0, 0, 0),
			array(null, null, null, null, null, null,),
			array(400, 500, null, null, null, null),
			array(null, null, 1, 1, 0, 1),
			array(null, null, 1, 1, 0, 0),
		);
	}

	/**
	 * Test the set_lightbox_tpl_data event
	 *
	 * @param $max_width
	 * @param $max_height
	 * @param $all_images
	 * @param $lightbox_gallery
	 * @param $lightbox_signatures
	 * @param $lightbox_img_titles
	 * @dataProvider set_lightbox_tpl_data_test_data
	 */
	public function test_set_lightbox_tpl_data($max_width, $max_height, $all_images, $lightbox_gallery, $lightbox_signatures, $lightbox_img_titles)
	{
		$this->config = new \phpbb\config\config(array(
			'lightbox_max_width'	=> $max_width,
			'lightbox_max_height'	=> $max_height,
			'lightbox_all_images'	=> $all_images,
			'lightbox_gallery'		=> $lightbox_gallery,
			'lightbox_signatures'	=> $lightbox_signatures,
			'lightbox_img_titles'	=> $lightbox_img_titles,
		));

		$this->set_listener();

		$this->template->expects($this->once())
			->method('assign_vars')
			->with(array(
				'LIGHTBOX_RESIZE_WIDTH'	=> (int) $max_width,
				'LIGHTBOX_RESIZE_HEIGHT'=> (int) $max_height,
				'S_LIGHTBOX_ALL_IMAGES' => (int) $all_images,
				'S_LIGHTBOX_GALLERY'	=> (int) $lightbox_gallery,
				'S_LIGHTBOX_SIGNATURES'	=> (int) $lightbox_signatures,
				'S_LIGHTBOX_IMG_TITLES'	=> (int) $lightbox_img_titles,
				'PHP_EXTENSION'			=> 'php',
			));

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.page_header', array($this->listener, 'set_lightbox_tpl_data'));
		$dispatcher->dispatch('core.page_header');
	}

	/**
	 * Data set for test_add_lightbox_acp_config
	 *
	 * @return array Array of test data
	 */
	public function add_lightbox_acp_config_data()
	{
		return array(
			array( // expected config and mode
				'post',
				array('vars' => array('legend3' => array())),
				array('legend_lightbox', 'lightbox_max_width', 'lightbox_max_height', 'lightbox_all_images', 'lightbox_gallery', 'lightbox_signatures', 'lightbox_img_titles', 'legend3'),
			),
			array( // unexpected mode
				'foobar',
				array('vars' => array('legend3' => array())),
				array('legend3'),
			),
			array( // unexpected config
				'post',
				array('vars' => array('foobar' => array())),
				array('foobar'),
			),
			array( // unexpected config and mode
				'foobar',
				array('vars' => array('foobar' => array())),
				array('foobar'),
			),
		);
	}

	/**
	 * Test the add_lightbox_acp_config event
	 *
	 * @param $mode
	 * @param $display_vars
	 * @param $expected_keys
	 * @dataProvider add_lightbox_acp_config_data
	 */
	public function test_add_lightbox_acp_config($mode, $display_vars, $expected_keys)
	{
		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.acp_board_config_edit_add', array($this->listener, 'add_lightbox_acp_config'));

		$event_data = array('display_vars', 'mode');
		$event = new \phpbb\event\data(compact($event_data));
		$dispatcher->dispatch('core.acp_board_config_edit_add', $event);

		$event_data_after = $event->get_data_filtered($event_data);
		foreach ($event_data as $expected)
		{
			$this->assertArrayHasKey($expected, $event_data_after);
		}
		extract($event_data_after);

		$keys = array_keys($display_vars['vars']);

		$this->assertEquals($expected_keys, $keys);
	}
}
