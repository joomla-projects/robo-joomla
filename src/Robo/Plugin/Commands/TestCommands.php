<?php

namespace JoomlaRobo\Robo\Plugin\Commands;

class TestCommands extends \Robo\Tasks
{
    use \JoomlaRobo\Task\Test\Tasks;

    /**
     * Run selenium test
     * 
     * @command Test:Selenium
     * 
     * @param string $name
     */
    public function Selenium($name)
    {
        $this->taskRunSelenium($name)
            ->run();
    }
}
