<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\lightbox\migrations;

class m3_add_configs extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return $this->config->offsetExists('lightbox_max_height');
	}

	public static function depends_on()
	{
		return array('\vse\lightbox\migrations\m1_add_configs');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('lightbox_max_height', 0)),
			array('config.add', array('lightbox_all_images', 0)),
		);
	}
}
