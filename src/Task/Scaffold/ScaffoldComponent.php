<?php
namespace JoomlaRobo\Task\Scaffold;

/**
 * Scaffold component
 * 
 * @since 0.1.0
 */
class ScaffoldComponent extends Scaffold
{
    public function run()
    {
        $this->printTaskInfo('Creating Component ' . $this->name . ' in ' . $this->baseDir);

        $this->createBaseDir();

        $collection = $this->collectionBuilder();

        $collection->taskFileSystemStack()
            ->mkdir($this->baseDir . '/administrator')
            ->mkdir($this->baseDir . '/administrator')
            ->mkdir($this->baseDir . '/administrator/components')
            ->mkdir($this->baseDir . '/administrator/components/com_' . $this->name)
            ->mkdir($this->baseDir . '/administrator/language')
            ->mkdir($this->baseDir . '/administrator/language/en-GB')
            ->mkdir($this->baseDir . '/administrator/language/de-DE')
            ->mkdir($this->baseDir . '/components')
            ->mkdir($this->baseDir . '/components/com_' . $this->name)
            ->mkdir($this->baseDir . '/language')
            ->mkdir($this->baseDir . '/language/en-GB')
            ->mkdir($this->baseDir . '/language/de-DE');

        $collection->run();
    }    
}
