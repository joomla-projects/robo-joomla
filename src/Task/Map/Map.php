<?php
namespace JoomlaRobo\Task\Scaffold;

use JoomlaRobo\Task\JoomlaTask;

/**
 * Scaffolding extensions
 * 
 * @since 0.1.0
 */
abstract class Map extends JoomlaTask
{
    /**
     * Path to the Joomla Installation Directory
     * @var string $joomlaDir
     * @since 0.1.0
     */
    protected $joomlaDir = null;

    /**
     * Base dir for the extension
     * @var string $baseDir
     * @since 0.1.0
     */
    protected $baseDir = null;
    
    /**
     * Class constructor
     *
     * @param string $name
     * @since 0.1.0
     */
    public function __construct($joomlaDir)
    {
        $this->joomlaDir = $joomlaDir;
    }

    /**
     * Set the base directory
     * 
     * @param string $baseDir
     * @since 0.1.0
     */
    public function setBaseDir($baseDir)
    {
        $this->baseDir = $baseDir;
    }
}
