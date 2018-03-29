<?php
/**
 * @package    Robo-joomla
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
namespace JoomlaRobo\Robo\Plugin\Commands;

/**
 * Scaffold commands
 *
 * @since  0.1.0
 */
class ScaffoldCommands extends \Robo\Tasks
{
	use \JoomlaRobo\Task\Scaffold\Tasks;

	/**
	 * Scaffold a component extensions
	 *
	 * @command Scaffold:Component
	 *
	 * @param   string  $name     Name
	 * @param   string  $baseDir  Base dir
	 *
	 * @return  void
	 */
	public function Component($name, $baseDir = 'code')
	{
		$this->taskScaffoldComponent($name)
				->setBaseDir($baseDir)
				->run();
	}

	/**
	 * Scaffold a module extensions
	 *
	 * @command Scaffold:Module
	 *
	 * @param   string  $name     Name
	 * @param   string  $baseDir  Base Dir
	 *
	 * @return  void
	 */
	public function Module($name, $baseDir = 'code')
	{
		$this->taskScaffoldModule($name)
				->setBaseDir($baseDir)
				->run();
	}

	/**
	 * Scaffold a plugin extensions
	 *
	 * @command Scaffold:Plugin
	 *
	 * @param   string  $name     Name
	 * @param   string  $type     Type
	 * @param   string  $baseDir  Base dir
	 *
	 * @return  void
	 */
	public function Plugin($name, $type, $baseDir = 'code')
	{
		$this->taskScaffoldPlugin($name, $type)
				->setBaseDir($baseDir)
				->setType($type)
				->run();
	}
}
