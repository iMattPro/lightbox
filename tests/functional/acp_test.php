<?php
/**
 *
 * Lightbox extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2014,2025 Matt Friedman
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace vse\lightbox\tests\functional;

/**
 * @group functional
 */
class acp_test extends \phpbb_functional_test_case
{
	protected static function setup_extensions()
	{
		return ['vse/lightbox'];
	}

	public function test_acp_settings()
	{
		$this->login();
		$this->admin_login();

		$this->add_lang('acp/board');
		$this->add_lang_ext('vse/lightbox', 'lightbox');

		$found = false;

		$crawler = self::request('GET', 'adm/index.php?i=acp_board&mode=post&sid=' . $this->sid);

		$nodes = $crawler->filter('#acp_board > fieldset > legend')->extract(['_text']);
		foreach ($nodes as $key => $config_name)
		{
			if (strpos($config_name, $this->lang('POSTING')) !== 0)
			{
				continue;
			}

			$found = true;

			$this->assertContainsLang('LIGHTBOX_SETTINGS', $nodes[$key + 1]);
			break;
		}

		if (!$found)
		{
			self::fail('Lightbox settings were not found in the expected ACP location.');
		}
	}
}
