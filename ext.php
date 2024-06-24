<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2018 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\lightbox;

/**
 * Extension class for custom enable/disable/purge actions
 */
class ext extends \phpbb\extension\base
{
	/** @var string Require 3.3.5 due to lang_js() */
	const PHPBB_MIN_VERSION = '3.3.5';

	/**
	 * {@inheritdoc}
	 */
	public function is_enableable()
	{
		return phpbb_version_compare(PHPBB_VERSION, self::PHPBB_MIN_VERSION, '>=');
	}
}
