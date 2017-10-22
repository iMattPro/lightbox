<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2015 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\lightbox\migrations;

class m1_add_configs extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['lightbox_max_width']);
	}

	public static function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\gold');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('lightbox_max_width', 0)),
			array('config.add', array('lightbox_gallery', 0)),
			array('config.add', array('lightbox_signatures', 0)),
		);
	}
}
