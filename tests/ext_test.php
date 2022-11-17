<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014, 2022 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\lightbox\tests\system;

class ext_test extends \phpbb_test_case
{
	/** @var \PHPUnit\Framework\MockObject\MockObject|\Symfony\Component\DependencyInjection\ContainerInterface */
	protected $container;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\finder */
	protected $extension_finder;

	/** @var \PHPUnit\Framework\MockObject\MockObject|\phpbb\db\migrator */
	protected $migrator;

	/**
	 * @inheritdoc
	 */
	protected function setUp(): void
	{
		parent::setUp();

		// Stub the container
		$this->container = $this->getMockBuilder('\Symfony\Component\DependencyInjection\ContainerInterface')
			->disableOriginalConstructor()
			->getMock();

		// Stub the ext finder and disable its constructor
		$this->extension_finder = $this->getMockBuilder('\phpbb\finder')
			->disableOriginalConstructor()
			->getMock();

		// Stub the migrator and disable its constructor
		$this->migrator = $this->getMockBuilder('\phpbb\db\migrator')
			->disableOriginalConstructor()
			->getMock();
	}

	/**
	 * Test the extension can only be enabled when the minimum
	 * phpBB version requirement is satisfied.
	 */
	public function test_ext()
	{
		$ext = new \vse\lightbox\ext($this->container, $this->extension_finder, $this->migrator, 'vse/lightbox', '');

		self::assertTrue($ext->is_enableable());
	}
}
