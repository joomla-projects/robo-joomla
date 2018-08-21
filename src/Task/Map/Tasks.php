<?php

namespace JoomlaRobo\Task\Map;

trait Tasks
{
    /**
     * Scaffold a component extensions
     *
     * @param  string $joomlaDir
     *
     * @return JoomlaRobo\Task\Map\MapExtension
     */
    protected function taskMapExtension($joomlaDir)
    {
        return $this->task(MapExtension::class, $joomlaDir);
    }
}
