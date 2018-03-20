<?php
namespace JoomlaRobo\Task\Scaffold;

/**
 * Scaffold component
 * 
 * @since 0.1.0
 */
class ScaffoldComponent extends Scaffold
{
    /**
     * Type of the plugin
     * @var string $type
     */
    protected $type = null;


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
     * Set the base directory
     * 
     * @param string $baseDir
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
