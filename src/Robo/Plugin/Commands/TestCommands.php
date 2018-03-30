<?php

namespace JoomlaRobo\Robo\Plugin\Commands;

class TestCommands extends \Robo\Tasks
{
    use \JoomlaRobo\Task\Test\Tasks;

    /**
     * Scaffold a component extensions
     * 
     * @command Scaffold:Component
     * 
     * @param string $name
     */
    public function Selenium($name)
    {
        $this->taskRunSelenium($name)
            ->run();
    }
}
