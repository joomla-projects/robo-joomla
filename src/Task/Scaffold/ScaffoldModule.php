<?php
/**
 * @package    Robo-joomla
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace JoomlaRobo\Task\Scaffold;

/**
 * Scaffold Module
 *
 * @since  0.1.0
 */
class ScaffoldModule extends Scaffold
{
	/**
	 * Run the command
	 *
	 * @return  bool
	 */
	public function run()
	{
		$this->printTaskInfo('Creating Module ' . $this->name . ' in ' . $this->baseDir);

		$this->createBaseDir();

		$collection = $this->collectionBuilder();

		$collection->taskFileSystemStack()
				->mkdir($this->baseDir . '/modules')
				->mkdir($this->baseDir . '/modules/mod_' . $this->name)
				->mkdir($this->baseDir . '/modules/language')
				->mkdir($this->baseDir . '/modules/language/en-GB')
				->mkdir($this->baseDir . '/modules/language/de-DE');

		$collection->run();
	}
}
