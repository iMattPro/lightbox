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

	/** @var \phpbb\language\language */
	protected $language;

	/** @var \phpbb\template\template|\PHPUnit\Framework\MockObject\MockObject */
	protected $template;

	/** @var string PHP file extension */
	protected $php_ext;

	protected function setUp(): void
	{
		parent::setUp();

		global $user, $phpbb_root_path, $phpEx;

		$this->config = new \phpbb\config\config(array());
		$this->language = new \phpbb\language\language(new \phpbb\language\language_file_loader($phpbb_root_path, $phpEx));
		$this->template = $this->createMock('\phpbb\template\template');
		$this->php_ext = $phpEx;

		$user = new \phpbb\user($this->language, '\phpbb\datetime');
	}

	protected function set_listener()
	{
		$this->listener = new \vse\lightbox\event\listener(
			$this->config,
			$this->language,
			$this->template,
			$this->php_ext
		);
	}

	public function test_construct()
	{
		$this->set_listener();
		self::assertInstanceOf('\Symfony\Component\EventDispatcher\EventSubscriberInterface', $this->listener);
	}

	public function test_getSubscribedEvents()
	{
		self::assertEquals(array(
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

		$this->template->expects(self::once())
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

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.page_header', array($this->listener, 'set_lightbox_tpl_data'));
		$dispatcher->trigger_event('core.page_header');
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

		$dispatcher = new \phpbb\event\dispatcher();
		$dispatcher->addListener('core.acp_board_config_edit_add', array($this->listener, 'add_lightbox_acp_config'));

		$event_data = array('display_vars', 'mode');
		$event_data_after = $dispatcher->trigger_event('core.acp_board_config_edit_add', compact($event_data));

		foreach ($event_data as $expected)
		{
			self::assertArrayHasKey($expected, $event_data_after);
		}
		extract($event_data_after);

		$keys = array_keys($display_vars['vars']);

		self::assertEquals($expected_keys, $keys);
	}

	public function lb_select_data()
	{
		return [
			'phpbb3 disabled' => [
				'3.3.15',
				[
					0 => 'DISABLED',
					1 => 'LIGHTBOX_GALLERY_ALL',
					2 => 'LIGHTBOX_GALLERY_POSTS'
				],
				0,
				'<option value="0" selected="selected">DISABLED</option><option value="1">LIGHTBOX_GALLERY_ALL</option><option value="2">LIGHTBOX_GALLERY_POSTS</option>',
			],
			'phpbb3 all' => [
				'3.3.15',
				[
					0 => 'DISABLED',
					1 => 'LIGHTBOX_GALLERY_ALL',
					2 => 'LIGHTBOX_GALLERY_POSTS'
				],
				1,
				'<option value="0">DISABLED</option><option value="1" selected="selected">LIGHTBOX_GALLERY_ALL</option><option value="2">LIGHTBOX_GALLERY_POSTS</option>',
			],
			'phpbb3 posts' => [
				'3.3.15',
				[
					0 => 'DISABLED',
					1 => 'LIGHTBOX_GALLERY_ALL',
					2 => 'LIGHTBOX_GALLERY_POSTS'
				],
				2,
				'<option value="0">DISABLED</option><option value="1">LIGHTBOX_GALLERY_ALL</option><option value="2" selected="selected">LIGHTBOX_GALLERY_POSTS</option>',
			],
			'phpbb4 disabled' => [
				'4.0.0',
				[
					0 => 'DISABLED',
					1 => 'LIGHTBOX_GALLERY_ALL',
					2 => 'LIGHTBOX_GALLERY_POSTS'
				],
				0,
				['options' => '<option value="0" selected="selected">DISABLED</option><option value="1">LIGHTBOX_GALLERY_ALL</option><option value="2">LIGHTBOX_GALLERY_POSTS</option>'],
			],
			'phpbb4 all' => [
				'4.0.0',
				[
					0 => 'DISABLED',
					1 => 'LIGHTBOX_GALLERY_ALL',
					2 => 'LIGHTBOX_GALLERY_POSTS'
				],
				1,
				['options' => '<option value="0">DISABLED</option><option value="1" selected="selected">LIGHTBOX_GALLERY_ALL</option><option value="2">LIGHTBOX_GALLERY_POSTS</option>'],
			],
			'phpbb4 posts' => [
				'4.0.0',
				[
					0 => 'DISABLED',
					1 => 'LIGHTBOX_GALLERY_ALL',
					2 => 'LIGHTBOX_GALLERY_POSTS'
				],
				2,
				['options' => '<option value="0">DISABLED</option><option value="1">LIGHTBOX_GALLERY_ALL</option><option value="2" selected="selected">LIGHTBOX_GALLERY_POSTS</option>'],
			],
		];
	}

	/**
	 * @dataProvider lb_select_data
	 */
	public function test_lb_select($env, $options, $default, $expected)
	{
		global $user;

		$user->lang = [
			'DISABLED' => 'DISABLED',
			'LIGHTBOX_GALLERY_ALL' => 'LIGHTBOX_GALLERY_ALL',
			'LIGHTBOX_GALLERY_POSTS' => 'LIGHTBOX_GALLERY_POSTS',
		];

		$this->config['version'] = $env;

		$this->set_listener();

		$this->assertEquals($expected, $this->listener->lb_select($options, $default));
	}
}
