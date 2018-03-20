<?php

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
}
