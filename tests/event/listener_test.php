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

require_once dirname(__FILE__) . '/../../../../../includes/functions_acp.php';

class listener_test extends \phpbb_test_case
{
	/** @var \vse\lightbox\event\listener */
	protected $listener;

	/** @var \phpbb\config\config */
	protected $config;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $template;

	/** @var \PHPUnit_Framework_MockObject_MockObject */
	protected $user;

	public function setUp()
	{
		parent::setUp();

		$this->config = new \phpbb\config\config(array());
		$this->user = $this->getMock('\phpbb\user', array(), array('\phpbb\datetime'));
		$this->template = $this->getMockBuilder('\phpbb\template\template')
			->getMock();
	}

	protected function set_listener()
	{
		$this->listener = new \vse\lightbox\event\listener(
			$this->config,
			$this->template,
			$this->user
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
			array(400, 1, 1, array(
				'LIGHTBOX_RESIZE_WIDTH'	=> 400,
				'S_LIGHTBOX_GALLERY'	=> 1,
				'S_LIGHTBOX_SIGNATURES'	=> 1,
			)),
			array(400, 0, 1, array(
				'LIGHTBOX_RESIZE_WIDTH'	=> 400,
				'S_LIGHTBOX_GALLERY'	=> 0,
				'S_LIGHTBOX_SIGNATURES'	=> 1,
			)),
			array(0, 1, 1, array(
				'LIGHTBOX_RESIZE_WIDTH'	=> 0,
				'S_LIGHTBOX_GALLERY'	=> 1,
				'S_LIGHTBOX_SIGNATURES'	=> 1,
			)),
			array(0, 0, 0, array(
				'LIGHTBOX_RESIZE_WIDTH'	=> 0,
				'S_LIGHTBOX_GALLERY'	=> 0,
				'S_LIGHTBOX_SIGNATURES'	=> 0,
			)),
			array(null, null, null, array(
				'LIGHTBOX_RESIZE_WIDTH'	=> 0,
				'S_LIGHTBOX_GALLERY'	=> 0,
				'S_LIGHTBOX_SIGNATURES'	=> 0,
			)),
			array(400, null, null, array(
				'LIGHTBOX_RESIZE_WIDTH'	=> 400,
				'S_LIGHTBOX_GALLERY'	=> 0,
				'S_LIGHTBOX_SIGNATURES'	=> 0,
			)),
			array(null, 1, 0, array(
				'LIGHTBOX_RESIZE_WIDTH'	=> 0,
				'S_LIGHTBOX_GALLERY'	=> 1,
				'S_LIGHTBOX_SIGNATURES'	=> 0,
			)),
		);
	}

	/**
	 * Test the set_lightbox_tpl_data event
	 *
	 * @param $lightbox_max_width
	 * @param $lightbox_gallery
	 * @param $lightbox_signatures
	 * @param $expected
	 * @dataProvider set_lightbox_tpl_data_test_data
	 */
	public function test_set_lightbox_tpl_data($lightbox_max_width, $lightbox_gallery, $lightbox_signatures, $expected)
	{
		$this->config = new \phpbb\config\config(array(
			'lightbox_max_width'	=> $lightbox_max_width,
			'lightbox_gallery'		=> $lightbox_gallery,
			'lightbox_signatures'	=> $lightbox_signatures,
		));

		$this->set_listener();

		$this->template->expects($this->once())
			->method('assign_vars')
			->with($expected);

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
				'features',
				array('vars' => array('legend2' => array())),
				array('legend_lightbox', 'lightbox_max_width', 'lightbox_gallery', 'lightbox_signatures', 'legend2'),
			),
			array( // unexpected mode
				'foobar',
				array('vars' => array('legend2' => array())),
				array('legend2'),
			),
			array( // unexpected config
				'settings',
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
