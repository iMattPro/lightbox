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

class m2_image_titles extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['lightbox_img_titles']);
	}

	public static function depends_on()
	{
		return array('\vse\lightbox\migrations\m1_add_configs');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('lightbox_img_titles', 0)),
		);
	}
}
