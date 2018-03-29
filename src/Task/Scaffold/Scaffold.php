<?php
namespace JoomlaRobo\Task\Scaffold;

use Robo\Task\BaseTask;
use Robo\Exception\TaskException;
use Robo\Common\BuilderAwareTrait;
use Robo\Contract\BuilderAwareInterface;

/**
 * Scaffolding extensions
 *
 * @since 0.1.0
 */
abstract class Scaffold extends BaseTask implements \Robo\Contract\BuilderAwareInterface
{
    use BuilderAwareTrait;

    /**
     * Name of the extension
     * @var string $name
     */
    protected $name = null;

    /**
     * Base dir for the extension
     * @var string $baseDir
     */
    protected $baseDir = null;

    /**
     * Class constructor
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Set the base directory
     *
     * @param string $baseDir
     */
    public function setBaseDir($baseDir)
    {
        $this->baseDir = $baseDir;
    }

    /**
     * Create the baseDir
     *
     * @return void
     */
    protected function createBaseDir()
    {
        if (empty($this->baseDir))
        {
            throw new TaskException(
                __class__,
                'BaseDir not set.'
            );
        }

        if (!file_exists($this->baseDir))
        {
            $collection = $this->collectionBuilder();

            $collection->taskFileSystemStack()
                ->mkdir($this->baseDir)
                ->run();
        }
    }
}
