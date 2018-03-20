<?php

namespace JoomlaRobo\Robo\Plugin\Commands;

class ScaffoldCommands extends \Robo\Tasks
{

    use \JoomlaRobo\Task\Scaffold\Tasks;

    /**
     * Scaffold a component extensions
     * 
     * @command Scaffold:Component
     * 
     * @param string $name
     * @param string $baseDir
     */    
    public function Component($name, $baseDir='code') 
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
     * @param string $name
     * @param string $baseDir
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
     * @param string $name
     * @param string $type
     * @param string $baseDir
     */
    public function Plugin($name, $type, $baseDir = 'code')
    {
        $this->taskScaffoldPlugin($name)
            ->setBaseDir($baseDir)
            ->setType($type)
            ->run();
    }
}
