<?php
/**
 * @package    Robo-joomla
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace JoomlaRobo\Task\Scaffold;

trait Tasks
{
    /**
     * Scaffold a component extensions
     *
     * @param  string $name
     * @param  string $baseDir
     *
     * @return JoomlaRobo\Task\Scaffold\ScaffoldComponent
     */
    protected function taskScaffoldComponent($name, $baseDir='src')
    {
        return $this->task(ScaffoldComponent::class, $name);
    }

    /**
     * Scaffold a component extensions
     *
     * @param  string $name
     * @param  string $baseDir
     *
     * @return JoomlaRobo\Task\Scaffold\ScaffoldComponent
     */
	protected function taskScaffoldModule($name, $baseDir='src')
    {
        return $this->task(ScaffoldModule::class, $name);
    }

    /**
     * Scaffold a component extensions
     *
     * @param  string $name
     * @param  string $type
     * @param  string $baseDir
     *
     * @return JoomlaRobo\Task\Scaffold\ScaffoldComponent
     */
	protected function taskScaffoldPlugin($name, $type, $baseDir='src')
    {
        return $this->task(ScaffoldPlugin::class, $name, $type);
    }
}
