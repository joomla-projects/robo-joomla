<?php

namespace JoomlaRobo\Task\Scaffold;

trait Tasks
{
    /**
     * Scaffold a component extensions
     *
     * @param  string $name 
     *
     * @return JoomlaRobo\Task\Scaffold\ScaffoldComponent
     */
    protected function taskScaffoldComponent($name)
    {
        return $this->task(ScaffoldComponent::class, $name);
    }

    /**
     * Scaffold a module extensions
     *
     * @param  string $name 
     *
     * @return JoomlaRobo\Task\Scaffold\ScaffoldModule
     */
    protected function taskScaffoldModule($name)
    {
        return $this->task(ScaffoldModule::class, $name);
    }

    /**
     * Scaffold a plugin extensions
     *
     * @param  string $name 
     *
     * @return JoomlaRobo\Task\Scaffold\ScaffoldPlugin
     */
    protected function taskScaffoldPlugin($name)
    {
        return $this->task(ScaffoldPlugin::class, $name);
    }
}
