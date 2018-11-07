<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

namespace phpbb\search;

use phpbb\config\config;
use phpbb\di\service_collection;

class search_backend_factory
{
	/**
	 * @var \phpbb\config\config
	 */
	protected $config;

	/**
	 * @var \phpbb\di\service_collection
	 */
	protected $search_backends;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config				$config
	 * @param \phpbb\di\service_collection		$search_backends
	 */
	public function __construct(config $config, service_collection $search_backends)
	{
		$this->config = $config;
		$this->search_backends = $search_backends;
	}

	/**
	 * Obtains a specified search backend
	 *
	 * @param string	$class
	 *
	 * @return \phpbb\search\backend\search_backend_interface
	 */
	public function get($class)
	{
		return $this->search_backends->get_by_class($class);
	}

	/**
	 * Obtains active search backend
	 *
	 * @return \phpbb\search\backend\search_backend_interface
	 */
	public function get_active()
	{
		return $this->get($this->config['search_type']);
	}
}
