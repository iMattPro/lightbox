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

class listener_test extends \phpbb_test_case
{
	/** @var \vse\lightbox\event\listener */
	protected $listener;

	public function setUp()
	{
		parent::setUp();

		// Load/Mock classes required by the event listener class
		$this->template = new \vse\lightbox\tests\mock\template();
		$this->config = new \phpbb\config\config(array());
	}

	protected function set_listener()
	{
		$this->listener = new \vse\lightbox\event\listener(
			$this->config,
			$this->template
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
		), array_keys(\vse\lightbox\event\listener::getSubscribedEvents()));
	}

	public function lightbox_setup_data()
	{
		return array(
			array(1, 400, array(
				'S_LIGHTBOX_RESIZE' => true,
				'LIGHTBOX_RESIZE_WIDTH' => 400,
			)),
			array(0, 400, array(
				'S_LIGHTBOX_RESIZE' => false,
				'LIGHTBOX_RESIZE_WIDTH' => 400,
			)),
			array(1, 0, array(
				'S_LIGHTBOX_RESIZE' => true,
				'LIGHTBOX_RESIZE_WIDTH' => 0,
			)),
			array(0, 0, array(
				'S_LIGHTBOX_RESIZE' => false,
				'LIGHTBOX_RESIZE_WIDTH' => 0,
			)),
			array(null, null, array(
				'S_LIGHTBOX_RESIZE' => false,
				'LIGHTBOX_RESIZE_WIDTH' => 0,
			)),
			array(null, 400, array(
				'S_LIGHTBOX_RESIZE' => false,
				'LIGHTBOX_RESIZE_WIDTH' => 400,
			)),
			array(1, null, array(
				'S_LIGHTBOX_RESIZE' => true,
				'LIGHTBOX_RESIZE_WIDTH' => 0,
			)),
		);
	}

	/**
	* @dataProvider lightbox_setup_data
	*/
	public function test_lightbox_setup($img_create_thumbnail, $img_max_thumb_width, $expected)
	{
		$this->config = new \phpbb\config\config(array(
			'img_create_thumbnail' => $img_create_thumbnail,
			'img_max_thumb_width' => $img_max_thumb_width,
		));

		$this->set_listener();

		$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();
		$dispatcher->addListener('core.page_header', array($this->listener, 'lightbox_setup'));
		$dispatcher->dispatch('core.page_header');

		$this->assertEquals($expected, $this->template->get_template_vars());
	}
}
