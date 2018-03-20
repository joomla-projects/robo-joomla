<?php
namespace JoomlaRobo\Task\Scaffold;

/**
 * Scaffold Module
 * 
 * @since 0.1.0
 */
class ScaffoldModule extends Scaffold
{
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
