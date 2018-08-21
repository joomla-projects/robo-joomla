<?php

namespace JoomlaRobo\Robo\Plugin\Commands;

class MapCommands extends \Robo\Tasks
{

    use \JoomlaRobo\Task\Scaffold\Tasks;

	/**
	 * Map a extension development project into a Joomla installation
	 *
	 * @command Map:Extension
	 *
	 * @param string  $joomlaDir
	 * @param string  $baseDir
	 */
    public function Component($joomlaDir, $baseDir='src')
    {
        $this->taskMapExtension($joomlaDir)
            ->setBaseDir($baseDir)
            ->run();
    }
}
