<?php
/**
 * @package    Robo-joomla
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace JoomlaRobo\Task\Scaffold;

/**
 * Scaffold plugin
 *
 * @since  0.1.0
 */
class ScaffoldPlugin extends Scaffold
{
	/**
	 * Type of the plugin
	 * @var string $type
	 */
	protected $type = null;

	/**
	 * Run the command
	 *
	 * @return  bool
	 */
	public function run()
	{
		$this->printTaskInfo('Creating Plugin (' . $this->type . ') ' . $this->name . ' in ' . $this->baseDir);
		$this->createBaseDir();

		$collection = $this->collectionBuilder();

		$collection->taskFileSystemStack()
			->mkdir($this->baseDir . '/plugins')
			->mkdir($this->baseDir . '/plugins/' . $this->type)
			->mkdir($this->baseDir . '/plugins/' . $this->type . '/' . $this->name)
			->mkdir($this->baseDir . '/plugins/' . $this->type . '/' . $this->name . '/language')
			->mkdir($this->baseDir . '/plugins/' . $this->type . '/' . $this->name . '/language/en-GB')
			->mkdir($this->baseDir . '/plugins/' . $this->type . '/' . $this->name . '/language/de-DE');
			$collection->run();
	}

	/**
	 * Set the type of the plugin
	 *
	 * @param   string  $type  type of the plugin
	 *
	 * @return  bool
	 */
	public function setType($type)
	{
		$this->type = $type;
	}
}
